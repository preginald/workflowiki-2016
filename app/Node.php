<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $fillable = ['process_id', 'branch', 'position', 'type'];

    /** 
    * * Get the process for the node  
    * */
    public function process()
    {
        return $this->belongsTo('App\Process');
    }

    /**
    * Get the child node for this node
    */
    public function nodeable()
    {
        return $this->morphTo();
    }

    /**
    * Get the branches for this node
    */
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    /**
    * Return nodeable type
    */
    public function getTypeAttribute()
    {
        return array_last(explode("\\", $this->nodeable_type));
    }

    // This is probably redundant now that I'm using a Branch model
    // to manage branches.
    public function getBranch($process)
    {
        if (!$process->nodes->count()) {
            return 1;
        }

        return 'error';
    }

    public function getPosition($process)
    {
        if (!$process->nodes->count()) {
            return 1;
        }

        return 'error';
    }

    /**
    * Get related node child
    */
    public function child()
    {
        if ($this->nodeable_type == "App\\Gate") {
            $this->nodeable->options = \App\GateOption::where('gate_id', $this->nodeable->id)->get();
        }

        return $this; 
    }

}
