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

    <title>Menu_Usuario</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS 
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
  </head>
<script>

</script>
  <body class="text-center">

    <a href="<?php echo base_url()?>index.php/Cita/pideCita"><button class="btn btn-lg btn-primary btn-block">Pide cita</button></a>
    <a href="<?php echo base_url()?>index.php/Cita/urgencias"><button class="btn btn-lg btn-danger btn-block">Urgencias</button></a>
    <a href="<?php echo base_url()?>index.php/Cita/misCitas"><button class="btn btn-lg btn-success btn-block">Mis citas</button></a>
  </body>
</html>