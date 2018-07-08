<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  public function load_inscripcion($id){
    $query = $this->db->query("SELECT * FROM alumnos INNER JOIN inscripciones_ciclo ON  alumnos.idalumno =  inscripciones_ciclo.idalumno WHERE (inscripciones_ciclo.estado = 0 OR inscripciones_ciclo.estado = 1)  AND alumnos.idalumno = ".$id);
    foreach($query->result_array() as $row){
      echo $row['id_inscripcion_ciclo'];
    }
  }

  public function load_respuesta($id)
  {
    $query = $this->db->query("SELECT COUNT(*) as num FROM alumnos INNER JOIN inscripciones_ciclo ON  alumnos.idalumno =  inscripciones_ciclo.idalumno WHERE (inscripciones_ciclo.estado = 0 OR inscripciones_ciclo.estado = 1)  AND alumnos.idalumno = ".$id);
    foreach($query->result_array() as $row){
      $num = $row['num'];
    }
    if($num>0){
      $query = $this->db->query("SELECT COUNT(*) as num FROM alumnos INNER JOIN inscripciones_ciclo ON  alumnos.idalumno =  inscripciones_ciclo.idalumno WHERE (inscripciones_ciclo.estado = 1)  AND alumnos.idalumno = ".$id);
      foreach($query->result_array() as $row){
        $inscrito = $row['num'];
      }
      $query = $this->db->query("SELECT COUNT(*) as num,ADDDATE(fecha_inscripcion, INTERVAL 1 DAY) as fecha FROM alumnos INNER JOIN inscripciones_ciclo ON  alumnos.idalumno =  inscripciones_ciclo.idalumno WHERE (inscripciones_ciclo.estado = 0)  AND alumnos.idalumno = ".$id);
      foreach($query->result_array() as $row){
        $fecha = $row['fecha'];
      }
      if($inscrito==1){
        echo 2;
      } else if($fecha >= date('Y-m-d H:i:s')){
        echo 1;
      } else {
        echo 0;
      }
    }else{
      echo 0;
    }
  }

  public function inscribir_ciclo($id,$ciclo){
    $query = $this->db->query("SELECT * FROM alumnos WHERE idalumno = ".$id);
    foreach ($query->result_array() as $row) {
      $nombre_alumno = $row['nom_completo'];
    }
    $data = array(
      'idalumno' => $id,
      'idciclo' => $ciclo,
      'fecha_inscripcion' => date('Y-m-d H:i:s'),
      'estado' => 0
    );
    if($this->db->insert("inscripciones_ciclo",$data)){
      $accion = "Se inscribio";
      echo $this->db->insert_id();
      $this->vitacora_model->vitacora_2($accion);
       } else{ echo 0; }
  }

  public function guardar_solicitud($id,$seccion){
    $data = array(
      'id_inscripcion_materia' => $id,
      'id_seccion' => $seccion,
      'fecha_solicitud' => date('Y-m-d H:i:s'),
      'estado' => 0
    );
    if($this->db->insert("solicitud_cambio",$data)){
      $accion = "Se realizo una solicitud de cambio de seccion";
      $this->vitacora_model->vitacora($accion);
       } else{ echo 0; }
  }

  public function inscribir_materia($id,$id_ins){
    $query = $this->db->query("SELECT COUNT(*) AS num FROM inscripciones_materias WHERE id_inscripcion_ciclo = ".$id_ins);
    foreach ($query->result_array() as $row) {
      $num = $row['num'];
    }

    if($num>=5){
      echo 1;
    }else{
      $data = array(
        'id_seccion_materia' => $id,
        'id_inscripcion_ciclo' => $id_ins,
        'estado' => 0
      );
      if($this->db->insert("inscripciones_materias",$data)){
        $accion = "Se inscribio una materia";
        $this->vitacora_model->vitacora($accion);
         } else{ echo 0; }
    }
  }

  public function eliminar_materia($id){
    $this->db->where('id_inscripcion_materia',$id);
    if($this->db->delete("inscripciones_materias")){
      $accion = "Se elimino una materia";
      $this->vitacora_model->vitacora($accion);
       } else{ echo 0; }

  }

}
?>
