
<div id="formAlta"  class="form d-block">
  <form id="" class="form " method='POST' action="<?php echo base_url()?>index.php/menuAdmin/insertarInterprete">
     
      <h1 class="h3 mb-3 font-weight-normal">Inserta el nuevo interprete</h1>
      
      <label for="inputNombre" class="sr-only">NOMBRE</label>
      <input type="text" class="form-control" name="inputNombre" placeholder="Nombre">
    
      <label for="inputApellido" class="sr-only">APELLIDO </label>
    <input type="text" class="form-control" name="inputApellido" placeholder="Apellido">

      <label for="inputApellido2" class="sr-only">APELLIDO2 </label>
    <input type="text" class="form-control" name="inputApellido2" placeholder="Apellido2">

    <label for="inputDni" class="sr-only">DNI </label>
    <input type="text" class="form-control" name="inputDni" placeholder="DNI">

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
    <input type="text" class="form-control" name="inputTelefono" placeholder="Telefono">
    
    <label for="inputEmail" class="sr-only">EMAIL </label>
    <input type="email" class="form-control" name="inputEmail" placeholder="Email">
    <label for="inputContrasena" class="sr-only">CONTRASEÑA </label>
    <input type="password" class="form-control" name="inputContrasena" placeholder="Contrasena">
    
    <label for="inputUrgencias" class="sr-only">URGENCIAS </label>
    <select class="custom-select" name="inputCategoria">';
             <option class="dropdown-item" value="1" selected >SI</option>
          <option class="dropdown-item" value="0" >NO</option>          
        
    </select>
    
    <label for="Categoria" class="sr-only">CATEGORIA </label>
    <select class="custom-select" name="inputCategoria">';
             <option class="dropdown-item" value="1" selected >Interprete</option>
          <option class="dropdown-item" value="0" >Administrador</option>          
        
    </select>

   <label for="inputNCC" class="sr-only">Número cuenta bancaria </label>
    <input type="text" class="form-control" name="inputNCC" placeholder="Numero Cuenta Bancaria">
    

<button class="btn btn-lg btn-primary btn-block" id="ocultar" type="submit" >Guardar Cambios</button>
</form>
</div>