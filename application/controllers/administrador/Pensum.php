<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pensum extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper("administrador/cargar_pensum");
    $this->load->helper("administrador/modals/agregar_pensum");
    $this->load->helper("administrador/modals/editar_pensum");
    $this->load->model("administrador/pensum_model");
  }

  public function index()
  {
    if ($this->session->userdata('administrador')) {
      $this->load->view('administrador/pensum');
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function cargar_pensum()
  {
    return cargar_pensum();
  }

  public function agregar_pensum()
  {
    return agregar_pensum();
  }

  public function editar_pensum()
  {
    extract($_POST);
    return editar_pensum($id);
  }

  public function eliminar_pensum(){
		extract($_POST);
		return $this->pensum_model->eliminar_pensum($id);
	}

  public function activar_pensum(){
		extract($_POST);
		return $this->pensum_model->activar_pensum($id);
	}

  public function guardar_pensum(){
		extract($_POST);
		return $this->pensum_model->guardar_pensum($carrera,$nombre);
	}

  public function editar(){
		extract($_POST);
		return $this->pensum_model->editar($id,$nombre,$carrera);
	}
}
