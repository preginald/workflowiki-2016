<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EventRequest;

use App\Process;
use App\Event;

class EventController extends Controller
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
        $process = Process::with('user', 'nodes')->findOrFail($id);

        // Check if process has start event already
        $types = ($process->nodes) ? ['1' => 'Start'] : ['2' => 'End'];


        return view('events.create')->with(compact('process', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request, $id)
    {
        $process = Process::with('nodes')->findOrFail($id);

        // create event
        $event = new Event;
        $event->type_id = $request->type_id;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->save(); 
        
        // create node   
        $node = new \App\Node;
        $node->process_id = $process->id;
        $node->branch = $node->getBranch($process);
        $node->position = $node->getPosition($process);
        /* $node->type = 'Event'; */

        $event->node()->save($node);

        return redirect()->action('ProcessController@show', ['id' => $process->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
