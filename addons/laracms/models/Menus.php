<?php

class Menus extends Lara
{

    protected $table='menus';

    public function menuitems(){
        return $this->hasMany('Menuitems')->orderby('sort','asc');
    }

    static function getForSelect(){
        $menus = Menus::all();
        $sel = array();
        foreach($menus as $menu){
            $sel[$menu->id] = $menu->menu_title;
        }
        return $sel;
    }

    public function delete()
    {
        // delete all related blocks
        $this->menuitems()->delete();

        // delete the grid
        return parent::delete();
    }

}