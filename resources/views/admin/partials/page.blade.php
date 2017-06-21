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
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css')}}"> -->
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style>
body{
  width: 100%;
  /*background-color: rgba(71, 121, 204, 0.9);*/
  background-repeat: no-repeat;
  background-image: url('../img/Fondos01.jpg');

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
