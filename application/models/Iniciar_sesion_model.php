<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iniciar_sesion_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  var $datos;

  public function validar_usuario($usuario,$password){
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->join('roles', 'usuarios.idrol = roles.idrol');
    $this->db->where('usuarios.usuario',$usuario);
    $this->db->where('usuarios.password',$password);
    $this->db->where('usuarios.estado',1);
    $query = $this->db->get()->result();
    if ( is_array($query) && count($query) == 1 ) {
        // Set the users details into the $details property of this class
        $this->datos = $query[0];
        // Call set_session to set the user's session vars via CodeIgniter
        if($this->datos->rol == "Administrador"){
          $this->set_session_administrador();
        }
				else if($this->datos->rol == "Recepcion"){
          $this->set_session_recepcion();
        }
        else if($this->datos->rol == "Docente"){
          $this->set_session_docente();
        }
        return $this->datos->rol;
    }
    else{
      $this->db->select('*');
      $this->db->from('alumnos');
      $this->db->join('roles', 'alumnos.idrol = roles.idrol');
      $this->db->where('alumnos.user',$usuario);
      $this->db->where('alumnos.pass',$password);
      $this->db->where('alumnos.estado',0);
      $query = $this->db->get()->result();
      if ( is_array($query) && count($query) == 1 ) {
          // Set the users details into the $details property of this class
          $this->datos = $query[0];
          // Call set_session to set the user's session vars via CodeIgniter
          if($this->datos->rol == "Alumno"){
            $this->set_session_alumno();
          }
          return $this->datos->rol;
      }else{
        return false;
      }
    }
  }

  private function set_session_administrador() {
    $query_institucion = $this->db->query("SELECT nombre_empresa,logo_empresa FROM datos_empresa");
    foreach ($query_institucion->result_array() as $row_institucion) {
      $nombre_empresa = $row_institucion['nombre_empresa'];
      $logo_empresa = $row_institucion['logo_empresa'];
    }
    $this->session->set_userdata('administrador',array(
            'id'=> $this->datos->idusuario,
            'usuario'=> $this->datos->usuario,
            'password' => $this->datos->password,
            'nombres'=> $this->datos->nombre,
            'menu'=> $this->datos->menu,
            'rol' => $this->datos->rol,
            'autorizar' => $this->datos->autorizar,
            'foto' => "usuarios/".$this->datos->foto,
            'institucion' => $nombre_empresa,
            'logo_institucion' => $logo_empresa
          )
    );
    $accion = "Inició sesión.";
    $this->vitacora_model->vitacora_2($accion);
  }

  private function set_session_recepcion() {
    $query_institucion = $this->db->query("SELECT nombre_empresa,logo_empresa FROM datos_empresa");
    foreach ($query_institucion->result_array() as $row_institucion) {
      $nombre_empresa = $row_institucion['nombre_empresa'];
      $logo_empresa = $row_institucion['logo_empresa'];
    }
    $this->session->set_userdata('recepcion',array(
            'id'=> $this->datos->idusuario,
            'usuario'=> $this->datos->usuario,
            'password' => $this->datos->password,
            'nombres'=> $this->datos->nombre,
            'menu'=> $this->datos->menu,
            'rol' => $this->datos->rol,
            'autorizar' => $this->datos->autorizar,
            'foto' => "usuarios/".$this->datos->foto,
            'institucion' => $nombre_empresa,
            'logo_institucion' => $logo_empresa
          )
    );
    $accion = "Inició sesión.";
    $this->vitacora_model->vitacora_2($accion);
  }

  private function set_session_docente() {
    $query_institucion = $this->db->query("SELECT nombre_empresa,logo_empresa FROM datos_empresa");
    foreach ($query_institucion->result_array() as $row_institucion) {
      $nombre_empresa = $row_institucion['nombre_empresa'];
      $logo_empresa = $row_institucion['logo_empresa'];
    }
    $this->session->set_userdata('docente',array(
            'id'=> $this->datos->idusuario,
            'usuario'=> $this->datos->usuario,
            'password' => $this->datos->password,
            'nombres'=> $this->datos->nombre,
            'menu'=> $this->datos->menu,
            'rol' => $this->datos->rol,
            'autorizar' => $this->datos->autorizar,
            'foto' => "usuarios/".$this->datos->foto,
            'institucion' => $nombre_empresa,
            'logo_institucion' => $logo_empresa
          )
    );
    $accion = "Inició sesión.";
    $this->vitacora_model->vitacora_2($accion);
  }

  private function set_session_alumno() {
    $query_institucion = $this->db->query("SELECT nombre_empresa,logo_empresa FROM datos_empresa");
    foreach ($query_institucion->result_array() as $row_institucion) {
      $nombre_empresa = $row_institucion['nombre_empresa'];
      $logo_empresa = $row_institucion['logo_empresa'];
    }
    $this->session->set_userdata('alumno',array(
            'id'=> $this->datos->idalumno,
            'usuario'=> $this->datos->user,
            'password' => $this->datos->pass,
            'nombres'=> $this->datos->nom_completo,
            'menu'=> $this->datos->menu,
            'rol' => $this->datos->rol,
            'autorizar' => $this->datos->autorizar,
            'foto' => "expedientes/".$this->datos->foto,
            'institucion' => $nombre_empresa,
            'logo_institucion' => $logo_empresa,
            'pensum' => $this->datos->id_pensum,
          )
    );
    $accion = "Inició sesión.";
    $this->vitacora_model->vitacora_2($accion);
  }
}
?>
