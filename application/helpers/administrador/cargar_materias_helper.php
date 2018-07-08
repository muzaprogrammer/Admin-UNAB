<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  include 'includes/time_zone.php';

  function cargar_materias(){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT * FROM materias ORDER BY idmateria ASC");

?>

<table class="dynamicTable tableTools table table-striped" id="tabla_materias">
	<thead>
    <tr>
      <th style="text-align:center;" width="5%">#</th>
      <th style="text-align:center;">Codigo</th>
      <th style="text-align:center;">Materia</th>
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
        <td width="5%" style="text-align:center;"><?php echo $row['idmateria'];?></td>
        <td style="text-align:center;"><?php echo $row['codigo'];?></td>
        <td style="text-align:center;"><?php echo $row['materia'];?></td>
        <td align="center">
          <div class="label label-table label-<?php echo $bgcolor;?>" style="font-size: 9pt;"><?php echo $estado;?></div>
        </td>
        <td align="center">
          <span class="btn btn-warning" onclick="editar_materia(<?php echo $row['idmateria'];?>);" title="Editar"><i class="fa fa-pencil"></i></span>
          <?
            if($row['estado']==0){
          ?>
              <span class="btn btn-danger" onclick="eliminar_materia(<?php echo $row['idmateria'];?>);" title="Dar de baja"><i class="fa fa-ban"></i></span>
          <?
            }else{
          ?>
              <span class="btn btn-info" onclick="activar_materia(<?php echo $row['idmateria'];?>);" title="Activar"><i class="fa fa-check-circle"></i></span>
          <?
            }
          ?>
        </td>
      </tr>
    <?php } ?>
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
