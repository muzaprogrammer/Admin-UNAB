<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  include 'includes/time_zone.php';

  function cargar_alumnos($datos){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT estado, idalumno, nom_completo, nombre, apellido, carnet FROM alumnos WHERE nom_completo LIKE '%$datos%' GROUP BY idalumno");

?>

<table class="dynamicTable tableTools table table-striped" id="alumnos">
	<thead>
    <tr>
      <th style="text-align:center;" width="5%">Carnet</th>
      <th style="text-align:center;">Nombres</th>
      <th style="text-align:center;">Apellidos</th>
      <th style="text-align:center;">Estado</th>
      <th style="text-align:center;">Acciones</th>
    </tr>
	</thead>
	<tbody>
    <?php foreach($query->result_array() as $row){
      if($row['estado']==0){
        $estado="ACTIVO";
        $bgcolor="success";
      }else{
        $estado="INACTIVO";
        $bgcolor="danger";
      }
    ?>
      <tr>
        <td width="5%" style="text-align:center;"><?php echo $row['carnet'];?></td>
        <td style="text-align:center;"><?php echo $row['nombre'];?></td>
        <td style="text-align:center;"><?php echo $row['apellido'];?></td>
        <td align="center">
          <div class="label label-table label-<?php echo $bgcolor;?>" style="font-size: 9pt;"><?php echo $estado;?></div>
        </td>
        <td align="center">
          <a class="btn btn-info" href="../administrador/datos_alumno?id=<?php echo $row['idalumno'];?>" title="Datos generales"><i class="fa fa-user"></i></a>          
          <span class="btn btn-danger" onclick="eliminar_alumno(<?php echo $row['idalumno'];?>);" title="Dar de baja"><i class="fa fa-trash-o"></i></span>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <script>
      $('#alumnos').DataTable({
        "aaSorting": []
        ,"displayLength": 25
      });
  </script>
<?php
  }
?>
