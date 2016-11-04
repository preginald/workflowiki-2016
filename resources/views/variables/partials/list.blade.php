<div class="panel panel-warning">
    <!-- Default panel contents -->
    <div class="panel-heading">
        This workflow has {{ $workflow->variables->count() }} variables.
    </div>

    <!-- List form -->
    <div class="panel-body">
        {!! Form::open(['action' => 'WorkflowController@fill']) !!}
        <div class="row">
            @foreach ($workflow->variables as $variable)
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="{{ $variable->name }}">{{ $variable->name }}</label>
                        <input type="text" name="{{ $variable->name }}" id="{{ $variable->name }}" value="" class="form-control variables"/>
                    </div>
                </div>    
            @endforeach
        </div>
        <button type="submit" class="btn btn-default switch">Switch</button>
        {!! Form::close() !!}
    </div>
</div>
