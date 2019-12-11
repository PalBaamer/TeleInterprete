<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>



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
<section>
<div id="verEmpresa">
<form id="" class="form" action="<?php echo base_url() ?>index.php/MenuAdmin/editarEmpresa" method="POST">          
<?php
    echo '<table class="table table-bordered" id="tablaVerEmpresa"  >

  
      <h1 class="nombreDatos">'; echo $empresa->nombre ; echo ' </h1>
      
    <input type="hidden" value="'.$empresa->id_empresa.'"  name="inputId_empresa">
    <tr>
            <th >CIF</th>
            <td ><input class="editable" type="text" value="'.$empresa->cif.'" name="inputCif"></td>
          
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
            <td ><input class="editable" type="text" value="'.$empresa->ciudad.'" name="inputCiudad"></td>
    </tr>
    <tr>
          <th >PROVINCIA</th>
            <td ><select class="custom-select" name="inputProvincia">';
            
            foreach ($listaProvincia as $provincia => $valor) {
              if( $valor['id_provincia']==$empresa->provincia){
                $selected='selected';
    
              }else{
               $selected='';
              }
                echo '<option class="dropdown-item" value="' . $valor['id_provincia'] .'" '. $selected. '>' . $valor['nombre'] . '</option>';
            }

       echo '</select></td>

    </tr>
    <tr>
          <th >PERSONA DE CONTACTO</th>
            <td ><input class="editable" type="text" value="'.$empresa->personal_contacto.'" name="inputPersonal_contacto"></td>
    </tr>
    <tr>
          <th >PERSONA DE CONTACTO</th>
            <td ><input class="editable" type="text" value="'.$empresa->telefono_contacto.'" name="inputTelefono_contacto"></td>
    </tr>
    
    <tr>

    <td ><a id="editarVisible" href="#" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" onclick="cambio();">Editar</a></td>
    

    <td ><button class="btn btn-lg btn-success btn-block" id="ocultar" type="submit" >Guardar Cambios</button></td>
    </tr>';
?>
</form>
<br>
<br>
<a href="<?php echo base_url("index.php/MenuAdmin/eliminar_empresa?id_empresa=$empresa->id_empresa" )?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Borrar Empresa</a>
<a href="<?php echo base_url("index.php/MenuAdmin/altaServicios?id_empresa=$empresa->id_empresa")?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Alta Servicios</a>

</div>


<div>

<table class="table table-bordered" id="tablaVerEmpresa"  >

    <tr><h1>SERVICIOS REALIZADOS</h1></tr>
    
    <tr>
        <th> Desde</th>
        <th> Hasta</th>
        <form id="" class="form" action="<?php echo base_url() ?>index.php/MenuAdmin/descargarFactura" method="POST" target= "_blank">
        <input type="hidden" value="<?= $empresa->id_empresa ?>"  name="inputId_empresa">

    <tr>
        <th> <input type="date" name="fecha_inicio"></input></th>
        <th> <input type="date" name="fecha_fin"></input></th>
        <th><button class="btn btn-lg btn-primary btn-block" id="ocultar" type="submit" >Generar Factura</button></th>
        </form>
    <tr>
            <th >Fecha</th>
            <th >Hora de inicio</th>
            <th >Servicio</th>
            <th >Dirección</th>
            <th >Total horas</th>
          
    </tr>
    <tr><?php 
              foreach($historial as $nLinea => $valor){
                  echo '<tr><td>'.$valor['dia'].'</td>

                        <td>'.$valor['hora_inicio'].'</td>
                        <td>'.$valor['centro'].'</td>
                        <td>'.$valor['especialidad'].'</td>
                        <td>'.$valor['total'].'</td></tr>';

              }
            ?>
    </tr>
</div>


</section>

