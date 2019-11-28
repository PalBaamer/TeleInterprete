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

    <form id="" class="form-signin " action="<?php echo base_url() ?>index.php/cita/grabarCita" method="POST">
        <img class="mb-4" src="<?php echo base_url() ?>application/src/Comunicados.png" alt="" width="72" height="72">

        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categoria
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php 
                    foreach ($listaCategorias as $categoria => $valor) {
                        echo '<li class="dropdown-item">"' . $valor . '"</li>';
                    } 
                ?>
            </div>
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Servicios
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php
                foreach($listaServicios as $servicio => $valor){
                    echo '<li class="dropdown-item">"'.$valor.'"</li>';
                ?>

            </div>

            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hora
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php
                foreach($listaServicios as $servicio => $valor){
                    echo '<li class="dropdown-item">"'.$valor.'"</li>';
                ?>

            </div>


        </div>
        </div>

        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" name="inputPassword" placeholder="Contraseña">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Recuerdame
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>


</body>

</html>