@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2>{{ $workflow->name }}</h2>
        <p>{{ $workflow->description }}</p>
        
        <hr />
        <h2>Edit Workflow</h2>
        {!! Form::model($workflow, ['method' => 'PATCH', 'action' => ['WorkflowController@update', $workflow->id]]) !!}
            @include('workflows.form')
            
            @include('errors.list')
        {!! Form::close() !!}
    </div>
@stop
