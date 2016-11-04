@if($nodeB->branch == $option->id)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $nodeB->type }} {{ $nodeB->nodeable->type() }}
        </div>
        <div class="panel-body">
            {{ $nodeB->nodeable->name }}
        </div>
        <div class="panel-body">
            @include('nodes.partials.buttons', ['nodeTemplate' => $nodeB])
        </div>
        <div class="panel-footer">
            <span class="label label-default">Node ID {{ $nodeB->id }}</span>
            <span class="label label-default">Branch {{ $nodeB->branch }}</span>
            <span class="label label-default">Position {{ $nodeB->position }}</span>
            <span class="label label-default">{{ $nodeB->nodeable_type }}</span>
        </div>
    </div>
@endif
