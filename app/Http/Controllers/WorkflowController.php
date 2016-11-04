<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\WorkflowRequest;

use App\Workflow;

class WorkflowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workflows = Workflow::get();
        
        return view('workflows.index', compact('workflows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::check()) {
            return view('workflows.create');
        }

        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkflowRequest $request)
    {
        // persist the workflow
        // Auth::user()->pages()->create($request->all);

        $workflow = \Auth::user()->workflows()->create($request->all());

        /* $workflow = Workflow::create($request->all()); */

        return view('steps.create')->with(compact('workflow'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workflow = Workflow::with('steps','tasks', 'variables')->findOrFail($id);

        return view('workflows.show', compact('workflow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workflow = Workflow::findOrFail($id);

        return view('workflows.edit')->with(compact('workflow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkflowRequest $request, $id)
    {
        $workflow = Workflow::findOrFail($id);

        $workflow->update($request->all());

        return redirect()->action('WorkflowController@show', ['id' => $id]);
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

    public function fill(Request $request)
    {
        $workflow = Workflow::with('steps', 'tasks')->findOrFail(1);
        $array = array_except($request->all(), ['_token']);
        list($search, $replace) = array_divide($array);
        $test = str_replace($search,$replace,$workflow->tasks->pluck('body'));

        $workflow->tasks->each(function($item) { 
            $item->body = str_replace('database', 'lalala', $item->body); 
        });
            
        /* return view('workflows.show', compact('workflow')); */
        /* return dd($tasks); */
        /* return dd($workflow); */
        return $workflow->tasks[0];
        return dd($test);
        return dd($keys, $values);

        

        return dd($array);
    }
}
