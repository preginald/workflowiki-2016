<div class="row">
    @foreach($node->nodeable->options as $option)
    <div class="col-md-{{ 12 / $optionCount }}">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $option->name }}</div>
            <div class="panel-body">
                <a href="/gates/{{ $option->id}}/activities/create/" class="btn btn-default" role="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Add Activity
                </a>
            </div>
            <div class="panel-footer">
                <span class="label label-default">Option {{ $option->id }}</span>
            </div>
        </div>
    </div>
    @endforeach 
</div>
