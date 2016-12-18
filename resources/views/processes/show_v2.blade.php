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
                @php $oldNode = $process @endphp 
                @foreach($nodes->groupBy('branch_id') as $branchNodes)
                    @foreach($branchNodes->sortBy('position') as $node)
                        @if($oldNode->branch_id != $node->branch_id)
                            {{-- this is a new branch --}}
                            @if($oldNode->nodeable_type == "App\\Gate" && $oldNode->nodeable->type_id == 1)
                                <div class="row">
                                    <div class="col-md-{{ 12 / $optionCount }}">
                            @endif

                            @if($oldNode->nodeable_type == "App\\Activity" && $oldNode->branch->option_id)
                                    </div>
                                    <div class="col-md-{{ 12 / $optionCount }}">
                            @endif

                            @if($node->nodeable_type == "App\\Gate" && $node->nodeable->type_id == 2)
                                </div></div>
                                @include('nodes.panel', ['hideButtons' => true])
                                <?php $optionCount = 0 ?>
                            @endif

                        @endif

                        @if($node->nodeable_type == "App\\Event" && $node->nodeable->type_id == 1)
                            @include('panels.events.start', ['hideButtons_' => true])
                        @endif

                        @if($node->nodeable_type == "App\\Activity")
                            @include('nodes.panel', ['hideButtons_' => true])
                        @endif

                        @php $oldNode = $node @endphp 

                    @endforeach
                    
                    @if($node->nodeable_type == "App\\Gate" && $node->nodeable->type_id == 1)
                        @include('nodes.panel', ['hideButtons' => true])
                        <?php $optionCount = $node->nodeable->options->count() ?>
                        @include('panels.options')
                    @endif
                        
                @endforeach
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
