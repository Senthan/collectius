<div class="form-group">
    {!! Form::text('name', null, ['class' => "name col-md-12 form-control", 'placeholder' => 'Name']) !!}
    <p class="help-block">{!! ($errors->has('name') ? $errors->first('name') : '') !!}</p>
</div>

<div class="form-group">
    {!! Form::text('email', null, ['class' => "email col-md-12 form-control", 'placeholder' => 'Email']) !!}
    <p class="help-block">{!! ($errors->has('email') ? $errors->first('email') : '') !!}</p>
</div>
@if(!isset($user))
<div class="form-group">
    {!! Form::password('password', null, ['class' => "password col-md-12 form-control", 'placeholder' => 'Password']) !!}
    <p class="help-block">{!! ($errors->has('password') ? $errors->first('password') : '') !!}</p>
</div>

<div class="form-group">
    {!! Form::password('password_confirmation', null, ['class' => " password-confirmation col-md-12 form-control", 'placeholder' => 'Confirm Password']) !!}
    <p class="help-block">{!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation') : '') !!}</p>
</div>
@endif
<div class="form-group">
    <select name="role" class="ui search fluid selection dropdown role-dropdown clearfix">
        <option value="">Select Role</option>
        @foreach($roles as $key => $role)
            <option {{ isset($user) && $key == $user->role_id  ? 'selected' : '' }} value="{{ $key }}">{{ $role }}</option>
        @endforeach
    </select>
    <p class="help-block"> {!! ($errors->has('role_id') ? $errors->first('role_id') : '') !!}</p>
</div>

<div class="form-group">
    {!! Form::textarea('description', null, ['class' => "description col-md-12 form-control", 'placeholder' => 'Description']) !!}
    <p class="help-block">{!! ($errors->has('description') ? $errors->first('description') : '') !!}</p>
</div>
