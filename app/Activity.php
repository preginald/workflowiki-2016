<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['node_id', 'name', 'description'];

    /** 
        * * Get the node for the process 
        * */
    public function node()
    {
        return $this->morphOne('App\Node', 'nodeable');
    }

    /**
    * Return activity name by type id
    */
    public function type()
    {
        return ($this->type_id === 1) ? 'Default' : 'Decision';
        
    }
}
