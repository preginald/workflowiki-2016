@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2><a href="/workflows/{{ $workflow->id }}">{{ $workflow->name }}</a></h2> 
        <p>{{ $workflow->description }}</p>

        <h3>Step {{ $step->position }}: {{ $step->name }}</h3>
        <p>{{ $step->description }}</p>

        {!! Form::open(['action' => ['TaskController@moveSave', 11]]) !!}
        <table class=" table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Task</th>
                     <th>Step</th>
                 </tr>
             </thead>
            <tbody>
                @foreach($workflow->tasks as $task)
                <tr>
                    <td>{{ $task->position }}</td>
                    <td>{{ $task->description }}</td>
                     <td>{{ Form::select('step[' . $task->id . ']', $workflow->steps->pluck('name', 'id') , $task->step_id, ['class' => 'form-control']) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

            {{ Form::submit('Update', ['class' => 'btn btn-default']) }}
        {!! Form::close() !!}
        <hr />
    </div>
@stop
