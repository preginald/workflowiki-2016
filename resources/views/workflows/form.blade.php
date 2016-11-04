
<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', old('description'),['class' => 'form-control', 'rows' => '3']) }}
</div>
<div class="form-group">
    {{ Form::submit('Save', ['class' => 'btn btn-default']) }} 
</div>
