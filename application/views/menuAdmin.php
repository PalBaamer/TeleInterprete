<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
  <link rel="" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.bundle.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
 
  </style>
</head>
<script>

</script>

<body class="text-center">
<form id="" class="form" action="<?php echo base_url() ?>index.php/menuAdmin/buscarEmpresa" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Busca la empresa</h1>
      <select class="custom-select" name='empresa'>
                    <?php
                    foreach ($datos as $empresa => $valor) {
                        echo '<option class="dropdown-item" value="' . $valor['id_empresa'] . '">' . $valor['nombre'] . '</option>';
                    }
                    ?>
      </select>



      <button class="btn btn-lg btn-primary btn-block" type="submit" >buscar</button>
     
</form>
<a class="" href="<?php echo base_url()?>index.php/menuAdmin/modificarEmpresa">modificar</a></br><br>
<a class="" href="<?php echo base_url()?>index.php/menuAdmin/alta_empresa">insertar</a></br><br>


<form id="" class="form " method='POST' action="<?php echo base_url()?>index.php/menuAdmin/eliminar_empresa">
      <!--img class="mb-4" src=/src/Comunicados.png" alt="" width="72" height="72"-->
      <h1 class="h3 mb-3 font-weight-normal">inserta la empresa </h1>
      <label for="inputIDBorrar" class="sr-only">ID </label>
      <input type="text" id="inputIDBorrar" class="form-control" name="inputIDBorrar" placeholder="ID"  >
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" >eliminar</button>
     
    </form>


<a class="" href="<?php echo base_url()?>index.php/menuAdmin/facturaEmpresa">generar factura</a></br>

<!-- 
<form id="" class="form" action="<?php echo base_url() ?>index.php/cita/grabarCita" method="POST">
<div class="dropdown-menu">
  
  <a class="dropdown-item" href="#">insertar</a>
  <a class="dropdown-item" href="#">Something else here</a>
</div>
<div class="dropdown-menu">
  <a class="dropdown-item" href="#">Action</a>
  <a class="dropdown-item" href="#">Another action</a>
  <a class="dropdown-item" href="#">Something else here</a>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="#">Separated link</a>
</div>
</form> -->

</body>

</html>