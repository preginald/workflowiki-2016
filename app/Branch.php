<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['node_in', 'node_out']; 

    /** 
    * * Get the node for the branch  
    * */
    public function node()
    {
        return $this->belongsTo('App\Node');
    }

    /**
    * Get the option for the branch
    */
    public function option()
    {
        return $this->belongsTo('App\GateOption', 'option_id','id');
    }
}
