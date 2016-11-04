@extends('layouts.app')

@section('content')
    <!--  Gate create -->
    <div class="col-md-8">
        <h2>{{ $process->name }}</h2> 
        <p>{{ $process->description }}</p>
        
        <hr />
        <div class="panel panel-default">
            <div class="panel-heading">{{ $node->type }} {{ $node->nodeable->type() }}</div>
                <div class="panel-body">
                    {{ $node->nodeable->name }}
                </div>
            <div class="panel-footer">
                <div>
                    <h2>Create Option</h2> 
                    <form method="POST" action="/nodes/{{ $id }}/gateoptions">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Option Name</label>
                            <input type="text" name="name" id="name" class="form-control"/>
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Save', ['class' => 'btn btn-default']) }} 
                            {!! link_to_route('processes.show', 'Back', ['id' => $process->id] , ['class' => 'btn btn-default']) !!}
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('errors.list')

        <pre>
            {{ $process->nodes }}
        </pre>
    </div>
@stop
