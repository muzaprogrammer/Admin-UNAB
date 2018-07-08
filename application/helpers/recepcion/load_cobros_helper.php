<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  include 'includes/time_zone.php';

  function load_cobros_matriculas(){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT * FROM alumnos INNER JOIN inscripciones_ciclo ON  alumnos.idalumno =  inscripciones_ciclo.idalumno WHERE inscripciones_ciclo.estado = 0 AND ADDDATE(fecha_inscripcion, INTERVAL 1 DAY) > NOW()");

?>

<table class="dynamicTable tableTools table table-striped" id="cobros_matriculas">
	<thead>
    <tr>
      <th style="text-align:center;" width="5%">#</th>
      <th style="text-align:center;">Alumno</th>
      <th style="text-align:center;">Estado</th>
      <th style="text-align:center;">Acciones</th>
    </tr>
	</thead>
	<tbody>
    <?php $i=0; foreach($query->result_array() as $row){
        $i++;
        $estado="PENDIENTE";
        $bgcolor="danger";

    ?>
      <tr>
        <td width="5%" style="text-align:center;"><?php echo $i;?></td>
        <td style="text-align:center;"><?php echo $row['nom_completo'];?></td>
        <td align="center">
          <div class="label label-table label-<?php echo $bgcolor;?>" style="font-size: 9pt;"><?php echo $estado;?></div>
        </td>
        <td align="center">
          <span class="btn btn-info" onclick="cobrar(<?php echo $row['id_inscripcion_ciclo'];?>);" title="Cobrar"><i class="fa fa-check"></i></span>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <script>
      $('#cobros_matriculas').DataTable({
        "aaSorting": []
        ,"displayLength": 25
      });
  </script>
<?php
  }
  function load_cobros_solicitudes(){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT * FROM alumnos
    INNER JOIN inscripciones_ciclo ON  alumnos.idalumno =  inscripciones_ciclo.idalumno
    INNER JOIN inscripciones_materias ON inscripciones_materias.id_inscripcion_ciclo = inscripciones_ciclo.id_inscripcion_ciclo
    INNER JOIN solicitud_cambio ON solicitud_cambio.id_inscripcion_materia = inscripciones_materias.id_inscripcion_materia
    INNER JOIN secciones ON inscripciones_materias.id_seccion_materia = secciones.id_seccion
    INNER JOIN materias ON materias.idmateria = secciones.id_materia
    WHERE solicitud_cambio.estado = 0 AND ADDDATE(fecha_solicitud, INTERVAL 1 DAY) > NOW()");

  ?>

  <table class="dynamicTable tableTools table table-striped" id="cobros_solicitudes">
  <thead>
    <tr>
      <th style="text-align:center;" width="5%">#</th>
      <th style="text-align:center;">Alumno</th>
      <th style="text-align:center;">Materia</th>
      <th style="text-align:center;">Estado</th>
      <th style="text-align:center;">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach($query->result_array() as $row){
        $i++;
        $estado="PENDIENTE";
        $bgcolor="danger";

    ?>
      <tr>
        <td width="5%" style="text-align:center;"><?php echo $i;?></td>
        <td style="text-align:center;"><?php echo $row['nom_completo'];?></td>
        <td style="text-align:center;"><?php echo $row['materia'];?></td>
        <td align="center">
          <div class="label label-table label-<?php echo $bgcolor;?>" style="font-size: 9pt;"><?php echo $estado;?></div>
        </td>
        <td align="center">
          <span class="btn btn-info" onclick="cobrar_solicitud(<?php echo $row['id_solicitud'];?>);" title="Cobrar"><i class="fa fa-check"></i></span>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <script>
      $('#cobros_solicitudes').DataTable({
        "aaSorting": []
        ,"displayLength": 25
      });
  </script>
  <?php
  }

?>
