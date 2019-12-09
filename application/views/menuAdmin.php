<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
    echo '<h1>Bienvenid@ "'.$interpreteDatos->nombre.'"</h1>';
   
    
  ?>


<table  id="tablaAdmin">

    <tr>
            <th scope="col">Empresa</th>
            <th scope="col">Interprete</th>
            <th scope="col">Usuario</th>
    </tr>
    <tr>
          <td class="empresa">Ver empresa
                <form id="" class="form" action="<?php echo base_url() ?>index.php/menuAdmin/buscarEmpresa" method="POST">
                <select class="custom-select" name='empresa'>
                <?php  
                    foreach ($empresa as $nlinea => $valor) {
                        echo '<option class="dropdown-item" value="' . $valor['id_empresa'] . '">' . $valor['nombre'] . '</option>';
                    }
                  ?>
                  </select>
                      <button class="btn btn-lg btn-primary btn-block" type="submit" >buscar</button>
     
                </form>
          </td>


          <td class="interprete">Ver interprete
                <form id="" class="form" action="<?php echo base_url() ?>index.php/menuAdmin/buscarInterprete" method="POST">
                      <select class="custom-select" name='interprete'>
                       <?php
                          foreach ($interprete as $nlinea => $valor) {
                              echo '<option class="dropdown-item" value="' . $valor['id_interprete'] . '">' . $valor['nombre'] . '</option>';
                          }
                        ?>
                        </select>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" >buscar</button>
                        
                      </form>
          </td>

          <td class="usuario">Ver usuario por nombre
                <form id="" class="form" action="<?php echo base_url() ?>index.php/menuAdmin/buscarUsuario" method="POST">
                      <select class="custom-select" name='usuario'>
                       <?php
                          foreach ($usuario as $nlinea => $valor) {
                            echo '<option class="dropdown-item" value="' . $valor['id_usuario'] . '">' . $valor['nombre'] . '</option>';
                    }
                        ?>
                        </select>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" >buscar</button>

                      </form>
          </td>
    </tr>
   
    </tr>
          <td class="empresa"><button class="btn btn-lg btn-primary"><a href="<?php echo base_url()?>index.php/menuAdmin/alta_empresa">Nueva empresa</a></button></td>
          <td class="interprete"><button class="btn btn-lg btn-primary btn-block"><a href ="<?php echo base_url()?>index.php/menuAdmin/altaInterprete">Nuevo interprete</a></button></td>
          <td class="usuario"><button class="btn btn-lg btn-primary btn-block"><a href ="<?php echo base_url()?>index.php/menuAdmin/altaUsuario">Nuevo usuario</a></button></td>
    </tr>
    <button class="btn btn-lg btn-primary btn-block"><a href ="<?php echo base_url()?>index.php/menuAdmin/hacerLlamada">hacerLlamada</a></button>
</table>

