<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    /** 
        * * Get the node for the process 
        * */
    public function node()
    {
        return $this->morphOne('App\Node', 'nodeable');
    }

    /** 
    * * Get the gate options for the gate 
    * */
    public function options()
    {
        return $this->hasMany('App\GateOption', 'gate_id');
    } 

}
