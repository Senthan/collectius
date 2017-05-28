@extends('layouts.app')
@section('content')
    {!! breadcrumb($breadcrumb) !!}
    {!! Form::model($role, ['url' => route('role.destroy', ['role' => $role]), 'role' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'DELETE']) !!}

    {!! Form::hidden('id', null) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="ui small button" href="{{ route('role.index') }}">Cancel</a>
        </div>
        <div class="panel-body">
            @if($errors->has('id'))
            <p class="alert alert-info">{{ $errors->first('id') }}</p>
            @else
                <p>Do you really want to delete this ({{ $role->name }}) role?</p>
            @endif
        </div>
        <div class="panel-footer">
            @unless($errors->has('id'))
               <button class="ui small button red" type="submit">Delete</button>
            @endunless
            <a class="ui small button" href="{{ route('role.index') }}">Cancel</a>

        </div>
    </div>
    {!! Form::close() !!}
@endsection