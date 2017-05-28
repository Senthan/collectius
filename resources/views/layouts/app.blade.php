<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" data-ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Collectius</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css')  }}">
    <link href="{{ asset('/components/semantic/dist/semantic.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('components/angular-ui-grid/ui-grid.min.css') }}">
    <link rel="stylesheet" href="/components/toastr/toastr.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Collectius
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- <li class="{{ request()->is('product') ? 'active' : '' }}"><a href="{{ route('product.index') }}">Product <span class="sr-only">(current)</span></a></li> -->
        
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle {{ request()->is('setting') ? 'active' : '' }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li class="dropdown">
                                @can('index', new \App\User())
                                    <a href="{{ route('user.index') }}"> User Management</a>
                                @endcan
                                @can('index', new \App\Role())
                                    <a href="{{ route('role.index') }}"> Role Management</a>
                                @endcan
                             </li>
                          </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </div>

          <!-- Scripts -->
    <script type="text/javascript" src="{{  asset('components/jquery/dist/jquery.min.js') }}"></script>


    <script src="{{ asset('/components/semantic/dist/semantic.min.js') }}"></script>
    <script type="text/javascript" src="{{  asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/components/angular/angular.js') }}"></script> 
    <script src="/components/angular-ui-grid/ui-grid.min.js"></script>
    <script src="/components/toastr/toastr.min.js"></script>


    <script type="text/javascript">
    var app = angular.module('app', ['ui.grid', 'ui.grid.selection', 'ui.grid.pagination']);
    app.run(['$http', function ($http) {
        $http.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
        $http.defaults.cache = false;
    }]);

    var gridOptions = {
            enableSorting: true,
            enableFiltering: true,
            paginationPageSizes: [50, 100, 500, 1000],
            paginationPageSize: 100,
            enableRowSelection: true,
            enableSelectAll: true,
            selectionRowHeaderWidth: 35,
            rowHeight: 35,
            multiSelect:false,
            columnDefs: [
            ]
        };
    </script>


        
    @section('script')

    @show


</body>
</html>
