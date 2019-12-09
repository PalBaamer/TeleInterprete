<?php
defined('BASEPATH') or exit('No direct script access allowed');

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
?>

<section>
    
<div>


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
</div>


</section>

<?php
 $content = ob_get_contents();
 ob_end_clean();
 $obj_pdf->writeHTML($content, true, false, true, false, '');
 $obj_pdf->Output('output.pdf', 'I');
 ?>