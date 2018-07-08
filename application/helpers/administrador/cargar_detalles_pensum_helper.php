<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  include 'includes/time_zone.php';

  function cargar_pensum($id){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT * FROM detalle_pensum WHERE id_pensum = ".$id." ORDER BY correlativo ASC");

?>

<table class="dynamicTable tableTools table table-striped" id="tabla_pensum">
	<thead>
    <tr>
      <th style="text-align:center;">Correlativo</th>
      <th style="text-align:center;">Materia</th>
      <th style="text-align:center;">Num Ciclo</th>
      <th style="text-align:center;">Prerequisito</th>
      <th style="text-align:center;">Unidades Valorativas</th>
      <th style="text-align:center;">Estado</th>
      <th style="text-align:center;">Acciones</th>
    </tr>
	</thead>
	<tbody>
    <?php foreach($query->result_array() as $row){
      if($row['estado']==0){
        $estado="ACTIVA";
        $bgcolor="success";
      }else{
        $estado="INACTIVA";
        $bgcolor="danger";
      }

      $query1 = $CI->db->query("SELECT * FROM materias WHERE idmateria = ".$row['id_materia']);
      foreach($query1->result_array() as $row1){
        $materia = $row1['codigo']." - ".$row1['materia'];
      }

      if($row['id_mat_requisito']>0){
        $query2 = $CI->db->query("SELECT * FROM materias WHERE idmateria = ".$row['id_mat_requisito']);
        foreach($query2->result_array() as $row2){
          $prerequisito = $row2['codigo']." - ".$row2['materia'];
        }
      }else{
        $prerequisito = "NINGUNO";
      }

    ?>
      <tr>
        <td width="5%" style="text-align:center;"><?php echo $row['correlativo'];?></td>
        <td style="text-align:center;"><?php echo $materia;?></td>
        <td style="text-align:center;"><?php echo $row['num_ciclo'];?></td>
        <td style="text-align:center;"><?php echo $prerequisito;?></td>
        <td style="text-align:center;"><?php echo $row['unidades_valorativas'];?></td>
        <td align="center">
          <div class="label label-table label-<?php echo $bgcolor;?>" style="font-size: 9pt;"><?php echo $estado;?></div>
        </td>
        <td align="center">
          <span class="btn btn-warning" onclick="editar_pensum(<?php echo $row['id_detalle_pensum'];?>);" title="Editar"><i class="fa fa-pencil"></i></span>
          <?
            if($row['estado']==0){
          ?>
              <span class="btn btn-danger" onclick="eliminar_pensum(<?php echo $row['id_detalle_pensum'];?>,<?=$id?>);" title="Dar de baja"><i class="fa fa-ban"></i></span>
          <?
            }else{
          ?>
              <span class="btn btn-info" onclick="activar_pensum(<?php echo $row['id_detalle_pensum'];?>,<?=$id?>);" title="Activar"><i class="fa fa-check-circle"></i></span>
          <?
            }
          ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <script>
      $('#tabla_pensum').DataTable({
        "aaSorting": []
        ,"displayLength": 25
      });
  </script>
<?php
  }
?>
