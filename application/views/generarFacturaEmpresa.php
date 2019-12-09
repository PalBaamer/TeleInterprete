<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section>
    
<div>
<button class="btn btn-lg btn-primary"><a href="<?php echo base_url()?>index.php/menuAdmin/generarFacturaPDF">Factura PDF</a></button>
<table class="table table-bordered" id="tablaVerEmpresa"  >


<tr>
    <td><img class="mb-4" src="<?php echo base_url('img/Comunicados.png') ?>" alt="Icono de Inicio" width="72" height="72"></td>
    <td>Comunicados</td>
    <td>28698456T</td>
    <td>C\Antonio Nebrija,3</td>
    <td>28013 Madrid Madrid</td>
</tr>
<tr>
   <td><?php echo $empresa->nombre ?></td>
   <td><?php echo $empresa->cif ?></td>
   <td><?php echo $empresa->direccion ?></td>
   <td><?php echo $empresa->cp."  ".$empresa->provincia."  ".$empresa->ciudad ?></td>
</tr>
</table>


<table class="table table-bordered" id="tablaVerEmpresa"  >

    <tr><h1>SERVICIOS REALIZADOS</h1></tr>
    <tr>
            <th >Fecha</th>
            <th >Hora de inicio</th>
            <th >Servicio</th>
            <th >Dirección</th>
            <th >Total horas</th>
          
    </tr>
    <tr><?php //var_dump($historial);die;
              foreach($historial as $nLinea => $valor){
                  echo '<tr><td>'.$valor['dia'].'</td>

                        <td>'.$valor['hora_inicio'].'</td>
                        <td>'.$valor['centro'].'</td>
                        <td>'.$valor['especialidad'].'</td>
                        <td>'.$valor['total'].'</td></tr>';

              }
            ?><th >IVA</th>
            <td id="iva">21%</td>
    </tr>
    </table>
</div>


</section>
<button class="btn btn-lg btn-primary btn-block"><a href ="<?php echo base_url()?>index.php/menuAdmin/descargarFactura">Descargar PDF</a></button>
