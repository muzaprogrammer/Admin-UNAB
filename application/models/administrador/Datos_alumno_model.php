<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Datos_alumno_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->helper('calcular_edad');
      $this->load->model('vitacora_model');
  }

  public function detalles_alumno($id){

    $query = $this->db->query("SELECT * FROM alumnos WHERE idalumno=".$id);
    foreach($query->result_array() as $row){

      $tiposmartphone = '<option value="">Seleccione un tipo de SmartPhone...</option>';
      $query1 = $this->db->query("SELECT * FROM smartphones WHERE estado=0");
      foreach($query1->result_array() as $row1){
        if($row['smartphone'] == $row1['idsmartphone']){
          $tiposmartphone .= '<option value="'.$row1['idsmartphone'].'" selected>'.$row1['smartphone'].'</option>';
        }else{
          $tiposmartphone .= '<option value="'.$row1['idsmartphone'].'">'.$row1['smartphone'].'</option>';
        }
      }

      $sexo = '<option value="">Seleccione un sexo...</option>';
      $query2 = $this->db->query("SELECT * FROM sexo WHERE estado=0");
      foreach($query2->result_array() as $row2){
        if($row['sexo'] == $row2['idsexo']){
          $sexo .= '<option value="'.$row2['idsexo'].'" selected>'.$row2['sexo'].'</option>';
        }else{
          $sexo .= '<option value="'.$row2['idsexo'].'">'.$row2['sexo'].'</option>';
        }
      }

      $compania = '<option value="">Seleccione una Compañia...</option>';
      $query3 = $this->db->query("SELECT * FROM companias WHERE estado=0");
      foreach($query3->result_array() as $row3){
        if($row['compania'] == $row3['idcompania']){
          $compania .= '<option value="'.$row3['idcompania'].'" selected>'.$row3['compania'].'</option>';
        }else{
          $compania .= '<option value="'.$row3['idcompania'].'">'.$row3['compania'].'</option>';
        }
      }

      $dep=$row['departamento'];

      $departamento = '<option value="">Seleccione un departamento...</option>';
      $query4 = $this->db->query("SELECT * FROM departamentos WHERE estado = 0");
      foreach($query4->result_array() as $row4){
        if($dep == $row4['iddepartamento']){
          $departamento .= '<option value="'.$row4['iddepartamento'].'" selected>'.$row4['departamento'].'</option>';
        }else{
          $departamento .= '<option value="'.$row4['iddepartamento'].'">'.$row4['departamento'].'</option>';
        }
      }

      if($dep < 1){
        $municipio = '<option value="">Seleccione un municipio...</option>';
      }else{
        $municipio = '<option value="">Seleccione un municipio...</option>';
        $query5 = $this->db->query("SELECT * FROM municipios WHERE iddepartamento = '.$dep.' AND estado = 0");
        foreach($query5->result_array() as $row5){
          if($row['municipio'] == $row5['idmunicipio']){
            $municipio .= '<option value="'.$row5['idmunicipio'].'" selected>'.$row5['municipio'].'</option>';
          }else{
            $municipio .= '<option value="'.$row5['idmunicipio'].'">'.$row5['municipio'].'</option>';
          }
        }
      }

      $pensum = '<option value="">Seleccione una Carrera...</option>';
      $query6 = $this->db->query("SELECT * FROM carreras INNER JOIN facultades ON carreras.idfacultad = facultades.idfacultad INNER JOIN pensum ON pensum.id_carrera = carreras.idcarrera WHERE pensum.estado = 0");
      foreach($query6->result_array() as $row6){
        if($row['id_pensum'] == $row6['id_pensum']){
          $pensum .= '<option value="'.$row6['id_pensum'].'" selected>'.$row6['carrera'].'</option>';
        }else{
          $pensum .= '<option value="'.$row6['id_pensum'].'">'.$row6['carrera'].'</option>';
        }
      }


      if($row['smartphone']==1){
        $poseesi="selected";
        $poseeno="";
      }else if($row['smartphone']==0){
        $poseesi="";
        $poseeno="selected";
      }else{
        $poseesi="";
        $poseeno="";
      }

      if($row['estado']==0){
        $estado_activo="selected";
        $estado_inactivo="";
      }else if($row['estado']==1){
        $estado_activo="";
        $estado_inactivo="selected";
      }else{
        $estado_activo="";
        $estado_inactivo="";
      }


      $data = array(
        'carnet' => $row['carnet'],
        'nom_completo' => $row['nom_completo'],
        'nombre' => $row['nombre'],
        'apellido' => $row['apellido'],
        'sexo' => $sexo,
        'fecha_nac' => date("d-m-Y",strtotime($row['fecha_nac'])),
        'tsangre' => $row['tsangre'],
        'dui' => $row['dui'],
        'nit' => $row['nit'],
        'departamento' => $departamento,
        'municipio' => $municipio,
        'direccion' => $row['direccion'],
        'tel_casa' => $row['tel_casa'],
        'tel_celular' => $row['tel_celular'],
        'email' => $row['email'],
        'compania' => $compania,
        'smartphone' => $row['smartphone'],
        'poseesi' => $poseesi,
        'poseeno' => $poseeno,
        'tiposmartphone' => $tiposmartphone,
        'contacto_emergencia' => $row['contacto_emergencia'],
        'tel_contac_emergencia' => $row['tel_contac_emergencia'],
        'empresa' => $row['empresa'],
        'cargo' => $row['cargo'],
        'tel_trabajo' => $row['tel_trabajo'],
        'dir_empresa' => $row['dir_empresa'],
        'foto' => $row['foto'],
        'estado_activo' => $estado_activo,
        'estado_inactivo' => $estado_inactivo,
        'user' => $row['user'],
        'pass' => $row['pass'],
        'pensum' => $pensum
      );
    }
    return $data;
  }


  public function actualizar_alumno(
    $carnet,$nom_completo,$nombre,$apellido,$sexo,$fecha_nac,$tsangre,$dui,$nit,$departamento,
    $municipio,$direccion,$tel_casa,$tel_celular,$email,$compania,$smartphone,$tiposmartphone,
    $contacto_emergencia,$tel_contac_emergencia,$empresa,$cargo,$tel_trabajo,$dir_empresa,$estado,$ida,
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
      'estado' => $estado,
      'user' => $user,
      'pass' => $pass,
      'id_pensum' => $pensum
    );
    $this->db->where('idalumno',$ida);
    if($this->db->update('alumnos',$data)){
      $accion = "Actualizó la información general del alumno ".$nom_completo;
      $this->vitacora_model->vitacora($accion);
    }
    else { echo 1; }
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

  public function eliminar_alumno($ida)
  {
    $data = array(
      'estado' => 1
    );
    $this->db->where('idalumno',$ida);
    if($this->db->update('alumnos',$data))
    {
      $query = $this->db->query("SELECT nom_completo FROM alumnos WHERE idalumno = ".$ida);
      foreach($query->result_array() as $row){
        $nom_completo = $row['nom_completo'];
      }
      $accion = "Dio de baja al alumno ".$nom_completo;
      $this->vitacora_model->vitacora($accion);
    }
  }
}
?>
