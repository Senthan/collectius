@extends('layouts.app')
@section('content')
{!! breadcrumb($breadcrumb) !!}

<section class="content" data-ng-controller="UserController">
    <div class="panel panel-default">
        <div class="panel-heading">
            @can('create', new \App\User())
            <a href="#" class="move-top ui small green labeled icon button"><i class="plus icon"></i>Create</a>
            @endcan
            @can('edit', new \App\User())
            <a data-ng-show="selected && selected.read_only != 'Yes'" data-ng-href="@{{ edit_url }}" class="ui small blue labeled icon button" data-ng-cloak><i class="write icon"></i>Edit</a>
            @endcan
            @can('destory', new \App\User())
            <a data-ng-show="selected && selected.read_only != 'Yes'" data-ng-href="@{{ delete_url }}" class="ui small red labeled icon button" data-ng-cloak><i class="minus icon"></i> Delete</a>
            @endcan
        </div>
        <div class="panel-body">
            <div>
                <div data-ui-grid="gridOptions" data-ui-grid-pagination data-ui-grid-selection class="grid"></div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade create-user create-user clearfix" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    {!! Form::open(['url' => route('user.store'), 'user' => 'form', 'class' => 'form-horizontal ui form']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Create user</h4>
      </div>
      <div class="modal-body">
            @include('user._form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@if(isset($user))
<div class="modal fade edit-user clearfix" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    {!! Form::model($user, ['url' => route('user.update', ['user' => $user]), 'user' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'PATCH']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit user</h4>
      </div>
      <div class="modal-body">
            @include('user._form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endif
@endsection
@section('script')
<script>
    app.controller('UserController', ['$scope', '$http', function ($scope, $http) {
        $scope.moduleUrl = "{{ route('user.index') }}/";
        $scope.users = [];
        var columnDefs = [
            { displayName: 'Name', field: 'name'},
            { displayName: 'Email', field: 'email'},
            { displayName: 'Role', field: 'role'}
        ];
        gridOptions.columnDefs = columnDefs;
        gridOptions.onRegisterApi = function (gridApi) {
            $scope.gridApi = gridApi;
            gridApi.selection.on.rowSelectionChanged($scope,function(rows){
                $scope.setSelection(gridApi);
            });
            gridApi.selection.on.rowSelectionChangedBatch($scope,function(rows){
                $scope.setSelection(gridApi);
            });
        };
        $scope.gridOptions = gridOptions;

        $http.get($scope.moduleUrl + '?ajax=true').success(function (items) {
            $scope.users = items.data;
            $scope.gridOptions.data =  items.data;
        });
        $scope.setSelection = function(gridApi) {
            $scope.mySelections = gridApi.selection.getSelectedRows();
            if($scope.mySelections.length == 1) {
                $scope.selected = $scope.mySelections[0];
                $scope.show_url = $scope.moduleUrl + $scope.selected.id + '/policy-category/1/policy';
                $scope.edit_url = $scope.moduleUrl + $scope.selected.id + '/edit';
                $scope.delete_url = $scope.moduleUrl + $scope.selected.id + '/delete';
            } else {
                $scope.selected = null;
            }
        };
    }]);


    $(document).ready(function () {
        $(".move-top").click(function () {
            $('.create-user .name').val('');
           $('.create-user .email').val('');
           $('.create-user .password').val('');
           $('.create-user .role-dropdown').val('');
           $('.create-user .description').val('');
            $('.modal.create-user').modal('show');
        });

        const roleDropdown  = $('.role-dropdown');
        roleDropdown.dropdown({forceSelection: false});
    });
</script>
@endsection