@extends('layouts.app')

@section('content')
    <!--  Event create -->
    <div class="col-md-8">
        <h2>{{ $process->name }}</h2> 
        <p>{{ $process->description }}</p>
        
        <hr />
        <div>
            <h2>Create Event</h2> 
            <form method="POST" action="/processes/{{ $process->id }}/events">
                {{ csrf_field() }}

                 <div class="form-group">
                    <label for="size">What kind of event is this?</label>
                    {{ Form::select('type_id', $types, null, ['required' => 'required', 'class' => 'form-control']) }}
                 </div>
        
                <div class="form-group">
                    <label for="name">Event Name</label>
                    <input type="text" name="name" id="name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="description">Event Description</label>
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
