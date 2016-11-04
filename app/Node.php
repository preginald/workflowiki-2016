<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $fillable = ['process_id', 'branch', 'position', 'type'];

    public $bumbum = "boo boo";

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
        if ($this->nodeable_type == "App\\Event") {
            $this->type = "Event";
        }

        if ($this->nodeable_type == "App\\Activity") {
            $this->type = "Activity";
        }

        if ($this->nodeable_type == "App\\Gate") {
            $this->type = "Gate";
            $this->nodeable->options = \App\GateOption::where('gate_id', $this->nodeable->id)->get();
        }

        return $this; 
    }

}
