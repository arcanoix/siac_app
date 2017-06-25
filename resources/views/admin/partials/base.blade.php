<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style>
                        .btnlogin {
            background: #34d947;
            background-image: -webkit-linear-gradient(top, #34d947, #343536);
            background-image: -moz-linear-gradient(top, #34d947, #343536);
            background-image: -ms-linear-gradient(top, #34d947, #343536);
            background-image: -o-linear-gradient(top, #34d947, #343536);
            background-image: linear-gradient(to bottom, #34d947, #343536);
            -webkit-border-radius: 19;
            -moz-border-radius: 19;
            border-radius: 19px;
            text-shadow: 4px 3px 5px #666666;
            font-family: Arial;
            color: #ffffff;
            font-size: 20px;
            padding: 0px 13px 3px 12px;
            text-decoration: none;
            }

            .btnlogin:hover {
            background: #3cb0fd;
            background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
            background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
            text-decoration: none;
            }
    
    </style>
</head>
<body>
    <div id="app">
        
            
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/TweenMax.min.js') }}"></script>
<script src="{{ asset('js/index1.js') }}"></script>

<script src="{{ asset('js/index.js') }}"></script>

</body>
</html>
