<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>



    <form id="" class="form" action="<?php echo base_url() ?>index.php/cita/grabarCita" method="POST">

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


