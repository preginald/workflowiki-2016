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
                {{-- Render first branch --}}
                <?php $branch_id = $process->startNode->branch_id ?> 
                @foreach($nodes->where('branch_id', $process->startNode->branch_id)->where('nodeable_type', '<>', 'App\\Gate')->sortBy('position') as $node)
                    @include('nodes.panel') 
                @endforeach

                @foreach($nodes->where('branch_id', $process->startNode->branch_id)->where('nodeable_type', 'App\\Gate')->sortBy('position') as $node)
                    <div class="row">
                        @foreach($node->nodeable->options as $option)
                            @include('nodes.branch') 
                        @endforeach
                    </div>
                @endforeach
                
                {{-- Render remaining branches --}}
                @foreach($nodes->where('branch_id', '<>', $process->startNode->branch_id)->where('nodeable_type', 'App\\Gate')->sortBy('position') as $node)
                    @include('nodes.panel') 
                    <?php $branch_id = $node->branch_id ?>
                    <div class="row">
                        @foreach($node->nodeable->options as $option)
                            @include('nodes.branch') 
                        @endforeach
                    </div>
                @endforeach

                @if($branch_id != $process->startNode->branch_id) 

                    @foreach($nodes->where('branch_id', $branch_id)->where('nodeable_type', '<>', 'App\\Gate')->sortBy('position') as $node)
                        @include('nodes.panel')
                    @endforeach

                @endif

            @else

            <div class="form-group">
                    <a href="/processes/{{ $process->id}}/events/create/" class="btn btn-default" role="button">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add Start Event
                    </a>
            </div>      
            @endif

    </div>
@stop
