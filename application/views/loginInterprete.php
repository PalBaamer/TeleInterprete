<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
    <header>
    <link href="<?php echo base_url('css/navbar-top-fixed.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/estilos.css') ?>" rel="stylesheet">
    <title>TeleInterprete</title>

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

function hideLogin() {
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
}
</script>
<body ><header></header>



    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="<?php echo base_url()?>index.php/inicio">
            <img class="mb-4" src="<?php echo base_url('img/Comunicados.png') ?>" alt="Icono de Inicio" width="72" height="72">
          </a> 
          <a href="<?php echo base_url()?>index.php/Login" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Iniciar Sesion</a>


            <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REGISTRO</button>
			      	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			      		<a class="dropdown-item" href="<?php echo base_url('index.php/MenuAdmin/formularioInterprete') ?>">Interprepete</a>
		      			<a class="dropdown-item" href="<?php echo base_url('index.php/MenuAdmin/formularioUsuario') ?>">Usuario</a>
              </div>
            </div>

    </nav>
    <main role="main" class="container">
    </header>
<section class="loginCampo">
  <form id="" class="form-signin " method='POST' action="<?php echo base_url()?>index.php/LoginInterprete/validarInterprete">

      <h1 class="h3 mb-3 font-weight-normal">Inicia Sesión</h1>
      <label for="inputEmail" class="sr-only">Email </label>
      <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email"  >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" minlength="8" name="inputPassword" placeholder="Contraseña" >
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>
     
    </form>
    <a href="<?php echo base_url()?>index.php/Login"><button class="btn btn-lg btn-primary btn-block form-signin">Soy Usuario</button></a>
</div>
  </body>
</html>