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

<h1 class="nombreDatos"><?php echo $usuario->nombre ?></h1>

<?php
if($sesionUsuario==0){
echo '<a href="'. base_url().'index.php/MenuAdmin/eliminar_usuario?id_usuario='. $usuario->id_usuario.'" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Borrar Usuario</a>';
}
?>
<form id="" class="form" action="<?php echo base_url() ?>index.php/MenuAdmin/modificarUsuario" method="POST">
<?php
    echo '<table class="table table-bordered" id="tablaVerEmpresa"  >

    <input type="hidden" value="'.$usuario->id_usuario.'"  name="inputId_usuario">
    <tr>
            <th >NOMBRE</th>
            <td ><input class="editable" type="text" value="'.$usuario->nombre.'" name="inputNombre"></td>
    </tr>
    <tr>
        <th >APELLIDO</th>
            <td ><input class="editable" type="text" value="'.$usuario->apellido.'" name="inputApellido"></td>
    </tr>
    <tr>
          <th >APELLIDO 2</th>
            <td ><input class="editable" type="text" value="'.$usuario->apellido2.'" name="inputApellido2"></td>
    </tr>
    <tr>
          <th >DNI</th>
            <td ><input class="editable" type="text" value="'.$usuario->dni.'" name="inputDni"></td>
    </tr>
    <tr>
          <th >DIRECCION</th>
            <td ><input class="editable" type="text" value="'.$usuario->direccion.'" name="inputDireccion"></td>
    </tr>
    <tr>
          <th >PROVINCIA</th>
            <td ><select class="custom-select" name="inputProvincia">';
            
            foreach ($listaProvincia as $provincia => $valor) {
              if( $valor['id_provincia']==$usuario->provincia){
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
            <td ><input class="editable" type="int" value="'.$usuario->telefono.'" name="inputTelefono"></td>
    </tr>
    <tr>
          <th >EMAIL</th>
            <td ><input class="editable" type="text" value="'.$usuario->email.'" name="inputEmail"></td>
    </tr>
    <tr>
    <td ><a id="editarVisible" href="#" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" onclick="cambio();">Editar</a></td>
    

    <td ><button class="btn btn-lg btn-success btn-block" id="ocultar" type="submit" >Guardar Cambios</button></td>
    
    </tr>'
    

?>
</form>
</div>
