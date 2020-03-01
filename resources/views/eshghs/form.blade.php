<div class="form-group{{ $errors->has('namefc') ? 'has-error' : ''}}">
    {!! Form::label('namefc', 'Namefc', ['class' => 'control-label']) !!}
    {!! Form::text('namefc', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('namefc', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
