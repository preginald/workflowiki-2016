<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['node_id', 'type_id', 'name', 'description'];

    /** 
        * * Get the node for the process 
        * */
    public function node()
    {
        return $this->morphOne('App\Node', 'nodeable');
    }

    /**
    * Return event name by type id
    */
    public function type()
    {
        return ($this->type_id === 1) ? 'Start' : 'End';
        
    }
}
