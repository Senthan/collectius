<div class="form-group">
    {!! Form::text('name', null, ['class' => "col-md-12 form-control", 'placeholder' => 'Name']) !!}
    <p class="help-block">{!! ($errors->has('name') ? $errors->first('name') : '') !!}</p>
</div>

<div class="form-group">
    {!! Form::textarea('description', null, ['class' => "col-md-12 form-control", 'placeholder' => 'Description']) !!}
    <p class="help-block">{!! ($errors->has('description') ? $errors->first('description') : '') !!}</p>
</div>