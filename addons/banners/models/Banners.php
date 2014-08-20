<?php

class Banners extends Lara
{

    protected $table = 'banners';

    static function getForSelect()
    {
        $banners = Banners::all();
        $sel = array();
        foreach ($banners as $banner) {
            $sel[$banner->id] = $banner->title;
        }
        return $sel;
    }

    static function cachedIn($ids = array())
    {
//        $ids = implode(",",$ids);
        $banners = Cache::remember('banners_'.Config::get('cms.currlang.code'), 60, function () use($ids){
//            return Banners::whereRaw("id IN ({$ids})")->get();
            return Banners::find($ids);
        });
        return $banners;

    }

}