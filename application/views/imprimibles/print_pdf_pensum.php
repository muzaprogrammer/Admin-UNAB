<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include("mpdf/mpdf.php");
date_default_timezone_set("America/El_Salvador");

$mpdf = new mPDF('',    // mode - default ''
 'LETTER-L',    // format - A4, for example, default ''
 0,     // font size - default 0
 '',    // default font family
 10,    // margin_left
 10,    // margin right
 10,     // margin top
 10,    // margin bottom
 9,     // margin header
 9,     // margin footer
 'L');  // L - landscape, P - portrait
$id=$_GET['id'];


//OBSERVACIONES DE  LA ORDEN
$num_ciclos = 0;
$max_materias = 0;
$query = $this->db->query("SELECT * FROM detalle_pensum WHERE estado = 0 AND id_pensum = ".$id);
foreach($query->result_array() as $row){
  if($row['num_ciclo']>$num_ciclos){
    $num_ciclos = $row['num_ciclo'];
  }
}

$query = $this->db->query("SELECT * FROM carreras INNER JOIN facultades ON carreras.idfacultad = facultades.idfacultad INNER JOIN pensum ON pensum.id_carrera = carreras.idcarrera WHERE id_pensum = ".$id);
foreach($query->result_array() as $row){
  $version_pensum = strtoupper($row['version_pensum']);
  $carrera = strtoupper($row['carrera']);
  $facultad = strtoupper($row['facultad']);
}


$html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pensum</title>
    <link rel="stylesheet" href="'.base_url().'includes/css/style.css" media="all" />
    <style>
      #tr {
          padding: 8px;
          text-align: left;
          border-bottom: 1px solid #ddd;
          text-transform:uppercase;
      }
      </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="encabezado_receta">
          <h2>'.$version_pensum.'<br>'.$facultad.'<br>'.$carrera.'</h2>
        <table id="tabla_antecedentes">
          <tr>';
          for ($i = 1; $i <= $num_ciclos; $i++){
            $html.='<td style="text-align:center"><strong>CICLO '.$i.'</strong>';
            $query = $this->db->query("SELECT * FROM detalle_pensum INNER JOIN materias ON materias.idmateria=detalle_pensum.id_materia WHERE detalle_pensum.estado = 0 AND num_ciclo = ".$i." AND id_pensum = ".$id);
            $j=0;
            foreach($query->result_array() as $row){
              $j++;
                $html.='<table style="border: 1px solid #0000FF; cellpadding=0 cellspacing=0" width="100%">
                  <tr>
                    <td style="border-width: 1px;border: solid; border-color: #0000FF;" height="30px">'.$row['correlativo'].'</td>
                    <td style="border-width: 1px;border: solid; border-color: #0000FF; text-align:right">'.$row['codigo'].'</td>
                  </tr>
                  <tr>
                    <td style="border-width: 1px;border: solid; border-color: #0000FF;text-align:center" height="80px" colspan="2" >'.$row['materia'].'</td>
                  </tr>
                  <tr>
                    <td style="border-width: 1px;border: solid; border-color: #0000FF;" height="30px">'.$row['id_mat_requisito'].'</td>
                    <td style="border-width: 1px;border: solid; border-color: #0000FF; text-align:right">'.$row['unidades_valorativas'].'</td>
                  </tr>

                </table><br>';
            }
            if($j<5){
              for ($k = $j+1; $k <= 5; $k++){
                $html.='<table  width="100%">
                  <tr>
                    <td height="30px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="80px"></td>
                  </tr>
                  <tr>
                    <td height="30px"></td>
                    <td></td>
                  </tr>
                </table><br>';
              }
            }


            $html.='</td>';
          }

          $html.='</tr>

        </table>
      </div>';



      $html.='
    </header>
  </body>
</html>';


//$mpdf->showImageErrors = true;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
//$mpdf->SetFooter($footer);
$mpdf->Output();
exit;

?>
