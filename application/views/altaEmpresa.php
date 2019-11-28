<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Alta</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS 
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
  </head>

  <body class="text-center">
  <div id="formAlta"  class="form d-block">
  <form id="" class="form " method='POST' action="<?php echo base_url()?>index.php/menuAdmin/insertarEmpresa">
     
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
      <input type="text" id="inputProvincia" class="form-control" name="inputProvincia" placeholder="Provincia id"  >

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