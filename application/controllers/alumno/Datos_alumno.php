<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos_alumno extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model("administrador/datos_alumno_model");
  }

  public function index()
  {
    if ($this->session->userdata('administrador') || $this->session->userdata('alumno')) {
      extract($_GET);
			$data['datos'] = $this->datos_alumno_model->detalles_alumno($id);
      $this->load->view('alumno/datos_alumno',$data);
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function actualizar_alumno(){
		extract($_POST);
		return $this->datos_alumno_model->actualizar_alumno(
      $carnet,$nom_completo,$nombre,$apellido,$sexo,$fecha_nac,$tsangre,$dui,$nit,$departamento,
      $municipio,$direccion,$tel_casa,$tel_celular,$email,$compania,$smartphone,$tiposmartphone,
      $contacto_emergencia,$tel_contac_emergencia,$empresa,$cargo,$tel_trabajo,$dir_empresa,$estado,$ida,
      $user,$pass,$pensum
		);
	}

  public function eliminar_alumno(){
		extract($_POST);
		return $this->datos_alumno_model->eliminar_alumno($id);
	}

}
