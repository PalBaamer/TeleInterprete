<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>Menu_Usuario</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

  <!-- Bootstrap core CSS 
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.bundle.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
 
  </style>
</head>
<script>

</script>

<body class="text-center">
<?php
    echo '<h1>Bienvenid@ "'.$interpreteUsuario->nombre.'"</h1>';
   
    
  ?>

<table class="table table-bordered" id="tablaAdmin" BORDER CELLPADDING=10 CELLSPACING=0 >

    <tr class="static" scope="row">
            <th scope="col">Empresa</th>
            <th scope="col">Interprete</th>
            <th scope="col">Usuario</th>
    </tr>
  </thead>
  <tbody>
    <tr>
          <td class="empresa">Buscar empresa por nombre
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


          <td class="interprete">Buscar interprete por nombre
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

          <td class="usuario">Buscar usuario por nombre
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
    <tr>
          <td class="empresa"><a href="<?php echo base_url()?>index.php/menuAdmin/modificarEmpresa">Modificar empresa</a></td>
          <td class="interprete"><a href ="#">Modificar interprete</a></td>
          <td class="usuario"><a href ="#">Modificar usuario</a></td>
    </tr>
    <tr>
          <td class="empresa">Borrar empresa
            <form id="" class="form " method='POST' action="<?php echo base_url()?>index.php/menuAdmin/eliminar_empresa">
            <select class="custom-select" name='empresa'>
                  <?php
                    foreach ($empresa as $nlinea => $valor) {
                        echo '<option class="dropdown-item" value="' . $valor['id_empresa'] . '">' . $valor['nombre'] . '</option>';
                    }
                  ?>
                  </select>
                      <button class="btn btn-lg btn-primary btn-block" type="submit" >borrar</button>
     
                </form>
          </td>
          <td class="interprete">Borrar interprete
          <form id="" class="form" action="<?php echo base_url() ?>index.php/menuAdmin/borrarInterprete" method="POST">
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
          <td class="usuario">Borrar Usuario
          <form id="" class="form" action="<?php echo base_url() ?>index.php/menuAdmin/borrarUsuario" method="POST">
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
          <td class="empresa"><a href="<?php echo base_url()?>index.php/menuAdmin/alta_empresa">Nueva empresa</a></td>
          <td class="interprete"><a href ="#">Nuevo interprete</a></td>
          <td class="usuario"><a href ="#">Nuevo usuario</a></td>
    </tr>
    <tr>
          <td class="empresa"><a href="<?php echo base_url()?>index.php/menuAdmin/facturaEmpresa">Generar factura de empresa</a></td>
          <td class="interprete"><a href ="#">Generar factura</a></td>
    </tr>
    <tr>
          <td class="empresa"><a href ="#">Ver facturas</a></td>
            
    </tr>
  </tbody>
</table>
<!-- 
<form id="" class="form" action="<?php echo base_url() ?>index.php/menuAdmin/buscarEmpresa" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Busca la empresa</h1>
      <select class="custom-select" name='empresa'>
                   /* <?php
                    foreach ($datos as $empresa => $valor) {
                        echo '<option class="dropdown-item" value="' . $valor['id_empresa'] . '">' . $valor['nombre'] . '</option>';
                    }
                    ?>*/
      </select>



      <button class="btn btn-lg btn-primary btn-block" type="submit" >buscar</button>
     
</form>


<form id="" class="form " method='POST' action="<?php echo base_url()?>index.php/menuAdmin/eliminar_empresa">
      <img class="mb-4" src=/src/Comunicados.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">inserta la empresa </h1>
      <label for="inputIDBorrar" class="sr-only">ID </label>
      <input type="text" id="inputIDBorrar" class="form-control" name="inputIDBorrar" placeholder="ID"  >
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" >eliminar</button>
     
    </form> -->


<!-- 
<form id="" class="form" action="<?php echo base_url() ?>index.php/cita/grabarCita" method="POST">
<div class="dropdown-menu">
  
  <a class="dropdown-item" href="#">insertar</a>
  <a class="dropdown-item" href="#">Something else here</a>
</div>
<div class="dropdown-menu">
  <a class="dropdown-item" href="#">Action</a>
  <a class="dropdown-item" href="#">Another action</a>
  <a class="dropdown-item" href="#">Something else here</a>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="#">Separated link</a>
</div>
</form> -->
<div class="dropdown-menu">
  <span class="dropdown-item-text">Dropdown item text</span>
  <a class="dropdown-item" href="#">Action</a>
  <a class="dropdown-item" href="#">Another action</a>
  <a class="dropdown-item" href="#">Something else here</a>
</div>
</body>

</html>