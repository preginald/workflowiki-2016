<div class="panel panel-info">
    <!-- Default panel contents -->
    <div class="panel-heading">
        This workflow has {{ $workflow->steps->count() }} steps.
    </div>

    <!-- List group -->
    <div class="list-group">
        @foreach ($workflow->steps->sortBy('position') as $step)
            <a href="/steps/{{ $step->id }}" class="list-group-item">
                <div class="row">
                    <div class="col-sm-10">
                        <h4 class="list-group-item-heading">
                            {{ $step->position }}. {{ str_limit($step->name, 80) }}
                        </h4>
                    </div>
                    <div class="col-sm-2">
                        <span class="label label-default pull-right">Tasks: {{ $step->tasks->count() }}</span>
                    </div>
                </div>
                <p class="list-group-item-text">{{ $step->description }}</p> 
            </a>
        @endforeach
    </div>
</div>
