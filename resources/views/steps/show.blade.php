@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2><a href="/workflows/{{ $step->workflow->id }}">{{ $step->workflow->name }}</a></h2> 
        <p>{{ $step->workflow->description }}</p>

             @include('steps.partials.list')

        <h3>{{ $step->position }}. {{ $step->name }}</h3>
        <p>{{ $step->description }}</p>
        @include('steps.partials.pagination')

        @if($workflow->variables->count())
            @include('variables.partials.list')
            <hr />
        @endif

        @include('tasks.partials.list')

        <a class="btn btn-default" href="/tasks/create/{{ $step->id }}" role="button">Add Task</a>
        <a class="btn btn-default" href="/tasks/move/{{ $step->id }}" role="button">Move Task</a>
        <a class="btn btn-default" href="/workflows/{{ $step->workflow->id }}" role="button">Back</a>

        <hr />
    </div>
@stop
