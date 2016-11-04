@extends('layouts.app')

@section('content')
    <!-- Process show -->
    <div class="col-md-8">
        <h2>{{ $process->name }}</h2> 
        <p>{{ $process->description }}</p>

        <div class="form-group">
            <a class="btn btn-default" role="button">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                Edit Process
            </a>
        </div>

        <hr />
            @if($nodes->count())
                @foreach($nodes->sortBy('position') as $node)
                    @include('nodes.panel') 
                @endforeach

            @else

            <div class="form-group">
                    <a href="/processes/{{ $process->id}}/events/create/" class="btn btn-default" role="button">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add Start Event
                    </a>
                @endif
            </div>      

    </div>
@stop
