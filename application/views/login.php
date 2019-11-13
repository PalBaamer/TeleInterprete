<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS 
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
  </head>
<script>
/*function hideLogin() {
  var usuario = document.getElementById("formUsuario");
  var interprete = document.getElementById("formInterprete");
  if ($("#formUsuario").hasClass("d-block")) {
    $("#formUsuario").removeClass('d-none');
    $("#formUsuario").addClass('d-block');

    $("#formInterprete").addClass('d-block');
    $("#formInterprete").removeClass('d-none');
  } else {
    $("#formInterprete").removeClass('d-none');
    $("#formInterprete").addClass('d-block');
    
    $("#formUsuario").addClass('d-block');
    $("#formUsuario").removeClass('d-none');
  }
}*/
</script>
  <body class="text-center">
  <div id="formUsuario"  class=" form-signin d-block">
  <form id="" class="form-signin ">
      <!--img class="mb-4" src=/src/Comunicados.png" alt="" width="72" height="72"-->
      <h1 class="h3 mb-3 font-weight-normal">Inicia Sesión</h1>
      <label for="inputEmail" class="sr-only">Email </label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email"  >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" >
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recuerdame
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>
    </form>
    <a href="http://127.0.0.1/www/teleinterprete/index.php/loginInterprete"><button class="btn btn-lg btn-primary btn-block">Soy Interprete</button></a></div>
  </body>
</html>