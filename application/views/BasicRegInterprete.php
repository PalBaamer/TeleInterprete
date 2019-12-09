<!doctype html>
<html lang="es">
  <head>
    
  <title>Comunicados</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">


    <!-- Bootstrap core CSS 
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php base_url("/css/estilos.css")?>">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
  <script src="<?php base_url("/js/validaciones.js")?>">
  </script>

    <!-- Custom styles for this template -->
  </head>

<body class="text-center">
  <header>
    <link href="<?php echo base_url('css/estilos.css') ?>" rel="stylesheet">



    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="<?php echo base_url()?>index.php/inicio">
            <img class="mb-4" src="<?php echo base_url('img/Comunicados.png') ?>" alt="Icono de Inicio" width="72" height="72">
          </a> 
            <a class="nav-link" href="<?php echo base_url()?>index.php/login">Iniciar Sesion</a>


            <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REGISTRO</button>
			      	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			      		<a class="dropdown-item" href="<?php echo base_url('BasicRegInterprete') ?>">Interprepete</a>
		      			<a class="dropdown-item" href="<?php echo base_url('BasicRegUsuario') ?>">Usuario</a>
              </div>
            </div>

    </nav>
    </header>


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
    <input type="text" class="form-control" minlength="9" maxlength="9" name="inputTelefono" placeholder="Telefono">
    
    <label for="inputEmail" class="sr-only">EMAIL </label>
    <input type="email" class="form-control" name="inputEmail" placeholder="Email">
    <label for="inputContrasena" class="sr-only">CONTRASEÑA </label>
    <input type="password" class="form-control" name="inputContrasena" placeholder="Contrasena">
    
    <label for="inputUrgencias" class="sr-only">URGENCIAS </label>
    <select class="custom-select" name="inputCategoria">
            
            <option class="dropdown-item" selected >Quiere trabajar en urgencias</option>
            <option class="dropdown-item" value="1"  >SI</option>
            <option class="dropdown-item" value="0" >NO</option>          
        
    </select>
    
    <label for="Categoria" class="sr-only">CATEGORIA </label>
    <select class="custom-select" name="inputCategoria">
    <option class="dropdown-item" selected >Selecciona la categoria</option>
             <option class="dropdown-item" value="1" >Interprete</option>
          <option class="dropdown-item" value="0" >Administrador</option>          
        
    </select>

   <label for="inputNCC" class="sr-only">Número cuenta bancaria </label>
    <input type="text" class="form-control" name="inputNCC" placeholder="Numero Cuenta Bancaria">
    

<button class="btn btn-lg btn-primary btn-block" id="ocultar" type="submit" >Guardar Cambios</button>
</form>
</div>