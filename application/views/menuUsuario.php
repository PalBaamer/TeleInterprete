<?php
defined('BASEPATH') OR exit('No direct script access allowed');


    echo '<h1>Bienvenid@ "'.$usuario->nombre.'"</h1>';
  
    
  ?>
  <div class="cabecera">
  </br>
      <div id="llamada"><a href="<?php echo base_url()?>index.php/Cita/pideCita?id_usuario=<?=$usuario->id_usuario?>"><button class="btn btn-lg btn-primary btn-block">Pide cita</button></a></div></br>
      
      <div id="emergencias"><a href="<?php echo base_url()?>index.php/menuUsuario/llamada"><button class="btn btn-lg btn-danger btn-block">Urgencias</button></a></div></br>
      <div id="historial">Historial
      <table style="width:100%">
          <tr>
            <th>Fecha/HORA</th>
            <th>tipo</th>
            <th>ubicación</th>
            <th>Tiempo</th>
          </tr>
        <?php
        if($usuario==null){
          echo '<tr>
                  <th>No hay citas</th>
                </tr>';
      }else{
           if($historial==null){
              echo '<tr>
              <th>No hay citas</th>
              </tr>';
           }else{

           
          foreach($historial as $Nlineas){
                echo '</br><tr>
                
                  <td>'.$Nlineas['dia'].'  -  '.$Nlineas['hora_inicio'].'</td>
                  <td>'.$Nlineas['centro'].'</td>
                  <td>'.$Nlineas['especialidad'].'</td>
                  <td>'.$Nlineas['total'].'</td>
                </tr>';
          }
        }
    }
        
        ?>

      </div>
        
  </div>
</body>
</html>

    
  </body>
</html>