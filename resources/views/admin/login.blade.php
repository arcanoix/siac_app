<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="UTF-8">
    <title>Acceso al sistema SIAC</title>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Hind:300" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{ asset('css/style.css')}}">

  </head>

  <body>

      <div id="">
          <h1 style="text-align: center;">Sistema de Identificación de Averias para CANTV</h1>
      </div>

      <div class="cssToolTip">
             <div id="login-button">

                <img src="../img/Logo_Siac.png" >
             </div>
            <span>Haga click para iniciar seccion </span>
      </div>

<div id="container">
  <h1>Acceso</h1>
  <span class="close-btn" >
    <img src="image/circle_close_delete_-128.png">
  </span>

  <form>
    <input type="email" name="email" placeholder="Usuario" required/>
    <input type="password" name="pass" placeholder="Contraseña" required/>
    <a href="menu.html">Accesar</a>
    <div id="remember-container">
      <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
      <span id="remember">Recordar</span>
      <span id="forgotten">Olvide contraseña</span>
    </div>
</form>


<!-- Forgotten Password Container -->
<div id="forgotten-container">
   <h1>Olvide clave</h1>
  <span class="close-btn">
    <img href="image/circle_close_delete_-128.png">
  </span>

  <form>
    <input type="email" name="email" placeholder="E-mail">
    <a href="#" class="orange-btn">Get new password</a>
</form>
</div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="{{ asset('js/TweenMax.min.js') }}"></script>
    

        <script src="{{ asset('js/index.js') }}"></script>



  </body>
</html>
