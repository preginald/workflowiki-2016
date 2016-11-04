<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = ['user_id', 'name', 'description']; 


    /**
    * Get the user for the process
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * Get the nodes for the process
    */
    public function nodes()
    {
        return $this->hasMany('App\Node');
    }

    /**
    * Get start node for the process
    */
    public function startNode($nodes)
    {
        return $nodes->where('nodeable_type', 'App\\Event')->where('nodeable.type_id', 1); 
    }

    /**
    * Get end node for the process
    */
    public function endNode($nodes)
    {
        return $nodes->where('nodeable_type', 'App\\Event')->where('nodeable.type_id', 2); 
    }
}
