<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


        
    <form id="" class="form" action="<?php echo base_url() ?>index.php/cita/insertaCita" method="POST">
        
        
                <?php 
               // <input class="card-img-top" type="image" name="boton" src="../src/boton.jpg" align="middle">

                //'<div class="card-body">';
               // var_dump($interpretesDispo);die;
                    foreach ($interpretesDispo as $nLinea =>$valor) {
                       
                        echo '<h5 class="card-title" >'.$valor['nombre'].'</h5> </br>
                        <input type="hidden" name="id_interprete" value="'.$valor['id_interprete'].'">
                        <div class="card" style="width: 18rem;"><input type="hidden"></input>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button> ';
                    }
                ?>
        
    </form>
