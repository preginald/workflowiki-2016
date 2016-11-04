
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', old('description'),['class' => 'form-control', 'rows' => '3']) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Body') }}
    {{ Form::textarea('body', old('body'),['class' => 'form-control', 'rows' => '3']) }}
</div>
<div class="form-group">
    {{ Form::submit('Save', ['class' => 'btn btn-default']) }} 
    {!! link_to_route($route, 'Back', ['id' => $id] , ['class' => 'btn btn-default']) !!}
</div>
