@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2>{{ $workflow->name }}</h2> 
        <p>{{ $workflow->description }}</p>
        
        <h3>{{ $task->step->name }}</h3> 
        <p>{{ $task->step->description }}</p>
        
        <hr />
        <h2>Edit Task</h2>
        {!! Form::model($task, ['method' => 'PATCH', 'action' => ['TaskController@update', $task->id]]) !!}
            <div class="form-group">
                {{ Form::label('step_id','Step') }}
                {{ Form::select('step_id', $workflow->steps->pluck('name', 'id') , $task->step_id, ['class' => 'form-control']) }}
            </div>
            @include('tasks.form', ['route' => 'tasks.show', 'id' => $task->id])
            @include('errors.list')
        {!! Form::close() !!}
    </div>
@stop
