@extends('layouts.app')

@section('content')
    <!-- Activity create -->
    <div class="col-md-8">
        <h2>{{ $process->name }}</h2> 
        <p>{{ $process->description }}</p>
        <hr />

        <div>
            <h2>Create Activity</h2> 
            <a href="/nodes/{{$id}}/activities/link">Link to an existing activity.</a>
            <form method="POST" action="/{{ $type }}/{{ $id }}/activities">
                {{ csrf_field() }}

                 <div class="form-group">
                    <label for="size">What kind of activity is this?</label>
                    {{ Form::select('type_id', ['1' => 'Default', '2' => 'Decision'], null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Select activity type...']) }}
                 </div>
        
                <div class="form-group">
                    <label for="name">Activity Name</label>
                    <input type="text" name="name" id="name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="description">Activity Description</label>
                    <textarea name="description" id="description" rows="3" cols="40" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    {{ Form::submit('Save', ['class' => 'btn btn-default']) }} 
                    {!! link_to_route('processes.show', 'Back', ['id' => $process->id] , ['class' => 'btn btn-default']) !!}
                </div>
            </form>
        </div>

        @include('errors.list')

        <pre>
            {{ $process->nodes }}
        </pre>
    </div>
@stop
