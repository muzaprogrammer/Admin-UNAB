<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  include 'includes/time_zone.php';

  function cargar_secciones(){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT secciones.estado as sec_estado, secciones.*, materias.*, ciclo.* FROM materias INNER JOIN secciones on materias.idmateria=secciones.id_materia INNER JOIN ciclo on ciclo.id_ciclo=secciones.id_ciclo ORDER BY id_seccion DESC");

?>

<table class="dynamicTable tableTools table table-striped" id="tabla_secciones">
	<thead>
    <tr>
      <th style="text-align:center;" width="5%">#</th>
      <th style="text-align:center;">Materia</th>
      <th style="text-align:center;">Seccion</th>
      <th style="text-align:center;">Ciclo</th>
      <th style="text-align:center;">Aula</th>
      <th style="text-align:center;">Cantidad de Alumnos</th>
      <th style="text-align:center;">Horario</th>
      <th style="text-align:center;">Estado</th>
      <th style="text-align:center;">Acciones</th>
    </tr>
	</thead>
	<tbody>
    <?php foreach($query->result_array() as $row){
      if($row['sec_estado']==0){
        $estado="ACTIVA";
        $bgcolor="success";
      }else{
        $estado="INACTIVA";
        $bgcolor="danger";
      }
      $i=1;

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
        <td style="text-align:center;"><?php echo $row['ciclo'];?></td>
        <td style="text-align:center;"><?php echo $row['aula'];?></td>
        <td style="text-align:center;"><?php echo $row['cantidad_alumnos'];?></td>
        <td style="text-align:center;"><?php echo $horario?></td>
        <td align="center">
          <div class="label label-table label-<?php echo $bgcolor;?>" style="font-size: 9pt;"><?php echo $estado;?></div>
        </td>
        <td align="center">
          <span class="btn btn-warning" onclick="editar_seccion(<?php echo $row['id_seccion'];?>);" title="Editar"><i class="fa fa-pencil"></i></span>
          <?
            if($row['sec_estado']==0){
          ?>
              <span class="btn btn-danger" onclick="eliminar_seccion(<?php echo $row['id_seccion'];?>);" title="Dar de baja"><i class="fa fa-trash-o"></i></span>
          <?
            }else{
          ?>
              <span class="btn btn-info" onclick="activar_seccion(<?php echo $row['id_seccion'];?>);" title="Activar"><i class="fa fa-check-circle"></i></span>
          <?
            }
          ?>
        </td>
      </tr>
    <?php $i++; } ?>
  </tbody>
  </table>
  <script>
      $('#tabla_secciones').DataTable({
        "aaSorting": []
        ,"displayLength": 25
      });
  </script>
<?php
  }
?>
