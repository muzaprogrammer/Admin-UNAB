<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  public function activar_seccion($id)
  {
    $data = array(
      'estado' => 0
    );
    $this->db->where('id_seccion',$id);
    if($this->db->update('secciones',$data))
    {
      $accion = "Activo la seccion con id ".$this->db->insert_id();
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function guardar_seccion($materia,$ciclo,$aula,$cant_a,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo,$desde,$hasta){
    $query = $this->db->query("SELECT COUNT(*) AS num FROM secciones WHERE id_materia = ".$materia." AND id_ciclo = ".$ciclo."");
    foreach($query->result_array() as $row){
      $num = $row['num'];
    }
    $data = array(
      'seccion' => $num+1,
      'id_materia' => $materia,
      'id_ciclo' => $ciclo,
      'aula' => $aula,
      'cantidad_alumnos' => $cant_a,
      'lunes' => $lunes,
      'martes' => $martes,
      'miercoles' => $miercoles,
      'jueves' => $jueves,
      'viernes' => $viernes,
      'sabado' => $sabado,
      'domingo' => $domingo,
      'hora_desde' => date('H:i:s',strtotime($desde)),
      'hora_hasta' => date('H:i:s',strtotime($hasta)),
      'estado' => 0
    );
    if($this->db->insert("secciones",$data)){
      $accion = "Registró en el sistema la seccion con id ".$this->db->insert_id();
      $this->vitacora_model->vitacora($accion);
       } else{ echo 0; }
  }

  public function actualizar_seccion($aula,$cant_a,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo,$desde,$hasta,$id){
    $data = array(
      'aula' => $aula,
      'cantidad_alumnos' => $cant_a,
      'lunes' => $lunes,
      'martes' => $martes,
      'miercoles' => $miercoles,
      'jueves' => $jueves,
      'viernes' => $viernes,
      'sabado' => $sabado,
      'domingo' => $domingo,
      'hora_desde' => date('H:i:s',strtotime($desde)),
      'hora_hasta' => date('H:i:s',strtotime($hasta))
    );
    $this->db->where('id_seccion',$id);
    if($this->db->update("secciones",$data)){
      $accion = "Actualizo la seccion con id ".$id;
      $this->vitacora_model->vitacora($accion);
       } else{ echo 0; }
  }

  public function eliminar_seccion($id)
  {
    $data = array(
      'estado' => 1
    );
    $this->db->where('id_seccion',$id);
    if($this->db->update('secciones',$data))
    {
      $accion = "Elimino la seccion con id ".$this->db->insert_id();
      $this->vitacora_model->vitacora($accion);
    }
  }

}
?>
