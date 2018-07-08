<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  include 'includes/time_zone.php';

  function cargar_carreras(){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT carreras.idcarrera, facultades.facultad, carreras.carrera, carreras.estado FROM carreras INNER JOIN facultades ON carreras.idfacultad=facultades.idfacultad ORDER BY carreras.idcarrera ASC");

?>

<table class="dynamicTable tableTools table table-striped" id="tabla_carreras">
	<thead>
    <tr>
      <th style="text-align:center;" width="5%">#</th>
      <th style="text-align:center;">Facultad</th>
      <th style="text-align:center;">Carreras</th>
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
        <td width="5%" style="text-align:center;"><?php echo $row['idcarrera'];?></td>
        <td style="text-align:center;"><?php echo $row['facultad'];?></td>
        <td style="text-align:center;"><?php echo $row['carrera'];?></td>
        <td align="center">
          <div class="label label-table label-<?php echo $bgcolor;?>" style="font-size: 9pt;"><?php echo $estado;?></div>
        </td>
        <td align="center">
          <span class="btn btn-warning" onclick="editar_carrera(<?php echo $row['idcarrera'];?>);" title="Editar"><i class="fa fa-pencil"></i></span>
          <?
            if($row['estado']==0){
          ?>
              <span class="btn btn-danger" onclick="eliminar_carrera(<?php echo $row['idcarrera'];?>);" title="Dar de baja"><i class="fa fa-ban"></i></span>
          <?
            }else{
          ?>
              <span class="btn btn-info" onclick="activar_carrera(<?php echo $row['idcarrera'];?>);" title="Activar"><i class="fa fa-check-circle"></i></span>
          <?
            }
          ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <script>
      $('#tabla_carreras').DataTable({
        "aaSorting": []
        ,"displayLength": 25
      });
  </script>
<?php
  }
?>
