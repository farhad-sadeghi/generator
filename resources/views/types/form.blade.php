<div class="form-group{{ $errors->has('picture') ? 'has-error' : ''}}">
    {!! Form::label('picture', 'Picture', ['class' => 'control-label']) !!}
    {!! Form::text('picture', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('picture', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
    {!! Form::number('price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('property1') ? 'has-error' : ''}}">
    {!! Form::label('property1', 'Property1', ['class' => 'control-label']) !!}
    {!! Form::text('property1', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('property1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('property2') ? 'has-error' : ''}}">
    {!! Form::label('property2', 'Property2', ['class' => 'control-label']) !!}
    {!! Form::text('property2', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('property2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('property3') ? 'has-error' : ''}}">
    {!! Form::label('property3', 'Property3', ['class' => 'control-label']) !!}
    {!! Form::text('property3', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('property3', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
