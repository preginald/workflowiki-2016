@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2><a href="/workflows/{{ $step->workflow->id }}">{{ $step->workflow->name }}</a></h2> 
        <p>{{ $step->workflow->description }}</p>

        <h3>Step {{ $step->position }}: {{ $step->name }}</h3>
        <p>{{ $step->description }}</p>

         @include('tasks.partials.list')
        
        <hr />
        <h2>Create Task</h2>
        {!! Form::open(['action' => 'TaskController@store']) !!}
            {{ Form::hidden('step_id', $step->id) }}

            @if($step->workflow->variables)
                <ul class="list-inline">
                    @foreach ($step->workflow->variables as $variable)
                         <span class="label label-default">{{ $variable->name }}</span>
                    @endforeach
                </ul>
            @endif

            @include('tasks.form', ['route' => 'steps.show', 'id' => $step->id])

            @include('errors.list')
        {!! Form::close() !!}
    </div>
@stop
