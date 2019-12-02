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

    <title>Pide cita</title>

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

        
    <form id="" class="form" action="<?php echo base_url() ?>index.php/cita/grabarCita" method="POST">
        
        
                <?php 
                echo '<img src="..." class="card-img-top" alt="..." width= 50px>
                <div class="card-body">';
                    foreach ($interpretesDispo as $categoria => $valor) {
                        echo '<h5 class="card-title">'.$valor['nombre'].'</h5> </br>
                        <div class="card" style="width: 18rem;">
                        <div id="interprete"><a href="<?php echo base_url()?>index.php/cita/insertCita"><button name="'.$valor['id_interprete'].'" class="btn btn-lg btn-success btn-block">Guardar cita</button></a></div>';
                    } 
                    /*
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    
  </div>
*/
                ?>
        </div>
    

       <!-- onchange="getval(this);-->
        
    </form>


</body>

</html>