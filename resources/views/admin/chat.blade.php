<!DOCTYPE html>
<html lang="es">
  <head>

     <meta charset="UTF-8">




    <title>{{ config('app.name', 'Siac') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/bootstrap/css/bootstrap.min.css") }}">
 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{ asset("/admin-lte/dist/css/skins/skin-blue.min.css") }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body  class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
      <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>AC</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">{{ config('app.name', 'Siac') }}</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->


              <!-- Tasks Menu -->

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                
                     <img src="{{ asset("/img/myAvatar.png") }}" class="user-image" alt="User Image">
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs">{{ Auth::user()->name }}</span>
               
                 
                </a>

                     <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">

                  @if (Auth::user()->avatar)
                      <img src="{{ asset('uploads/'. Auth::user()->avatar) }}" class="img-circle" alt="User Image"/>
                  @else
                      <img src="{{ asset('/img/myAvatar.png') }}" class="img-circle" alt="User Image">

                  @endif


                  <p>
                    {{ Auth::user()->name }} - {{ Auth::user()->role }}
                    <small>Miembro desde: {{ Auth::user()->created_at }}</small>
                  </p>
                </li>

                <li class="user-footer">

                  <div class="col-xs-8">

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="btn btn-primary btn-flat">
                              Cerrar Sesion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                  </div>
                </li>
              </ul>

              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset("/img/myAvatar.png") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
            </div>
          </div>

          <!-- search form (Optional)
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
           /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <!-- Menus enlazados con las rutas del front vuejs  -->




          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>




      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->

          <div class="container" id="caja-streaming">
            <div class="row">

                <div class="col-md-8" id="chat">
                    <div class="panel panel-default">

                      <div class="panel-heading" id="accordion">
                             <span class="glyphicon glyphicon-comment"></span> Chat
                             <div class="btn-group pull-right">
                                 <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                     <span class="glyphicon glyphicon-chevron-down"></span>
                                 </a>
                             </div>
                      </div>



                       <div class="panel-collapse collapse" id="collapseOne">
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12" >
                              <div id="messages">
                                    <div class="chat-log">
                                        <div class="chat-message" v-for="message in messages">
                                            <p><small>@{{ message[1] }} : </small>@{{ message[2] }} </p>

                                        </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-lg-12" >
                                <div class="chat-composer">
                                    <input  v-model="input" autocomplete="off" placeholder="Escribe un mensaje..." @keyup.enter="post" />

                                    <input type="hidden" v-model="channel" value="">
                                    <input type="hidden" v-model="userName" value="{{ Auth::user()->name }}">

                                    <button @click="post" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->





</div>

    <!-- scripts -->

    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
      SIAC
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2017 <a href="#">Siac</a>.</strong> All rights reserved.
    </footer>
    
     <script src="{{ asset('admin-lte/plugins/jQuery/jquery-3.2.1.min.js') }}"></script>
     <script src="{{ asset('admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>

    <script>

    //  var socket = io("http://socket-seac.herokuapp.com:80");
    var socket=io('http://localhost:8080');

      console.log('cliente cargado..');

      var vm = new Vue({
        el: "#chat",

        data: {
          messages: [],
          input: "",
          channel: "",
          userName: ""
        },
        methods: {
          post: function() {
          //  console.log('mensaje ' + this.input);
            var payload = [this.channel, this.userName, this.input];
          //  console.log(payload);
            socket.emit('chat',payload);
            this.input = ''
          }
        }
      });

    //  console.log(vm.userName);
      socket.on('chat.' + vm.channel, function(payload){
        vm.messages.push(['chat', payload[1], payload[2]]);
        //console.log('mensaje recibido -- ' + payload);
      });




    </script>

  </body>
</html>
