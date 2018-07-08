<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Cobrar_matricula_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  public function cobrar($id)
  {
    $data = array(
      'fecha_pago' => date('Y-m-d H:i:s'),
      'estado' => 1
    );
    $this->db->where('id_inscripcion_ciclo',$id);
    if($this->db->update('inscripciones_ciclo',$data))
    {
      $accion = "Se realizo un cobro";
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function cobrar_solicitud($id)
  {
    $query = $this->db->query("SELECT * FROM solicitud_cambio WHERE id_solicitud = ".$id);
    foreach($query->result_array() as $row){
      $id_inscripcion_materia = $row['id_inscripcion_materia'];
      $id_seccion = $row['id_seccion'];
    }

    $data1 = array(
      'fecha_pago' => date('Y-m-d H:i:s'),
      'estado' => 1
    );
    $this->db->where('id_solicitud',$id);
    $this->db->update('solicitud_cambio',$data1);

    $data = array(
      'id_seccion_materia' => $id_seccion
    );
    $this->db->where('id_inscripcion_materia',$id_inscripcion_materia);
    if($this->db->update('inscripciones_materias',$data))
    {
      $accion = "Se realizo un cobro";
      $this->vitacora_model->vitacora($accion);
    }
  }
}
?>
