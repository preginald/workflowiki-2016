@if($node->type == "Gate")
    <div class="row">
        @foreach($node->nodeable->options as $option)
            <div class="col-md-{{ 12 /$node->nodeable->options->count() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $node->type }} {{ $node->subtype }}</div>
                        <div class="panel-body">
                            {{ $option->name }}
                        </div>
                        <div class="panel-body">
                            @include('nodes.partials.buttons', ['nodeTemplate' => $node])
                        </div>
                        <div class="panel-footer">
                            <span class="label label-default">Node ID {{ $node->id }}</span>
                            <span class="label label-default">Branch {{ $node->branch }}</span>
                            <span class="label label-default">Position {{ $node->position }}</span>
                            <span class="label label-default">Option {{ $option->id }}</span>
                            <span class="label label-default">{{ $node->nodeable_type }}</span>
                        </div>
                </div>
                            @if ($node->nodeable_type == "App\Gate" && $node->nodeable->type_id == 2)
                                    @foreach ($node->nodeable->options as $optionB) 
                                       @foreach (\App\Node::with('nodeable')->where('process_id', $process->id)->where('branch', $optionB->id)->orderBy('position', 'asc')->get() as $nodeB)
                                            @include('nodes.panelb') 
                                       @endforeach
                                    @endforeach
                            @endif
                        @if($process->startNode->count() && ! $process->endNode->count() )
                             <div class="panel panel-default">
                                <div class="panel-body">
                                    <a href="/gates/{{ $option->id}}/events/create/" class="btn btn-default" role="button">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        End Activity
                                    </a>
                                </div>
                             </div>
                        @endif
    
            </div>
        @endforeach
    </div>
@else
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $node->type }} {{ $node->nodeable->type() }}
        </div>
        <div class="panel-body">
            {{ $node->nodeable->name }}
        </div>
        <div class="panel-body">
            @include('nodes.partials.buttons', ['nodeTemplate' => $node])
        </div>
        <div class="panel-footer">
            <span class="label label-default">Node ID {{ $node->id }}</span>
            <span class="label label-default">Branch {{ $node->branch }}</span>
            <span class="label label-default">Position {{ $node->position }}</span>
            <span class="label label-default">{{ $node->nodeable_type }}</span>
        </div>
    </div>
@endif
