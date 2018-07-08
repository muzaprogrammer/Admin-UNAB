<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Materias_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  public function eliminar_materia($id)
  {
    $data = array(
      'estado' => 1
    );
    $this->db->where('idmateria',$id);
    if($this->db->update('materias',$data))
    {
      $query = $this->db->query("SELECT materia FROM materias WHERE idmateria = ".$id);
      foreach($query->result_array() as $row){
        $materia = $row['materia'];
      }
      $accion = "Dio de baja la materia ".$materia;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function activar_materia($id)
  {
    $data = array(
      'estado' => 0
    );
    $this->db->where('idmateria',$id);
    if($this->db->update('materias',$data))
    {
      $query = $this->db->query("SELECT materia FROM materias WHERE idmateria = ".$id);
      foreach($query->result_array() as $row){
        $materia = $row['materia'];
      }
      $accion = "Activo la materia ".$materia;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function editar($id,$codigo,$materia)
  {
    $data = array(
      'codigo' => $codigo,
      'materia' => $materia
    );
    $this->db->where('idmateria',$id);
    if($this->db->update('materias',$data))
    {
      $query = $this->db->query("SELECT materia FROM materias WHERE idmateria = ".$id);
      foreach($query->result_array() as $row){
        $materia = $row['materia'];
      }
      $accion = "Edito la materia ".$materia;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function guardar_materia($codigo,$materia){
    $query=$this->db->query("SELECT COUNT(*) as num FROM materias WHERE materia = '".$materia."'");
    foreach ($query->result_array() as $row)
    {
      $numuser = $row['num'];
    }
    if($numuser==0)
    {
      $data = array(
        'codigo' => $codigo,
        'materia' => $materia,
        'estado' => 0
      );
      if($this->db->insert("materias",$data)){
        $accion = "Registró en el sistema la materia ".$materia;
        $this->vitacora_model->vitacora_2($accion);
         } else{ echo 0; }
    }
    else
    {
      echo 2;
    }
  }

}
?>
