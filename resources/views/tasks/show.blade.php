@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2><a href="/workflows/{{ $task->step->workflow->id }}">{{ $task->step->workflow->name }}</a></h3> 
        <p>{{ $task->step->workflow->description }}</p>

        <h3><a href="/steps/{{ $task->step->id }}">Step {{ $task->step->position }}: {{ $task->step->name }}</a></h3> 
        <p>{{ $task->step->description }}</p>

        <h4>Task {{ $task->position }}</h4>
        <p>{{ $task->description }}</p>
        
        @if($task->body)
            <pre>{{ $task->body }}</pre>
        @endif

        <a class="btn btn-default" href="/tasks/{{ $task->id }}/edit/" role="button">Edit Task</a>
        <a class="btn btn-default" href="/tasks/{{ $task->id }}/destroy/" role="button">Delete Task</a>
        <a class="btn btn-default" href="/steps/{{ $task->step->id }}" role="button">Back to Step: {{ $task->step->position }}</a>
        <hr />
    </div>
@stop

