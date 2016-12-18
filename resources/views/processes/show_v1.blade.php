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
                @php $oldNode = new App\Node @endphp 
                @foreach($nodes as $node)
                    @if($oldNode->branch_id != $node->branch_id)
                        {{-- this is a new branch --}}
                    
                        @if($node->nodeable_type == "App\\Event" && $node->nodeable->type_id == 1)
                            @include('panels.events.start', ['hideButtons' => true])
                        @endif

                        @if($oldNode->nodeable_type == "App\\Gate" && $oldNode->nodeable->type_id == 1)
                            <div class="row">
                                <div class="col-md-{{ 12 / $optionCount }}">
                                    @include('panels.branch')
                                    @include('nodes.panel')
                        @endif

                        @if($oldNode->nodeable_type == "App\\Activity" && $oldNode->branch->option_id)
                                </div>
                                <div class="col-md-{{ 12 / $optionCount }}">
                            @if($node->branch->option_id)
                                @include('panels.branch')
                            @endif
                        @endif

                        @if($oldNode->nodeable_type == "App\\Gate" && $oldNode->nodeable->type_id == 2)
                            @include('nodes.panel', ['hideButtons' => true])
                        @endif


                    @else
                        {{-- this is a old branch --}}

                        @if($oldNode->nodeable_type == "App\\Event" && $oldNode->nodeable->type_id == 1)
                            @include('nodes.panel')
                        @endif

                        @if($oldNode->nodeable_type == "App\\Activity" && $oldNode->nodeable->type_id == 2)
                            @include('nodes.panel', ['hideButtons' => true])
                            <?php $optionCount = $node->nodeable->options->count() ?>
                        @endif

                        @if($oldNode->nodeable_type == "App\\Activity" && $oldNode->nodeable->type_id == 1)
                            @if($node->nodeable_type == "App\\Gate" && $node->nodeable->type_id == 2)
                                </div></div>
                                @include('nodes.panel', ['hideButtons' => true])
                                <?php $optionCount = 0 ?>
                            @else
                                @include('nodes.panel', ['hideButtons' => true])
                            @endif
                        @endif

                    @endif
                     
                    @php $oldNode = $node @endphp 

                @endforeach
            @endif

    </div>
@stop
