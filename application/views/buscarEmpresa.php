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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.bundle.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
 
  </style>
</head>
<script>

function onLoadBody() {
   var x =  document.getElementsByClassName('editable');
    var i;
for (i = 0; i < x.length; i++) {
  console.log(x[i].readOnly);
  x[i].readOnly = true;

}
document.getElementById("editarVisible").style.display = "block";
  document.getElementById("ocultar").style.display= "none";
  } 
function cambio() {

  var x =  document.getElementsByClassName('editable');
    var i;
for (i = 0; i < x.length; i++) {
  console.log(x[i].readOnly);
  x[i].readOnly = false;

}
  document.getElementById("editarVisible").style.display = "none";
  document.getElementById("ocultar").style.display= "block";


}
</script>


<body class="text-center"  onload="onLoadBody()">
<div id="verEmpresa">

<h1 class="nombreDatos"><?php echo $empresa->nombre ?></h1>


<button id="editarVisible" onclick="cambio();">Editar</button>

<form id="" class="form" action="<?php echo base_url() ?>index.php/menuAdmin/editarEmpresa" method="POST">
                  
<?php
    
    echo '<table class="table table-bordered" id="tablaVerEmpresa"  >

    <input type="hidden" value="'.$empresa->id_empresa.'"  name="inputId_empresa">
    <tr>
            <th >CIF</th>
            <td ><input class="editable" type="text" value="'.$empresa->cif.'" name="inputCif"></td>
            <th align="center">Servicios</th>
    </tr>
    <tr>
        <th >DIRECCIÓN</th>
            <td ><input class="editable" type="text" value="'.$empresa->direccion.'" name="inputDireccion"></td>
    </tr>
    <tr>
          <th >CP</th>
            <td ><input class="editable" type="text" value="'.$empresa->cp.'" name="inputCP"></td>
    </tr>
    <tr>
          <th >CIUDAD</th>
            <td ><input class="editable" type="text" value="'.$empresa->direccion.'" name="inputCiudad"></td>
    </tr>
    <tr>
          <th >PROVINCIA</th>
            <td >
            <input class="editable" type="text" value="'.$empresa->provincia.'" name="inputProvincia"></td>
    </tr>
    <tr>
          <th >PERSONA DE CONTACTO</th>
            <td ><input class="editable" type="text" value="'.$empresa->personal_contacto.'" name="inputPersonal_contacto"></td>
    </tr>
    <tr>
          <th >PERSONA DE CONTACTO</th>
            <td ><input class="editable" type="text" value="'.$empresa->telefono_contacto.'" name="inputTelefono_contacto"></td>
    </tr>';
    

?>
<button class="btn btn-lg btn-primary btn-block" id="ocultar" type="submit" >Guardar Cambios</button>
</form>
</div>
