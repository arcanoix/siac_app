<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Siac') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/skins/skin-blue.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->



<body class="skin-blue sidebar-mini sidebar-collapse" style="height: auto;">

<div id="app">

              @yield('content')

</div>



<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- jQuery 3.2.1-->
<script src="{{ asset('admin-lte/plugins/jQuery/jquery-3.2.1.min.js') }}"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/admin-lte/dist/js/app.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/moment-with-locales.js')}}"></script>
    <script>
        function reloj(){
          time_act = moment().locale('es');
          time = time_act.format('MMMM Do YYYY, h:mm:ss a');
         document.getElementById('reloj').innerHTML= time;
          setTimeout('reloj()',1000);
        }
        window.onload = function(){
          reloj();
        }
    </script>


</body>
</html>
