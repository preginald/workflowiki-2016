<div class="panel panel-default">
    <div class="panel-heading">{{ $node->type }}</div>
    <div class="panel-body">{{ $node->nodeable->name }}</div>
    @if(!isset($hideButtons))
    <div class="panel-body">
        @include('nodes.partials.buttons', ['nodeTemplate' => $node])
    </div>
    @endif
    <div class="panel-footer">
        <span class="label label-default">Node ID {{ $node->id }}</span>
        <span class="label label-default">Branch {{ $node->branch_id }}</span>
        <span class="label label-default">Position {{ $node->position }}</span>
        <span class="label label-default">{{ $node->nodeable_type }}</span>
    </div>
</div>
