<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Activity;
use App\GateOption;
use App\Process;
use App\Node;

class GateActivityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $type = 'gates';
        // $id is gate option id
        $gateOption = GateOption::with('gate.node')->find($id);
        
        $process = Process::with('user', 'nodes')->findOrFail($gateOption->gate->node->process_id);

        return view('activities.create')->with(compact('process','id', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id option->id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $gateOption = GateOption::with('gate.node')->find($id);

        // save activity
        $activity = new Activity;
        $activity->type_id = $request->type_id;
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->save();

        // save node
        $node = new Node;
        $node->process_id = $gateOption->gate->node->process_id;
        $node->branch = $gateOption->id;
        $node->position = 1;

        $activity->node()->save($node);
        
        // if activity is decision then return gate.option create view
        if($request->type_id == 1){
            return redirect()->action('ProcessController@show', ['id' => $node->process_id]);
        }

        // else return to activities.create view 
        return redirect()->action('GateOptionController@create', ['id' => $node->id]);
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
