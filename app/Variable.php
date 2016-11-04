<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    /**
    * Get the workflow that owns this variable
    */
    public function workflow()
    {
        return $this->belongsTo('App\Workflow');
    }
}
