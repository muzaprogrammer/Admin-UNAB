<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Facultades_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }
  
  public function eliminar_facultad($id)
  {
    $data = array(
      'estado' => 1
    );
    $this->db->where('idfacultad',$id);
    if($this->db->update('facultades',$data))
    {
      $query = $this->db->query("SELECT facultad FROM facultades WHERE idfacultad = ".$id);
      foreach($query->result_array() as $row){
        $facultad = $row['facultad'];
      }
      $accion = "Dio de baja la facultad ".$facultad;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function activar_facultad($id)
  {
    $data = array(
      'estado' => 0
    );
    $this->db->where('idfacultad',$id);
    if($this->db->update('facultades',$data))
    {
      $query = $this->db->query("SELECT facultad FROM facultades WHERE idfacultad = ".$id);
      foreach($query->result_array() as $row){
        $facultad = $row['facultad'];
      }
      $accion = "Activo la facultad ".$facultad;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function editar($id,$facultad)
  {
    $data = array(
      'facultad' => $facultad
    );
    $this->db->where('idfacultad',$id);
    if($this->db->update('facultades',$data))
    {
      $query = $this->db->query("SELECT facultad FROM facultades WHERE idfacultad = ".$id);
      foreach($query->result_array() as $row){
        $facultad = $row['facultad'];
      }
      $accion = "Edito la facultad ".$facultad;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function guardar_facultad($facultad
  ){
    $data = array(
      'facultad' => $facultad,
      'estado' => 0
    );
    if($this->db->insert("facultades",$data)){
      $accion = "Registró en el sistema la facultad ".$facultad;
      $this->vitacora_model->vitacora_2($accion);
       } else{ echo 0; }
  }
}
?>
