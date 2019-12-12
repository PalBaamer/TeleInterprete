<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <div id="formAlta"  class="form d-block">
  <form id="" class="form " method='POST' action="<?php echo base_url()?>index.php/MenuAdmin/insertarServicio">
     
      <h1 class="h3 mb-3 font-weight-normal">Inserta la nueva empresa</h1>
      
       
    <input type="hidden" value=" <?= $id_empresa ?>"  name="inputId_empresa">
      <select name='categoria'>
          <option class="dropdown-item" value="" selected>Escoge una categoria</option>
           
            <?php
             foreach ($listaCategorias as $nlinea => $valor) {
    
                echo '<option class="dropdown-item" value="' . $valor['id_categoria'] .'">' . $valor['nombre'] . '</option>';
            }
            ?>
            </select>

      <label for="inputEspecialidad" class="sr-only">Especialidad </label>
      <input type="text" id="inputEspecialidad" class="form-control" name="inputEspecialidad" placeholder="dpto, espcialidad, area"  >

      <label for="inputDireccion" class="sr-only">Dirección</label>
      <input type="text" id="inputDireccion" class="form-control" name="inputDireccion" placeholder="N.oficina, calle"  >
      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Guardar</button>
     
    </form>

</div>
  </body>
</html>
