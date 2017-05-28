@extends('layouts.app')
@section('content')
    {!! breadcrumb($breadcrumb) !!}

    {!! Form::model($role, ['url' => route('role.update', ['role' => $role]), 'role' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'PATCH']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="ui small button" href="{{ route('role.index') }}">Cancel</a>
        </div>
        <div class="panel-body">
            @include('role._form')
        </div>
        <div class="panel-footer">
            <button class="ui small button blue" type="submit">Update</button>
            <a class="ui small button" href="{{ route('role.index') }}">Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection