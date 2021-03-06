<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
    {{-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> --}}
</head>
<body>

    @yield('content')
    @yield('scripts')

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
