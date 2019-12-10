<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>

</script>
  <body class="text-center">
  <?php
    echo '<h1>Bienvenid@ '.$interpreteDatos->nombre.'</h1>';
  
    
  ?>
    <div class="cabecera">

        <!--div id="historial"><a href="<--?php echo base_url()?>index.php/Cita/pideCita"><button class="btn btn-lg btn-primary btn-block">Mis citas</button></a><br /></div-->
        <div id="llamada"><a href="<?php echo base_url()?>index.php/MenuInterprete/llamada"><button class="btn btn-lg btn-success btn-block">Llamar</button></a></div>
        <div id="historial">Historial
        <table style="width:100%">
            <tr>
              <th>Fecha/HORA</th>
              <th>tipo</th>
              <th>ubicación</th>
              <th>Tiempo</th>
            </tr>
            <tr><?php
          if($interpreteDatos==null){
            echo '<th>No hay citas</th>
                  </tr>';
        }else{

            foreach($historial as $Nlineas ){
                 //var_dump($historial);die;
              echo '</br><tr>
              <input type="hidden" value="'.$Nlineas['id_citas'].'"  name="id_cita">
              
                    <td>'.$Nlineas['dia'].'  -  '.$Nlineas['hora_inicio'].'</td>
                    <td>'.$Nlineas['centro'].'</td>
                    <td>'.$Nlineas['especialidad'].'</td>
                    <td>'.$Nlineas['total'].'</td>';
                    
                  if($Nlineas['dia'] > date('Y-m-d')){
                    echo '<td><a href="'. base_url('index.php/MenuInterprete/llamada?id_cita='.$Nlineas['id_citas'].'').'">llamar</a></td>';
                  }

                  '</tr>';
                 
                            }
      }
          
          ?>

        </div>
          
    </div>