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

  <title>Teleinterprete</title>

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
<?php
    //echo '<h1>Bienvenid@ "'.$interpreteUsuario->nombre.'"</h1>';
      
    //var_dump($empresa->id_empresa);die;
  ?>

<body class="text-center">

<h1 class="nombreDatos"><?php echo $empresa->nombre ?></h1>
<?php
    
    echo '<table class="table table-bordered" id="tablaVerEmpresa"  >

    <tr>
            <th >CIF</th>
            <td >'.$empresa->cif.'</td>
            <th align="center">Servicios</th>
    </tr>
    <tr>
        <th >DIRECCIÓN</th>
            <td >'.$empresa->direccion.'</td>
    </tr>
    <tr>
          <th >CP</th>
            <td >'.$empresa->cp.'</td>
    </tr>
    <tr>
          <th >CIUDAD</th>
            <td >'.$empresa->direccion.'</td>
    </tr>
    <tr>
          <th >PERSONA DE CONTACTO</th>
            <td >'.$empresa->personal_contacto.'</td>
    </tr>
    <tr>
          <th >PERSONA DE CONTACTO</th>
            <td >'.$empresa->telefono_contacto.'</td>
    </tr>

    
    '
    
    
    
    ;
    
    

?>


</body>

</html>