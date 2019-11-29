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
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- Custom styles for this template -->
</head>
<script>

</script>

<body class="text-center">


    <form id="" class="form" action="<?php echo base_url() ?>index.php/cita/grabarCita" method="POST">
        <img class="mb-4" src="<?php echo base_url() ?>application/src/Comunicados.png" alt="" width="72" height="72">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
            </div>

            <select class="custom-select" name='categoria'>
                <?php
                foreach ($listaCategorias as $categoria => $valor) {
                    echo '<option class="dropdown-item" value="' . $valor['id_categoria'] . '">' . $valor['nombre'] . '</option>';
                }
                ?>
            </select>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Centro</label>
                </div>
                <select class="custom-select" name='centro'>
                    <?php
                    foreach ($listaServicios as $servicio => $valor) {
                        echo '<option class="dropdown-item" value="' . $valor['id_servicio'] . '">' . $valor['centro'] . ' , ' . $valor['especialidad'] . '</option>';
                    }
                    ?>

                </select>


                <input type="date" name="fecha"></input>


                <select name='hora'>
                    <?php for ($i = 0; $i < 24; $i++) {
                        echo '<option class="dropdown-item" value="' . $i . '">' . $i . ' : 00h </option>';
                    }
                    ?>
                </select>


                <button class="btn btn-lg btn-primary btn-block" type="submit">siguiente</button>
    </form>


</body>

</html>

3