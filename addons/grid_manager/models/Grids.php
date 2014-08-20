<?php

class Grids extends Eloquent
{

    protected $table='gridmanager';


    public function blocks(){
       return $this->hasMany('Blocks');
    }

    public function delete()
    {
        // delete all related blocks
        $this->blocks()->delete();

        // delete the grid
        return parent::delete();
    }
}