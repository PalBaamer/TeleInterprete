<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<br><br><br><br>
    <form id="" class="form" action="<?php echo base_url() ?>index.php/Cita/insertaCita" method="POST">
    <table class="table" style="width:100%">
           <h1>Escoge un Interprete</h1>
            
        
                <?php 
               // <input class="card-img-top" type="image" name="boton" src="../src/boton.jpg" align="middle">

                //'<div class="card-body">';
               // var_dump($interpretesDispo);die;
                    foreach ($interpretesDispo as $nLinea =>$valor) {
                       
                        echo '<tr><td><h5 class="card-title" >'.$valor['nombre'].'</h5> </td>
                        <input type="hidden" name="id_interprete" value="'.$valor['id_interprete'].'">
                        
                        <td> <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button></td></tr> ';
                    }
                ?>

        
    </form>
