@extends('layouts.app')
@section('content')
    {!! breadcrumb($breadcrumb) !!}

    {!! Form::model($user, ['url' => route('user.update', ['user' => $user]), 'user' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'PATCH']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="ui small button" href="{{ route('user.index') }}">Cancel</a>
        </div>
        <div class="panel-body">
            @include('user._form')
        </div>
        <div class="panel-footer">
            <button class="ui small button blue" type="submit">Update</button>
            <a class="ui small button" href="{{ route('user.index') }}">Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            const roleDropdown  = $('.role-dropdown');
            roleDropdown.dropdown({forceSelection: false});
        });
    </script>
@endsection