@extends('layouts.app')

@section('content')
    <!-- Workflow show -->
    <div class="col-md-8">
        <h2>{{ $workflow->name }}</h2> 
        <p>{{ $workflow->description }}</p>

        @if(\Auth::user() && $workflow->ownedBy(\Auth::user()))

             @include('steps.partials.list')

            <a class="btn btn-default" href="/workflows/{{ $workflow->id }}/edit" role="button">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                Edit Workflow
            </a>
            <a class="btn btn-default" href="/steps/create/{{ $workflow->id }}" role="button">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add Step
            </a>

            <hr />

        @endif

        @if($workflow->variables->count())
            @include('variables.partials.list')
            <hr />
        @endif

            @foreach ($workflow->steps->sortBy('position') as $step)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 id="step-{{ $step->position }}">{{ $step->position }}. {{ $step->name }}</h3>
                    </div>
                    @if( $step->description )
                    <div class="panel-body">
                        <p>{{ $step->description }}</p>
                    </div>
                    @endif
                
                    @include('tasks.index')
                </div>
            @endforeach
    </div>
@stop
