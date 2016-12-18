<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProcessRequest;

use App\Process;
use App\Node;

class ProcessController extends Controller
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
        $processes = Process::with('user')->get();

        return view('processes.index')->with(compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('processes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessRequest $request)
    {
        $process = \Auth::user()->processes()->create($request->all());

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
        $branch = 0;
        $process = Process::with('user')->findOrFail($id);
        $nodes = Node::with('branch.option', 'nodeable')
            ->where('process_id', $id)
            /* ->where('branch', 0) */
            /* ->orderBy('position', 'asc') */
            ->get();

        /* foreach ($nodes as $node) { */
        /*     $node = $node->child(); */ 
        /* } */


        $process->startNode = $process->startNode($nodes);
        $process->endNode = $process->endNode($nodes);

        /* return $nodes->groupBy('branch_id'); */

        /* return $nodes; */

        /* return view('processes.show_v1')->with(compact('process', 'nodes')); */
        return view('processes.show_v2')->with(compact('process', 'nodes'));
        /* return view('processes.show')->with(compact('process', 'nodes')); */
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
