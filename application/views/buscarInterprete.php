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

<h1 class="nombreDatos"><?php echo $interprete->nombre ?></h1>


<a href="<?php echo base_url()?>index.php/MenuAdmin/eliminar_interprete?id_interprete=<?= $interprete->id_interprete ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Borrar Interprete</a>

<form id="" class="form" action="<?php echo base_url() ?>index.php/MenuAdmin/modificarInterprete" method="POST">
<?php
    echo '<table class="table table-bordered" id="tablaVerEmpresa"  >

    <input type="hidden" value="'.$interprete->id_interprete.'"  name="inputId_interprete">
    <tr>
            <th >NOMBRE</th>
            <td ><input class="editable" type="text" value="'.$interprete->nombre.'" name="inputNombre"></td>
    </tr>
    <tr>
        <th >APELLIDO</th>
            <td ><input class="editable" type="text" value="'.$interprete->apellido.'" name="inputApellido"></td>
    </tr>
    <tr>
          <th >APELLIDO 2</th>
            <td ><input class="editable" type="text" value="'.$interprete->apellido2.'" name="inputApellido2"></td>
    </tr>
    <tr>
          <th >DNI</th>
            <td ><input class="editable" type="text" value="'.$interprete->dni.'" name="inputDni"></td>
    </tr>
    <tr>
          <th >DIRECCION</th>
            <td ><input class="editable" type="text" value="'.$interprete->direccion.'" name="inputDireccion"></td>
    </tr>
    <tr>
          <th >PROVINCIA</th>
            <td ><select class="custom-select" name="inputProvincia">';
            
            foreach ($listaProvincia as $provincia => $valor) {
              if( $valor['id_provincia']==$interprete->provincia){
                $selected='selected';
    
              }else{
               $selected='';
              }
                echo '<option class="dropdown-item" value="' . $valor['id_provincia'] .'" '. $selected. '>' . $valor['nombre'] . '</option>';
            }

       echo '</select></td>

    </tr>
    <tr>
          <th >TELÉFONO</th>
            <td ><input class="editable" type="int" value="'.$interprete->telefono.'" name="inputTelefono"></td>
    </tr>
    <tr>
          <th >EMAIL</th>
            <td ><input class="editable" type="text" value="'.$interprete->email.'" name="inputEmail"></td>
    </tr>
    <tr>
          <th >URGENCIAS</th><td>
          <select class="custom-select" name="inputUrgencias">';
   
            if( $valor['urgencias']==$interprete->urgencias){
                echo '<option class="dropdown-item" value="1" selected >SI</option>';
                echo '<option class="dropdown-item" value="0" >No</option>';
            }else{
                echo '<option class="dropdown-item" value="1" >SI</option>';
                echo '<option class="dropdown-item" value="0" selected>No</option>';            
          }

     echo '</select></td>
     </tr>
    <tr>
          <th >CATEGORIA</th>
          <td><select class="custom-select" name="inputCategoria">';
   
          if( $valor['urgencias']==$interprete->urgencias){
              echo '<option class="dropdown-item" value="1" selected >Interprete</option>';
              echo '<option class="dropdown-item" value="0" >Administrador</option>';
          }else{
              echo '<option class="dropdown-item" value="1" >Interprete</option>';
              echo '<option class="dropdown-item" value="0" selected>Administrador</option>';            
        }

   echo '</select></td>

    </tr>
    <tr>
          <th >NÚMERO CUENTA BANCARIA</th>';
          if($interprete->nCC!=null){
            echo' <td ><input class="editable" type="int" value="'.$interprete->nCC.'" name="inputNCC"></td>';
   
          }else{
            echo'   <td ><input class="editable" type="int" value="No hay cuenta" name="inputNCC"></td>';
          }
          echo'
    </tr>
    <tr>
    <td ><a id="editarVisible" href="#" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" onclick="cambio();">Editar</a></td>
    

    <td ><button class="btn btn-lg btn-success btn-block" id="ocultar" type="submit" >Guardar Cambios</button></td>
    
    </tr>';
    

?>
</form>
</div>
