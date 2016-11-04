@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2>{{ $workflow->name }}</h2>
        <p>{{ $workflow->description }}</p>

         @include('steps.partials.list')
        
        <hr />
        <h2>Edit Step</h2>
        {!! Form::model($step, ['method' => 'PATCH', 'action' => ['StepController@update', $step->id]]) !!}
            @include('steps.form')
            
            @include('errors.list')
        {!! Form::close() !!}
    </div>
@stop
