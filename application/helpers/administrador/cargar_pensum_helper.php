<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  include 'includes/time_zone.php';

  function cargar_pensum(){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT * FROM carreras INNER JOIN pensum on carreras.idcarrera=pensum.id_carrera ORDER BY id_pensum ASC");

?>

<table class="dynamicTable tableTools table table-striped" id="tabla_pensum">
	<thead>
    <tr>
      <th style="text-align:center;" width="5%">#</th>
      <th style="text-align:center;">Carrera</th>
      <th style="text-align:center;">Pensum</th>
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
    ?>
      <tr>
        <td width="5%" style="text-align:center;"><?php echo $row['id_pensum'];?></td>
        <td style="text-align:center;"><?php echo $row['carrera'];?></td>
        <td style="text-align:center;"><?php echo $row['version_pensum'];?></td>
        <td align="center">
          <div class="label label-table label-<?php echo $bgcolor;?>" style="font-size: 9pt;"><?php echo $estado;?></div>
        </td>
        <td align="center">
          <span class="btn btn-warning" onclick="editar_pensum(<?php echo $row['id_pensum'];?>);" title="Editar"><i class="fa fa-pencil"></i></span>
          <span class="btn btn-success" onclick="javascript:window.location='../administrador/datos_pensum?id=<?php echo $row['id_pensum'];?>'" title="Administrar pensum"><i class="fa fa-gear"></i></span>
          <span class="btn btn-inverse" onclick="javascript:window.open('../imprimibles/imprimir/print_pdf_pensum?id=<?=$row['id_pensum']?>')" title="Imprimir"><i class="fa fa-print"></i></span>                  
          <?
            if($row['estado']==0){
          ?>
              <span class="btn btn-danger" onclick="eliminar_pensum(<?php echo $row['id_pensum'];?>);" title="Dar de baja"><i class="fa fa-ban"></i></span>
          <?
            }else{
          ?>
              <span class="btn btn-info" onclick="activar_pensum(<?php echo $row['id_pensum'];?>);" title="Activar"><i class="fa fa-check-circle"></i></span>
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
