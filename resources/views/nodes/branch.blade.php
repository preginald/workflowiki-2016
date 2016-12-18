<?php $optionCount = $node->nodeable->options->count(); ?>
    <div class="col-md-{{ 12 / $optionCount }}">
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
                    <span class="label label-default">Branch {{ $node->branch_id }}</span>
                    <span class="label label-default">Position {{ $node->position }}</span>
                    <span class="label label-default">Option {{ $option->id }}</span>
                    <span class="label label-default">{{ $node->nodeable_type }}</span>
                </div>
        </div>

        @foreach($nodes->where('branch_id', App\Branch::where('option_id', $option->id)->value('id'))->where('nodeable_type', '<>', 'App\\Gate')->sortBy('position') as $node)
            @include('nodes.panel')
        @endforeach
        <?php $branch = App\Branch::find($node->branch_id) ?> 
        @if($branch->node_out == 0)
            @include('nodes.branches.endactivity')
        @endif
    </div>

