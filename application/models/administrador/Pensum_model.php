<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Pensum_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  public function eliminar_pensum($id)
  {
    $data = array(
      'estado' => 1
    );
    $this->db->where('id_pensum',$id);
    if($this->db->update('pensum',$data))
    {
      $accion = "Dio de baja el pensum con id ".$id;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function activar_pensum($id)
  {
    $data = array(
      'estado' => 0
    );
    $this->db->where('id_pensum',$id);
    if($this->db->update('pensum',$data))
    {
      $accion = "Activo el pensum con id ".$id;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function editar($id,$nombre,$carrera)
  {
    $data = array(
      'version_pensum' => $nombre,
      'id_carrera' => $carrera,
      'estado' => 0
    );
    $this->db->where('id_pensum',$id);
    if($this->db->update('pensum',$data))
    {
      $accion = "Edito el pensum ".$nombre;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function guardar_pensum($carrera,$nombre){
    $query=$this->db->query("SELECT COUNT(*) as num FROM pensum WHERE version_pensum = '".$nombre."' AND id_carrera = '".$carrera."'");
    foreach ($query->result_array() as $row)
    {
      $numuser = $row['num'];
    }

    $query2=$this->db->query("SELECT * FROM carreras WHERE idcarrera = '".$carrera."'");
    foreach ($query2->result_array() as $row2)
    {
      $nombre_carrera = $row2['carrera'];
    }

    if($numuser==0)
    {
      $data = array(
        'version_pensum' => $nombre,
        'id_carrera' => $carrera,
        'estado' => 0
      );
      if($this->db->insert("pensum",$data)){
        $accion = "Registró en el sistema el pensum ".$nombre." de la carrera ".$nombre_carrera;
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
