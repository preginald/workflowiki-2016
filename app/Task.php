<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use \Rutorika\Sortable\SortableTrait;

    protected $fillable = ['step_id', 'body', 'description'];

    protected static $sortableGroupField = 'step_id';

    /**
    * Get the step that owns this task
    */
    public function step()
    {
        return $this->belongsTo('App\Step');
    }

}
