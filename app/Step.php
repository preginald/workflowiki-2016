<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use \Rutorika\Sortable\SortableTrait;

    protected $fillable = ['workflow_id', 'name', 'description']; 

    protected static $sortableGroupField = 'workflow_id';

    /**
    * Get the workflow that owns this step.
    */
    public function workflow()
    {
        return $this->belongsTo('App\Workflow');
    }

    /**
    * Get the tasks for the step.
    */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    /**
    * Get previous step
    */
    public function getPrevious()
    {
        return Step::where('workflow_id', $this->workflow_id)
            ->where('position', '<', $this->position)
            ->orderBy('position', 'desc')->first(); 
    }

    /**
    * Get next step
    */
    public function getNext()
    {
        return Step::where('workflow_id', $this->workflow_id)
            ->where('position', '>', $this->position)
            ->orderBy('position', 'asc')->first(); 
    }
}
