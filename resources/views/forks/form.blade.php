<div class="form-group{{ $errors->has('rf') ? 'has-error' : ''}}">
    {!! Form::label('rf', 'Rf', ['class' => 'control-label']) !!}
    {!! Form::text('rf', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('rf', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
