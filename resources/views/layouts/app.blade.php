<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AgroHelp') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel='stylesheet' href="{{ asset('glyphicons-only-bootstrap/css/bootstrap.min.css') }}"/>

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
                    <a class="navbar-brand" href="{{ url('home') }}"><img src="{{ asset('uploads/Logo2.png') }}" height="45px" >
                       
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li ><a href="{{ url('home') }}" class="">Home</a></li>
                        <li ><a href="{{ url('fields') }}" class="">Fields</a></li> 
                        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Finance<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                                <li><a href="{{ url('finance/loans') }}">Loans</a></li>
                                <li><a href="{{ url('finance/purchases') }}">Purchases</a></li>
                                <li><a href="{{ url('finance/sales') }}">Sales</a></li>
                                <li><a href="{{ url('finance/bank') }}">Bank Account</a></li>
                                </ul></li>
                        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Resources<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                                <li><a href="{{ url('resources/employees') }}">Employees</a></li>
                                <li><a href="{{ url('resources/machines') }}">Machines</a></li>
                                <li><a href="{{ url('resources/deposit') }}">Warehouse</a></li>
                                <li><a href="{{ url('resources/lessors') }}">Lessors</a></li>
                                <li><a href="{{ url('resources/documents') }}">Documents</a></li>
                                </ul></li>
                        <li ><a href="#" class="">Analyze</a></li>
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                <img src="{{ asset('uploads/avatars')}}/{{ Auth::user()->avatar }}" style="width:32px; height:32px;    margin-top: -3px; position:absolute; top:10px; left:10px; border-radius:50%">
                                            {{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</body>
</html>
