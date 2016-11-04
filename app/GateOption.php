<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GateOption extends Model
{
    /** 
    * * Get the gate for the option 
    * */
    public function gate()
    {
        return $this->belongsTo('App\Gate');
    }
}
