<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <div id="#page-content-wrapper" class="wrap">

        <nav class="navbar navbar-expand navbar-dark bg-primary fixed-top">
            <a id="menu-toggle" class="navbar-brand">
                <span class="navbar-toggler-icon"></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div id="wrapper">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li><img src="{{ asset(Auth::user()->avatarPath) }}"> </li>
                    <li class="sidebar-brand"> <span> {{Auth::user()->name}} </span> </li>
                    <li> <a href="/admin/users">Users</a> </li>
                    <li> <a href="/admin/gifts">Gifts</a> </li>
                    <li> <a href="#">News</a> </li>
                    <li> <a href="#">Reports</a> </li>
                </ul>
            </div>
        </div>
    </div>

    @yield('content')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    @yield('scripts')

</body>
</html>
