<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos_pensum extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper("administrador/cargar_detalles_pensum");
    $this->load->helper("administrador/modals/agregar_detalles_pensum");
    $this->load->helper("administrador/modals/editar_detalles_pensum");
    $this->load->model("administrador/datos_pensum_model");
  }

  public function index()
  {
    if ($this->session->userdata('administrador')) {
      extract($_GET);
			$data['datos'] = $this->datos_pensum_model->detalles_pensum($id);
      $this->load->view('administrador/datos_pensum',$data);
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function cargar_pensum()
  {
    extract($_POST);
    return cargar_pensum($id);
  }

  public function agregar_pensum()
  {
    extract($_POST);
    return agregar_pensum($id);
  }

  public function editar_pensum()
  {
    extract($_POST);
    return editar_pensum($id);
  }

  public function eliminar_pensum(){
		extract($_POST);
		return $this->datos_pensum_model->eliminar_pensum($id);
	}

  public function activar_pensum(){
		extract($_POST);
		return $this->datos_pensum_model->activar_pensum($id);
	}

  public function guardar_pensum(){
		extract($_POST);
		return $this->datos_pensum_model->guardar_pensum($id,$correlativo,$materia,$num_ciclo,$prerequisito,$unidades_valorativas);
	}

  public function editar(){
		extract($_POST);
		return $this->datos_pensum_model->editar($id_det,$id,$correlativo,$materia,$num_ciclo,$prerequisito,$unidades_valorativas);
	}
}
