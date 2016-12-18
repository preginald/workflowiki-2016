<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\GateOptionRequest;

use App\Process;
use App\Branch;
use App\Node;

use App\Gate;
use App\GateOption;

class GateOptionController extends Controller
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
        $node = Node::with('process')->find($id);
        $node = $node->child($node);


        $process = Process::with('user', 'nodes')->findOrFail($node->process_id);

        return view('gates.create')->with(compact('process', 'node', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GateOptionRequest $request, $id)
    {
        $previousNode = Node::with('nodeable')->find($id);
        $previousBranch = Branch::find($previousNode->branch_id); 

        // check if node and gate exists for this gate option
        $nextNode = Node::where('process_id', $previousNode->process_id)
            ->where('branch_id', $previousNode->branch_id)
            ->where('position', $previousNode->position + 1)
            ->where('nodeable_type', 'App\Gate')
            ->first(); 

        /* return $nextNode; */

        if ($nextNode) {
            $gate = Gate::where('id', $nextNode->nodeable_id)->first();

            // save gate option to gate

            $gateOption = new GateOption;
            $gateOption->gate_id = $gate->id;
            $gateOption->name = $request->name;
            $gateOption->save();
            
        } else {
            // if not exist then save node and gate

            // 1. create new split gate
            $gate = new Gate;
            $gate->type_id = 1; 
            $gate->save();

            // create a new node for the new split gate and then close the previous branch

            // create node for the new gate
            $node = new Node;
            $node->process_id = $previousNode->process_id;
            $node->branch_id = $previousNode->branch_id;
            $node->position = ++ $previousNode->position;

            $gate->node()->save($node);

            // close previous branch
            $previousBranch->node_out = $node->id;
            $previousBranch->save();

            // save gate option to gate

            $gateOption = new GateOption;
            $gateOption->gate_id = $gate->id;
            $gateOption->name = $request->name;
            $gateOption->save();

        }

        return redirect()->action('ProcessController@show', ['id' => $previousNode->process_id]);
        return redirect()->action('GateOptionController@create', ['id' => $id]);
        
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
