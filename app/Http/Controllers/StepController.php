<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StepRequest;
use App\Workflow;
use App\Step;

class StepController extends Controller
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
        //
        $steps = Step::get();
        return $steps;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $workflow = Workflow::with('steps')->findOrFail($id);

        if($workflow->user_id !== \Auth::id())
        {
            return back();
        }

        return view('steps.create')->with(compact('workflow'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepRequest $request)
    {
        Step::create($request->all());
        return redirect()->action('StepController@create', ['id' => $request->workflow_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $step = Step::with('workflow','tasks')->findOrFail($id);

        $workflow = $step->workflow;
        
        $step->previous = $step->getPrevious();
        $step->next = $step->getNext();

        return view('steps.show')->with(compact('workflow','step'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $step = Step::findOrFail($id);

        $workflow = Workflow::with('steps')->findOrFail($step->workflow_id);

        if(\Auth::user()->id !== $workflow->user_id)
        {
            return back();
        }
        
        return view('steps.edit')->with(compact('workflow','step'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StepRequest $request, $id)
    {
        //
        $step = Step::findOrFail($id);
        $step->update($request->all());
        return redirect()->action('StepController@show', ['id' => $id]);
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
