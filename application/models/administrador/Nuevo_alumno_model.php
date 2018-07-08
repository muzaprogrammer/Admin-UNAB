<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Nuevo_alumno_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  public function guardar_alumno(
    $carnet,$nom_completo,$nombre,$apellido,$sexo,$fecha_nac,$tsangre,$dui,$nit,$departamento,
    $municipio,$direccion,$tel_casa,$tel_celular,$email,$compania,$smartphone,$tiposmartphone,
    $contacto_emergencia,$tel_contac_emergencia,$empresa,$cargo,$tel_trabajo,$dir_empresa,
    $user,$pass,$pensum
  ){
    $data = array(
      'carnet' => $carnet,
      'nom_completo' => $nom_completo,
      'nombre' => $nombre,
      'apellido' => $apellido,
      'sexo' => $sexo,
      'fecha_nac' => date("Y-m-d",strtotime($fecha_nac)),
      'tsangre' => $tsangre,
      'dui' => $dui,
      'nit' => $nit,
      'departamento' => $departamento,
      'municipio' => $municipio,
      'direccion' => $direccion,
      'tel_casa' => $tel_casa,
      'tel_celular' => $tel_celular,
      'email' => $email,
      'compania' => $compania,
      'smartphone' => $smartphone,
      'tiposmartphone' => $tiposmartphone,
      'contacto_emergencia' => $contacto_emergencia,
      'tel_contac_emergencia' => $tel_contac_emergencia,
      'empresa' => $empresa,
      'cargo' => $cargo,
      'tel_trabajo' => $tel_trabajo,
      'dir_empresa' => $dir_empresa,
      'dir_empresa' => 0,
      'foto' => "blue-user-icon.png",
      'fecha_creacion' => date('Y-m-d'),
      'user' => $user,
      'pass' => $pass,
      'id_pensum' => $pensum,
      'estado' => 0
    );
    if($this->db->insert("alumnos",$data)){
      echo $this->db->insert_id();
      $accion = "Registró en el sistema el Alumno ".$nombre." ".$apellido;
      $this->vitacora_model->vitacora_2($accion);
       } else{ echo 0; }
  }

  public function load_sexo(){
    $options = '<option value="">Seleccione un sexo...</option>';
    $query = $this->db->query("SELECT * FROM sexo WHERE estado=0");
    foreach($query->result_array() as $row){
      $options .= '<option value="'.$row['idsexo'].'">'.$row['sexo'].'</option>';
    }
    echo $options;
	}

  public function actualizar_foto($id,$foto){
    $data = array(
      'foto' => $foto
    );
    $this->db->where('idalumno',$id);
    if($this->db->update('alumnos',$data))
    {
      $query = $this->db->query("SELECT nombre_completo FROM alumnos WHERE idalumno = ".$id);
      foreach($query->result_array() as $row){
        $nom_completo = $row['nom_completo'];
      }
      $accion = "Actualizó la foto de expediente del alumno ".$nom_completo;
      $this->vitacora_model->vitacora_2($accion);
    }
  }

  public function load_compania(){
    $options = '<option value="">Seleccione una Compañia...</option>';
    $query = $this->db->query("SELECT * FROM companias WHERE estado=0");
    foreach($query->result_array() as $row){
      $options .= '<option value="'.$row['idcompania'].'">'.$row['compania'].'</option>';
    }
    echo $options;
	}

  public function load_tipo_smartphone(){
    $options = '<option value="">Seleccione un tipo de SmartPhone...</option>';
    $query = $this->db->query("SELECT * FROM smartphones WHERE estado=0");
    foreach($query->result_array() as $row){
      $options .= '<option value="'.$row['idsmartphone'].'">'.$row['smartphone'].'</option>';
    }
    echo $options;
	}

  public function load_estado_civil(){
    $options = '<option value="">Seleccione un estado...</option>';
    $query = $this->db->query("SELECT * FROM estado_civil WHERE estado=0");
    foreach($query->result_array() as $row){
      $options .= '<option value="'.$row['idestado_civil'].'">'.$row['estado_civil'].'</option>';
    }
    echo $options;
  }

  public function load_departamentos(){
    $options = '<option value="">Seleccione un departamento...</option>';
    $query = $this->db->query("SELECT * FROM departamentos WHERE estado=0");
    foreach($query->result_array() as $row){
      $options .= '<option value="'.$row['iddepartamento'].'">'.$row['departamento'].'</option>';
    }
    echo $options;
  }

  public function load_municipios($iddepartamento){
    $options = '<option value="">Seleccione un municipio...</option>';
    $query = $this->db->query("SELECT * FROM municipios WHERE estado=0 AND iddepartamento=".$iddepartamento);
    foreach($query->result_array() as $row){
      $options .= '<option value="'.$row['idmunicipio'].'">'.$row['municipio'].'</option>';
    }
    echo $options;
  }

  public function load_pensum(){
    $options = '<option value="">Seleccione una Carrera...</option>';
    $query = $this->db->query("SELECT * FROM carreras INNER JOIN facultades ON carreras.idfacultad = facultades.idfacultad INNER JOIN pensum ON pensum.id_carrera = carreras.idcarrera WHERE pensum.estado = 0");
    foreach($query->result_array() as $row){
      $options .= '<option value="'.$row['id_pensum'].'">'.$row['carrera'].'</option>';
    }
    echo $options;
  }
}
?>
