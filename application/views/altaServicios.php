<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <div id="formAlta"  class="form d-block">
  <form id="" class="form " method='POST' action="<?php echo base_url()?>index.php/menuAdmin/insertarServicio">
     
      <h1 class="h3 mb-3 font-weight-normal">Inserta la nueva empresa</h1>
      
            <?php 
         
            foreach ($listaCategoria as $nlinea => $valor) {
    
                echo '<option class="dropdown-item" value="' . $valor['id_provincia'] .'">' . $valor['nombre'] . '</option>';
            }
            ?>
            </select>

      <label for="inputCiudad" class="sr-only">Especialidad </label>
      <input type="text" id="inputCiudad" class="form-control" name="inputCiudad" placeholder="Ciudad"  >

      <label for="inputPersonal_contacto" class="sr-only">Dirección</label>
      <input type="text" id="inputPersonal_contacto" class="form-control" name="inputPersonal_contacto" placeholder="Personal_contacto"  >
      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Guardar</button>
     
    </form>

</div>
  </body>
</html>