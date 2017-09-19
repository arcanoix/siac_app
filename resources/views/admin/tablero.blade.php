@extends('admin.partials.base_tablero')

@section('content')
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SI</b>AC</span>
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
                 <li class="active">
              <a href="#" id="reloj">Hora</a>
            </li>
       

            <!-- Tasks Menu -->

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->

                @if (Auth::user()->avatar)
                                    <img src="{{ asset('uploads/'. Auth::user()->avatar) }}" class="user-image" alt="User Image"/>
                @else
                                   <img src="{{ asset('/img/myAvatar.png') }}" class="user-image img-responsive"/>
                @endif

                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->nombre }}</span>
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

                    {{ Auth::user()->nombre }} - 

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
            <!-- Control Sidebar Toggle Button
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>-->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            @if (Auth::user()->avatar)
                <img src="{{ asset('uploads/'. Auth::user()->avatar) }}" class="img-circle" alt="User Image"/>
            @else
                <img src="{{ asset('/img/myAvatar.png') }}" class="img-circle" alt="User Image">

            @endif

           

          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->nombre }}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>


                            
             <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="">
                              Cerrar Sesion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                  
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


            <router-link tag="li" to="/tablero">
                <a><i class="fa fa-tachometer"></i> <span>Tablero</span></a>
            </router-link>
           
          @role('Administrador')
                <router-link tag="li" to="/users">
                    <a><i class="fa fa-user"></i> <span>Usuarios</span></a>
                </router-link>

                <router-link tag="li" to="/empresas">
                   <a> <i class="fa fa-building"></i> <span>Empresas</span></a>
                </router-link>

                <router-link tag="li" to="/clientes">
                  <a> <i class="fa fa-users"></i> <span>Clientes</span></a>
                </router-link>

                 <router-link tag="li" to="/ads">
                  <a> <i class="fa fa-font"></i> <span>Ads</span></a>
                </router-link>
  

                  <router-link tag="li" to="/mangas">
                    <a><i class="fa fa-link"></i><span>Mangas</span></a>
                  </router-link>


                  <router-link tag="li" to="/numero_telefonico">
                  <a> <i class="fa fa-tty"></i> <span>Numero Telefonico</span></a>
                </router-link>

                <li class="treeview">
                      <a href="#"><i class="fa fa-cogs"></i> <span>Configuracion</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                          <router-link tag="li" to="/servicios">
                              <a> <i class="fa fa-suitcase"></i> <span>Servicios</span></a>
                          </router-link>
                          <router-link tag="li" to="/tanque">
                              <a> <i class="fa fa-suitcase"></i> <span>Tanque</span></a>
                          </router-link>
                          <router-link tag="li" to="/central">
                                <a> <i class="fa fa-suitcase"></i> <span>Central</span></a>
                          </router-link>
                          <router-link tag="li" to="/sector">
                                <a> <i class="fa fa-suitcase"></i> <span>Sector</span></a>
                          </router-link>

                          
                      </ul>
                 </li>

                 <router-link tag="li" to="/log">
                            <a><i  class="fa fa-book"></i><span>Log</span></a>
            </router-link>

            @endrole

           <router-link tag="li" to="/fallas">
              <a> <i class="fa fa-link"></i> <span>Fallas</span></a>
            </router-link>

            

            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="http://127.0.0.1:8000/falla_reporte" target="_blank"> <i class="fa fa-suitcase"></i> <span>Fallas</span></a></li>
                  <li>  <a href="http://127.0.0.1:8000/cliente_reporte" target="_blank"> <i class="fa fa-suitcase"></i> <span>Clientes</span></a></li>
                  <li>  <a href="http://127.0.0.1:8000/usuario_reporte" target="_blank"> <i class="fa fa-suitcase"></i> <span>Usuarios</span></a></li>

              </ul>
            </li>
      <!-- -->
          
 
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
   @if(Auth::user()->status == "Activo")
      <router-view></router-view>

        @else
             <section class="content">

                <!-- Your Page Content Here -->
                    <h5>Su cuenta a sido deshabilitada, Contacte al Administrador</h5>
             

              </section>
       @endif
       
      </section>



                
               
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
     



    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
        
      <div class="pull-right hidden-xs">
      
       <img src="{{ asset('img/Cantv_logo.PNG')}}" alt="" style="width: 90px; height: 30px">
      </div>
      <!-- Default to the left -->
      <strong>2017 <a href="#">Sistema de Identificación de Averias | CANTV</h3></a>.</strong> Todos los derechos reservados.
    </footer>

    <!-- Control Sidebar -->
    
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

@endsection
