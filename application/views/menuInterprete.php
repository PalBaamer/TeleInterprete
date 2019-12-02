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

    <title>Menu_Usuario</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS 
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
  </head>
<script>

</script>
  <body class="text-center">
  <?php
    echo '<h1>Bienvenid@ "'.$interprete->nombre.'"</h1>';
  
    
  ?>
    <div class="cabecera">

        <!--div id="historial"><a href="<--?php echo base_url()?>index.php/cita/pideCita"><button class="btn btn-lg btn-primary btn-block">Mis citas</button></a><br /></div-->
        <div id="llamada"><a href="<?php echo base_url()?>index.php/menuInterprete/llamar"><button class="btn btn-lg btn-success btn-block">Llamar</button></a></div>
        <div id="historial">Historial
        <table style="width:100%">
            <tr>
              <th>Fecha/HORA</th>
              <th>tipo</th>
              <th>ubicación</th>
              <th>Tiempo</th>
            </tr>
          <?php
          if($interprete==null){
            echo '<tr>
                    <th>No hay citas</th>
                  </tr>';
        }else{

            foreach($historial as $Nlineas->$val){
                  echo '</br><tr>
                  
                    <td>'.$Nlineas->$val['dia'].'  -  '.$Nlineas->$val['hora_inicio'].'</td>
                    <td>'.$Nlineas->$val['centro'].'</td>
                    <td>'.$Nlineas->$val['especialidad'].'</td>
                    <td>'.$Nlineas->$val['total'].'</td>
                  </tr>';
            }
      }
          
          ?>

        </div>
          
    </div>
  </body>
</html>