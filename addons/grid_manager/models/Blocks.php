<?php

class Blocks extends Eloquent
{

    protected $table='gridmanager_blocks';

    public function grid(){
        return $this->belongsTo('Grids');
    }

}