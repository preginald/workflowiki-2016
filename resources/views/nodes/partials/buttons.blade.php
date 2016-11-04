@if(($nodeTemplate->nodeable_type == "App\\Event") ||$nodeTemplate->nodeable_type == "App\\Activity" && $nodeTemplate->nodeable->type_id == 1)
    <a href="/nodes/{{ $nodeTemplate->id}}/activities/create/" class="btn btn-default" role="button">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Activity
    </a>
@endif

@if($nodeTemplate->nodeable_type == "App\\Activity" && $nodeTemplate->nodeable->type_id == 2)
    <a href="/nodes/{{ $nodeTemplate->id}}/gateoptions/create/" class="btn btn-default" role="button">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Option
    </a>
@endif

@if($nodeTemplate->nodeable_type == "App\\Gate")
    <a href="/gates/{{ $option->id}}/activities/create/" class="btn btn-default" role="button">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Activity
    </a>
@endif
