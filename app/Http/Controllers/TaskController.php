<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;
use App\Step;
use App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $step = Step::with('workflow.variables', 'tasks')->findOrFail($id);

        if(\Auth::user()->id !== $step->workflow->user_id)
        {
            return back();
        }

        return view('tasks.create')->with(compact('step'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        // persist the task
        $task = Task::create($request->all());

        $workflow = Step::findOrFail($task->step_id);

        $variables = $this->getVariables($pieces = explode(" ", $request->input('body'))); 

        $this->addVariables($variables, $workflow->workflow_id);

        return redirect()->action('TaskController@create', ['id' => $task->step_id]);
    }

    public function getVariables(Array $pieces)
    {
        $pattern = '/(<\bvariable:)(.*)(>)/';
        $variables = [];

        foreach ($pieces as $subject) {
            if(preg_match($pattern,$subject, $matches)){
                $variables[] = $matches[2];
            }
        }

        return $variables;
    }

    public function addVariables(Array $variables, $workflow_id)
    {
        foreach ($variables as $name) 
        {
            if (! $this->variableExists($workflow_id, $name)) 
            {
                $variable = new \App\Variable;
                $variable->workflow_id = $workflow_id;
                $variable->name = $name; 
                $variable->save();
            }
        }
    }

    public function variableExists($workflow_id, $name)
    {
        return \DB::table('variables')->where('name',$name)->where('workflow_id',$workflow_id)->count();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::with('step.workflow')->findOrFail($id);

        return view('tasks.show')->with(compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::with('step.workflow')->findOrFail($id);

        $workflow = \App\Workflow::with('steps','tasks')->findOrFail($task->step->workflow_id);


        return view('tasks.edit')->with(compact('workflow','task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->position = $this->doTaskToStep($task, $request->input('step_id'));
        $task->step_id = $request->input('step_id');

        $workflow = Step::findOrFail($task->step_id);

        $variables = $this->getVariables($pieces = explode(" ", $request->input('body'))); 

        $this->addVariables($variables, $workflow->workflow_id);

        $task->update($request->all());
        return redirect()->action('TaskController@show', ['id' => $task->id]);
    }

    public function doTasktoStep($task, $requestStepId)
    {
        if ($this->isSame($task->step_id, $requestStepId)) {
            return $task->position; 
        }

        $this->reorderStepPosition($task);

        return $this->getLastPosition($requestStepId);
    }

    public function reorderStepPosition($task)
    {
        $tasks = Task::where('step_id', $task->step_id)
            ->where('position', '>', $task->position)
            ->each(function($item, $key){
                $item->decrement('position');
            });
    }

    public function getLastPosition($requestStepId)
    {
        if($this->taskExistInStep($requestStepId)->count()){
            return Task::where('step_id', $stepId)->orderBy('position', 'desc')->pluck('position')->first();
        }

        return 1;
    }

    public function taskExistInStep($step_id)
    {
        return Task::where('step_id',$step_id)->get();
    }

    public function isSame($a, $b)
    {
        return ($a == $b) ? true : false;
    }

    public function isDifferent($a, $b)
    {
        return ($a != $b) ? true : false;
    }

    public function move($id)
    {
        $step = Step::findOrFail($id);

        $workflow = \App\Workflow::with('steps','tasks')->findOrFail($step->workflow_id);

        return view('tasks.move')->with(compact('workflow', 'step'));
    }

    /**
    * move tasks to new step
    */
    public function moveSave(Request $request, $id)
    {
       return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
