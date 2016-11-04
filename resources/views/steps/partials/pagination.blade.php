<div class="form-group">
    @if($step->previous)
        <a class="btn btn-default" href="/steps/{{ $step->previous->id }}" role="button">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Previous Step
        </a>
    @else
        <a class="btn btn-default" disabled="disabled" >Previous Step</a>
    @endif

    <a class="btn btn-default" href="/steps/{{ $step->id }}/edit/" role="button">
        <i class="fa fa-pencil" aria-hidden="true"></i>
        Edit Step
    </a>

    @if($step->next)
        <a class="btn btn-default" href="/steps/{{ $step->next->id }}" role="button">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            Next Step
        </a>
    @else
        <a class="btn btn-default" href="/steps/create/{{ $step->workflow_id }}" role="button">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add Step
        </a>
    @endif
</div>
