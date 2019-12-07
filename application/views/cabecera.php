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

<body class="text-center">
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
          <a class="navbar-brand" href="<?php echo base_url()?>index.php/menuAdmin">
            <img class="mb-4" src="<?php echo base_url('img/Comunicados.png') ?>" alt="Icono de Inicio" width="72" height="72">
          </a>  
          </li>
          <li class="nav-item">
    <?php
        
      echo '<a class="navbar-brand" href="'.base_url().'index.php/menuAdmin">Inicio</a>';
      die;
        switch ($sesionUsuario['categoria']){
          case 0:
          echo '<a class="navbar-brand" href="'.base_url().'index.php/menuAdmin">Inicio</a>';
          break;
        
          case 1:
          echo '<a class="navbar-brand" href="'.base_url().'index.php/menuInterprete">Inicio</a>';
          break;

          default:
          echo '<a class="navbar-brand" href="'. base_url().'index.php/menuUsuario">Inicio</a>';
          break;

        }
      ?>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>index.php/miPerfil">Mi perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>index.php/cerrarSesion">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="container">
    </header>
    
