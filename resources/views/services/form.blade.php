<div class="form-group{{ $errors->has('header') ? 'has-error' : ''}}">
    {!! Form::label('header', 'Header', ['class' => 'control-label']) !!}
    {!! Form::text('header', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('header', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('text') ? 'has-error' : ''}}">
    {!! Form::label('text', 'Text', ['class' => 'control-label']) !!}
    {!! Form::textarea('text', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
