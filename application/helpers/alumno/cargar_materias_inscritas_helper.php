<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  include 'includes/time_zone.php';

  function cargar_materias_inscritas($id){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT * FROM secciones
      INNER JOIN materias ON secciones.id_materia = materias.idmateria
      INNER JOIN detalle_pensum ON detalle_pensum.id_materia = materias.idmateria
      INNER JOIN inscripciones_materias ON inscripciones_materias.id_seccion_materia=secciones.id_seccion
      WHERE id_inscripcion_ciclo = ".$id);
?>

<table class="dynamicTable tableTools table table-striped" id="tabla_materias">
	<thead>
    <tr>
      <th style="text-align:center;" width="5%">#</th>
      <th style="text-align:center;">Materia</th>
      <th style="text-align:center;">Seccion</th>
      <th style="text-align:center;">Aula</th>
      <th style="text-align:center;">Horario</th>
      <th style="text-align:center;">Acciones</th>
    </tr>
	</thead>
	<tbody>
    <?php $i=1; foreach($query->result_array() as $row){
      $lunes=$row['lunes'];
      $martes=$row['martes'];
      $miercoles=$row['miercoles'];
      $jueves=$row['jueves'];
      $viernes=$row['viernes'];
      $sabado=$row['sabado'];
      $domingo=$row['domingo'];

      $horario="";
      if($lunes==1){
        $horario.="lun - ";
      }
      if($martes==1){
        $horario.="mar - ";
      }
      if($miercoles==1){
        $horario.="mie - ";
      }
      if($jueves==1){
        $horario.="jue - ";
      }
      if($viernes==1){
        $horario.="vie - ";
      }
      if($sabado==1){
        $horario.="sab - ";
      }
      if($domingo==1){
        $horario.="dom - ";
      }

      $horario.=date("g:i a",strtotime($row['hora_desde']))." - ";
      $horario.=date("g:i a",strtotime($row['hora_hasta']));

    ?>
      <tr>
        <td width="5%" style="text-align:center;"><?=$i?></td>
        <td style="text-align:center;"><?php echo $row['materia'];?></td>
        <td style="text-align:center;"><?php echo $row['seccion'];?></td>
        <td style="text-align:center;"><?php echo $row['aula'];?></td>
        <td style="text-align:center;"><?php echo $horario?></td>
        <td align="center">
          <?
          $query2 = $CI->db->query("SELECT * FROM inscripciones_ciclo WHERE id_inscripcion_ciclo = ".$id);
          foreach($query2->result_array() as $row2){
            if($row2['estado']==0){?>
              <span class="btn btn-danger" onclick="eliminar_materia(<?php echo $row['id_inscripcion_materia'];?>);" title="Quitar"><i class="fa fa-trash-o"></i></span>
            <?}else{?>
              <span class="btn btn-info" onclick="cambiar_seccion(<?php echo $row['id_inscripcion_materia'];?>);" title="Quitar"><i class="fa fa-eye"></i></span>
            <?}
          }
          ?>
        </td>
      </tr>
    <?php $i++; } ?>
  </tbody>
  </table>
  <script>
      $('#tabla_materias').DataTable({
        "aaSorting": []
        ,"displayLength": 25
      });
  </script>
<?php
  }
?>
