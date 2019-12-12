<script src="<?php echo base_url('js/validaciones.js') ?>">

  </script>
<br>
<br>
<br>

<div id="formAlta"  class="form d-flex p-2 justify-content-center" style="max-width: 50%;">

  <form id="" class="form " method='POST' action="<?php echo base_url()?>index.php/MenuAdmin/insertarUsuario">
  <input type="hidden" class="form-control" name="registroUsuario" value="<?= $registroUsuario?>">
      <h1 class="h3 mb-3 font-weight-normal">Inserta el nuevo usuario</h1>
      
      <label for="inputNombre" class="sr-only">NOMBRE</label>
      <input type="text" class="form-control" name="inputNombre" placeholder="Nombre" required onblur="validarNombre(this);">
    
      <label for="inputApellido" class="sr-only">APELLIDO </label>
    <input type="text" class="form-control" name="inputApellido" placeholder="Apellido" required onblur="validarNombre(this);">

      <label for="inputApellido2" class="sr-only">APELLIDO2 </label>
    <input type="text" class="form-control" name="inputApellido2" placeholder="Apellido2" onblur="validarNombre(this);">

    <label for="inputDni" class="sr-only">DNI </label>
    <input type="text" class="form-control" name="inputDni" maxlength="9" placeholder="DNI" required onblur="validarDNI(this);">

    <label for="inputDireccion" class="sr-only">DIRECCION </label>
    <input type="text" class="form-control" name="inputDireccion" placeholder="Direccion">

    <label for="inputProvincia" class="sr-only">PROVINCIA </label>
    <select class="custom-select" name="inputProvincia">';
            <?php 
         
            foreach ($listaProvincia as $nlinea => $valor) {
    
                echo '<option class="dropdown-item" value="' . $valor['id_provincia'] .'">' . $valor['nombre'] . '</option>';
            }
            ?>
            </select>

    <label for="inputTelefono" class="sr-only">TELÉFONO </label>
    <input type="text" class="form-control" minlength="8" maxlength="9" name="inputTelefono" placeholder="Telefono" required onblur="validarTelefono(this);">
    
    <label for="inputEmail" class="sr-only">EMAIL </label>
    <input type="email" class="form-control" name="inputEmail" placeholder="Email" required onblur="validarEmail(this);">
    <label for="inputContrasena" class="sr-only">CONTRASEÑA </label>
    <input type="password" class="form-control" name="inputContrasena" placeholder="Contrasena" required onblur="validarContrasena(this);">
    

<button class="btn btn-lg btn-primary btn-block" id="ocultar" type="submit" >Crear Usuario</button>
</form>
</div>
