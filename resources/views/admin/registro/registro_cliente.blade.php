<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Registro De Clientes</title>



  <link rel="stylesheet prefetch" href="../css_menu/font-awesome.min.css">

        <link rel="stylesheet" href="css/style.css">





  </head>

  <body>
<form>
    <div class="login-form"  style="width: 450px;">
     <h1>Registro de Cliente</h1>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Nombres" id="UserName" name="nombre" required />
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="text" class="form-control" placeholder="Apellidos" id="apellido" name="apellido" required />
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="text" class="form-control" placeholder="Cedula" id="ced" name="cedula" required />
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="text" class="form-control" placeholder="Direccion" id="direccion" name="direccion" required />
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="text" class="form-control" placeholder="Correo Electronico" id="email" name="email" required />
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="text" class="form-control" placeholder="Telefono Local" id="telefono" name="telefono" required />
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <input type="text" class="form-control" placeholder="Telefono Movil" id="telefono_movil" name="telefono_movil" required />
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Valor Invalido</span>
    <!--  <a class="link" href="#">¿Olvido su contraseña?</a>-->
     <button type="button" class="log-btn" >Registrar</button>
     <a href="../menu.html" class="ex-btn" type="button" >Salir</a>


   </div>
 </form>
    <script src="../js/jquery.min.js"></script>

        <script src="js/index.js"></script>



  </body>
</html>
