<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Datos_pensum_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  public function detalles_pensum($id){
    $query=$this->db->query("SELECT * FROM pensum INNER JOIN carreras ON carreras.idcarrera=pensum.id_carrera WHERE id_pensum = '".$id."'");
    foreach ($query->result_array() as $row)
    {
      $data = array(
        'nombre' => $row['version_pensum'],
        'carrera' => $row['carrera'],
      );
    }

    return $data;
  }


  public function eliminar_pensum($id)
  {
    $data = array(
      'estado' => 1
    );
    $this->db->where('id_detalle_pensum',$id);
    if($this->db->update('detalle_pensum',$data))
    {
      $accion = "Dio de baja la materia ".$id." del pensum";
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function activar_pensum($id)
  {
    $data = array(
      'estado' => 0
    );
    $this->db->where('id_detalle_pensum',$id);
    if($this->db->update('detalle_pensum',$data))
    {
      $accion = "Activo la materia ".$id." del pensum";
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function editar($id_det,$id,$correlativo,$materia,$num_ciclo,$prerequisito,$unidades_valorativas)
  {
    $data = array(
      'id_pensum' => $id,
      'id_materia' => $materia,
      'correlativo' => $correlativo,
      'num_ciclo' => $num_ciclo,
      'id_mat_requisito' => $prerequisito,
      'unidades_valorativas' => $unidades_valorativas
    );
    $this->db->where('id_detalle_pensum',$id_det);
    if($this->db->update('detalle_pensum',$data))
    {
      $accion = "Edito el pensum con id ".$id;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function guardar_pensum($id,$correlativo,$materia,$num_ciclo,$prerequisito,$unidades_valorativas){
    $query=$this->db->query("SELECT COUNT(*) as num FROM detalle_pensum WHERE id_pensum = ".$id." AND id_materia = ".$materia);
    foreach ($query->result_array() as $row)
    {
      $numuser = $row['num'];
    }

    $query2=$this->db->query("SELECT * FROM materias WHERE idmateria = ".$materia);
    foreach ($query2->result_array() as $row2)
    {
      $materia_nom = $row2['materia'];
    }

    if($numuser==0)
    {
      $data = array(
        'id_pensum' => $id,
        'id_materia' => $materia,
        'correlativo' => $correlativo,
        'num_ciclo' => $num_ciclo,
        'id_mat_requisito' => $prerequisito,
        'unidades_valorativas' => $unidades_valorativas,
        'estado' => 0
      );
      if($this->db->insert("detalle_pensum",$data)){
        $accion = "Registró la materia ".$materia_nom." en el pensum ".$id;
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
