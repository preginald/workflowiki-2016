<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Process;
use App\Node;
use App\Gate;
use App\Activity;

class NodeActivityController extends Controller
{
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
        $type = 'nodes';
        $node = Node::with('process')->find($id);

        $process = Process::with('user', 'nodes')->findOrFail($node->process_id);

        foreach ($process->nodes as $node) {
            if ($node->type == "Event") {
               $node->event = \App\Event::where('node_id', $node->id)->get(); 
            }
        }

        return view('activities.create')->with(compact('process','id', 'type'));
    }

    /**
     * Show the form for linking a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function link($id)
    {
        $type = 'nodes';
        $node = Node::with('process')->find($id);

        $process = Process::with('user', 'nodes.nodeable')->findOrFail($node->process_id);

        foreach ($process->nodes as $node) {
            if ($node->type == "Event") {
               $node->event = \App\Event::where('node_id', $node->id)->get(); 
            }
        }

        $options = $process->nodes
            ->where('branch','<>', $node->branch)
            ->where('nodeable_type', 'App\\Activity')
            ->pluck('nodeable.name', 'id');

        return view('activities.link')
            ->with(compact('process','id', 'type', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $previousNode = Node::find($id);



        // save activity
        $activity = new Activity;
        $activity->type_id = $request->type_id;
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->save();

        // save node
        $node = new Node;
        $node->process_id = $previousNode->process_id;
        $node->branch = $previousNode->branch;
        $node->position = ++ $previousNode->position;

        $activity->node()->save($node);

        // if activity is decision then return gate.option create view
        if($request->type_id == 1){
            return redirect()->action('ProcessController@show', ['id' => $node->process_id]);
        }

        // else return to activities.create view 
        return redirect()->action('GateOptionController@create', ['id' => $node->id]);
    }

    public function linkStore(Request $request, $id)
    {
        $previousNode = Node::find($id);

        $targetNode = Node::with('nodeable')->find($request->id);

        $newBranch = 1 + Node::where('process_id', $previousNode->process_id)->max('branch');

        // create new merge gate
        $gate = new Gate;
        $gate->type_id = 2;
        $gate->save();

        // save node
        $node = new Node;
        $node->process_id = $targetNode->process_id;
        $node->branch = $newBranch;
        $node->position = 1;

        $gate->node()->save($node);


        // move targetNode to new branch
        $targetNode->branch = $node->branch;  
        $targetNode->position = 2;
        $targetNode->save();

        return redirect()->action('ProcessController@show', ['id' => $targetNode->process_id]);
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
