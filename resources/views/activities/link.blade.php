@extends('layouts.app')

@section('content')
    <!-- Activity create -->
    <div class="col-md-8">
        <h2>{{ $process->name }}</h2> 
        <p>{{ $process->description }}</p>
        
        <hr />
        <div>
            <h2>Link Activity</h2> 
            <form method="POST" action="/{{ $type }}/{{ $id }}/activities/link">
                {{ csrf_field() }}

                 <div class="form-group">
                    <label for="id">Link this activity before...</label>
                    {{ Form::select('id', $options, null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Select activity type...']) }}
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
