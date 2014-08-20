<?php

class Menuitems extends Lara
{

    protected $table='menuitems';

    public function menu(){
        return $this->belongsTo('Menus');
    }

}