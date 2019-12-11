<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<style>#tablaAdmin{
			width:100%;
			
			
            }
            
            .empresa{
			margin: 50%;
			padding:20px;
			background-color:#B0DFF7 ;
		}
		.interprete{
			background-color:#DAF7A6 ;
		}
		.usuario{
			background-color:#F1F794 ;
		}

		.nombreDatos{
			position: absolute;
  			left: 100px;
  			top: 80px;

		}

		#verEmpresa{
			margin-top:40%;

		}
		.tablaVerEmpresa{
			position: absolute;
  			background-color: white;
			left: 100px;
            }
            </style>
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
                <form id="" class="form" action="<?php echo base_url() ?>index.php/MenuAdmin/buscarEmpresa" method="POST">
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
                <form id="" class="form" action="<?php echo base_url() ?>index.php/MenuAdmin/buscarInterprete" method="POST">
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
                <form id="" class="form" action="<?php echo base_url() ?>index.php/MenuAdmin/buscarUsuario" method="POST">
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
            <td class="empresa"><a href="<?php echo base_url()?>index.php/MenuAdmin/altaEmpresa" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nueva empresa</a></td>
            
          <td class="interprete"><a href="<?php echo base_url()?>index.php/MenuAdmin/altaInterprete" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nuevo Usuario</a></td>
          <td class="usuario"><a href="<?php echo base_url()?>index.php/MenuAdmin/altaUsuario" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nuevo Usuario</a></td> 
    </tr>
</table>

