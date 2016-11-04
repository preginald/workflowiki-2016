<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $fillable = ['user_id', 'name', 'description']; 

    /**
    * Get the user for the workflow
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * Get the steps for the workflow.
    */
    public function steps()
    {
        return $this->hasMany('App\Step');
    }

    /**
    * Get the tasks for the workflow.
    */
    public function tasks()
    {
        return $this->hasManyThrough('App\Task', 'App\Step');
    }

    /**
    * return the variables for the workflow.
    */
    public function variables()
    {
        return $this->hasMany('App\Variable');
    }
    
     /**
     * return array of variable names
     */
    public function getVariables(Array $pieces)
    {
        $pattern = '/(<\bvariable:)(.*)(>)/';

        foreach ($pieces as $subject) {
            if(preg_match($pattern,$subject, $matches)){
                $variables[] = $matches[2];
            }
        }

        return $variables;
    }

    /**
    * Check if user owns this workflow
    */
    public function ownedBy(User $user)
    {
        return $this->user_id == $user->id;
    }
}
