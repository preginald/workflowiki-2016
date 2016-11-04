@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2>Create Workflow</h2>
        {!! Form::open(['action' => 'WorkflowController@store']) !!}
        <form action="/workflows" method="post">
            @include('workflows.form')
            
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>     
                </div>
            @endif
        {!! Form::close() !!}
        @{{ $data }}
    </div>
@stop
