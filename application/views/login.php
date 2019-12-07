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

    <title>Comunicados</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS 
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
  <script src="<?php base_url()?>/js/funciones.js">
  </script>

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

<body >
  <header>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/navbar-top-fixed.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/estilos.css') ?>" rel="stylesheet">



    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
 

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          <a class="navbar-brand" href="<?php echo base_url()?>index.php/inicio">
            <img class="mb-4" src="<?php echo base_url('img/Comunicados.png') ?>" alt="Icono de Inicio" width="72" height="72">
          </a>  
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url()?>index.php/inicio">Inicio <span class="sr-only">(current)</span></a>
          </li>

        </ul>
      </div>
    </nav>
    <main role="main" class="container">
    </header>

<section class="loginCampo">
 
  <form class="form-signin " action="<?php echo base_url()?>index.php/login/validarUsuario" method="POST">
      <img class="mb-4" src="<?php echo base_url()?>application/src/Comunicados.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Inicia Sesión</h1>
      <label for="inputEmail" class="sr-only">Email </label>
      <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email"  >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" name="inputPassword" placeholder="Contraseña" >
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recuerdame
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>
    </form>
    <a href="<?php echo base_url()?>index.php/loginInterprete"><button class="btn btn-lg btn-primary btn-block">Soy Interprete</button></a></div>
    </section>