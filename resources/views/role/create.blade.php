@extends('layouts.app')
@section('content')
    {!! breadcrumb($breadcrumb) !!}
    {!! Form::open(['url' => route('role.store'), 'role' => 'form', 'class' => 'form-horizontal ui form']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
        <a class="ui small button" href="{{ route('role.index') }}">Role</a>
        </div>
        <div class="panel-body">
            @include('role._form')
        </div>
        <div class="panel-footer">
            <button class="ui small button green" type="submit">Create</button>
            <a class="ui small button" href="{{ route('role.index') }}">Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection