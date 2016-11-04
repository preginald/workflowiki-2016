@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2>Create Process</h2> 
            <form method="POST" action="/processes">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Process Name</label>
                    <input type="text" name="name" id="name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="description">Process Description</label>
                    <textarea name="description" id="description" rows="3" cols="40" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    {{ Form::submit('Save', ['class' => 'btn btn-default']) }} 
                    {!! link_to_route('processes.index', 'Back', null, ['class' => 'btn btn-default']) !!}
                </div>
            </form>
        @include('errors.list')
    </div>
@stop
