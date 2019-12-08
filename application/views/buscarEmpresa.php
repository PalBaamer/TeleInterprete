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
<div id="verEmpresa">

<h1 class="nombreDatos"><?php echo $empresa->nombre ?></h1>


<button id="editarVisible" onclick="cambio();">Editar</button>

<button class="btn btn-lg btn-danger"><a href="<?php echo base_url()?>index.php/menuAdmin/eliminar_empresa?id_empresa=<?= $empresa->id_empresa ?>" >Borrar Empresa</a></button>
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
    </tr>';
    

?>
<button class="btn btn-lg btn-primary btn-block" id="ocultar" type="submit" >Guardar Cambios</button>
</form>
</div>
