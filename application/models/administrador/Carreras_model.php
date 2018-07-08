<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Carreras_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  public function eliminar_carrera($id)
  {
    $data = array(
      'estado' => 1
    );
    $this->db->where('idcarrera',$id);
    if($this->db->update('carreras',$data))
    {
      $query = $this->db->query("SELECT carrera FROM carreras WHERE idcarrera = ".$id);
      foreach($query->result_array() as $row){
        $carrera = $row['carrera'];
      }
      $accion = "Dio de baja la carrera ".$carrera;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function activar_carrera($id)
  {
    $data = array(
      'estado' => 0
    );
    $this->db->where('idcarrera',$id);
    if($this->db->update('carreras',$data))
    {
      $query = $this->db->query("SELECT carrera FROM carreras WHERE idcarrera = ".$id);
      foreach($query->result_array() as $row){
        $carrera = $row['carrera'];
      }
      $accion = "Activo la carrera ".$carrera;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function editar($id,$facultad,$carrera)
  {
    $data = array(
      'idfacultad' => $facultad,
      'carrera' => $carrera
    );
    $this->db->where('idcarrera',$id);
    if($this->db->update('carreras',$data))
    {
      $accion = "Edito la carrera ".$carrera;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function guardar_carrera($facultad,$carrera){
    $data = array(
      'idfacultad' => $facultad,
      'carrera' => $carrera,
      'estado' => 0
    );
    if($this->db->insert("carreras",$data)){
      $accion = "Registró en el sistema la carrera ".$carrera;
      $this->vitacora_model->vitacora_2($accion);
       } else{ echo 0; }
  }
}
?>
