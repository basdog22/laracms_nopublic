<?php

class Lara extends Eloquent
{


    public function save(array $options = array())
    {

        if(!$this->exists()){
            parent::save();
        }



        $langs = Languages::all();
        foreach ($langs as $lang) {
            $translation = Translations::find($this->table . "_" . $this->id . "_" . strtolower($lang->code));
            if ($lang->code == Config::get('cms.currlang.code') || !isset($translation->exists)) {
                //check if translation exists

                if(isset($translation->exists)){

                }else{
                    $translation = new Translations;
                }

                $translation->id = $this->table . "_" . $this->id . "_" . strtolower($lang->code);
                $translation->translation = json_encode($this->getAttributes());
                $translation->save();
            }
        }
        return;
    }

    public function seo()
    {
        return $this->morphMany('Seo', 'seoble');
    }



    public static function paginate($perPage = null, $columns = array('*')){

        $instance = new static;
        $obj = $instance->newQuery()->paginate($perPage,$columns);
        $prop = new ReflectionProperty(get_class($obj), 'items');
        $col = array();
        if($prop->name){
            $prop->setAccessible(1);

            foreach($prop->getValue($obj) as $k=>$object){
                $translation = Translations::find($object->table . "_" . $object->id . "_" . strtolower(Config::get('cms.currlang.code')));

                $object->setRawAttributes(json_decode($translation->translation, 1));

                $col[] = $object;
            }
            $prop->setValue($obj,$col);
        }else{
            $translation = Translations::find($obj->table . "_" . $obj->id . "_" . strtolower(Config::get('cms.currlang.code')));

            $obj->setRawAttributes(json_decode($translation->translation, 1));
            $seo = $obj->seo()->first();
            if(!is_null($seo)){
                Config::set('cms.seo',$seo);
            }
        }
        return $obj;
    }

    public static function find($id, $columns = array('*'))
    {
        if (is_array($id) && empty($id)) return new Collection;

        $instance = new static;

        $obj = $instance->newQuery()->find($id, $columns);

        if(is_array($id)){
            $prop = new ReflectionProperty(get_class($obj), 'items');
        }


        $col = array();
        if(isset($prop->name)){
            $prop->setAccessible(1);

            foreach($prop->getValue($obj) as $k=>$object){
                $translation = Translations::find($object->table . "_" . $object->id . "_" . strtolower(Config::get('cms.currlang.code')));

                $object->setRawAttributes(json_decode($translation->translation, 1));

                $col[] = $object;
            }
            $prop->setValue($obj,$col);
        }else{
            $translation = Translations::find($obj->table . "_" . $obj->id . "_" . strtolower(Config::get('cms.currlang.code')));
            $obj->setRawAttributes(json_decode($translation->translation, 1));
            $seo = $obj->seo()->first();
            if(!is_null($seo)){
                Config::set('cms.seo',$seo);
            }
        }
//
        return $obj;
    }


}
