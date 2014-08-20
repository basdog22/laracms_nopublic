<?php

class Pages extends Lara
{

    protected $table='pages';

    static function page($slug){
        $page = Pages::where('slug','=',$slug)->first();
        $page = Pages::find($page->id);
        return $page;
    }



}