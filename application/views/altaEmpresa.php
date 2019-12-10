<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <div id="formAlta"  class="form d-block">
  <form id="" class="form " method='POST' action="<?php echo base_url()?>index.php/MenuAdmin/insertarEmpresa">
     
      <h1 class="h3 mb-3 font-weight-normal">Inserta la nueva empresa</h1>
      
      <label for="inputCif" class="sr-only">Cif </label>
      <input type="text" id="inputCif" class="form-control" name="inputCif" placeholder="Cif"  >

      <label for="inputNombre" class="sr-only">Nombre </label>
      <input type="text" id="inputNombre" class="form-control" name="inputNombre" placeholder="Nombre"  >
      
      <label for="inputDireccion" class="sr-only">Direccion </label>
      <input type="text" id="inputDireccion" class="form-control" name="inputDireccion" placeholder="Direccion"  >

      <label for="inputCP" class="sr-only">CP </label>
      <input type="text" id="inputCP" class="form-control" name="inputCP" placeholder="CP"  >

      <label for="inputProvincia" class="sr-only"> ID provincia </label>
      <select class="custom-select" name="inputProvincia">';
            <?php 
         
            foreach ($listaProvincia as $nlinea => $valor) {
    
                echo '<option class="dropdown-item" value="' . $valor['id_provincia'] .'">' . $valor['nombre'] . '</option>';
            }
            ?>
            </select>

      <label for="inputCiudad" class="sr-only">Ciudad </label>
      <input type="text" id="inputCiudad" class="form-control" name="inputCiudad" placeholder="Ciudad"  >

      <label for="inputPersonal_contacto" class="sr-only">Persona de Contacto </label>
      <input type="text" id="inputPersonal_contacto" class="form-control" name="inputPersonal_contacto" placeholder="Personal_contacto"  >
      
      <label for="inputTelefono_contacto" class="sr-only">Teléfono de Contacto </label>
      <input type="text" id="inputTelefono_contacto" class="form-control" name="inputTelefono_contacto" placeholder="Telefono_contacto"  >
      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Guardar</button>
     
    </form>

</div>
  </body>
</html>