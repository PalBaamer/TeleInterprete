<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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

            foreach($historial as $Nlineas ){
                  
              echo '</br><tr>
                  
                    <td>'.$Nlineas['dia'].'  -  '.$Nlineas['hora_inicio'].'</td>
                    <td>'.$Nlineas['centro'].'</td>
                    <td>'.$Nlineas['especialidad'].'</td>
                    <td>'.$Nlineas['total'].'</td>
                  </tr>';
                 
                            }
      }
          
          ?>

        </div>
          
    </div>