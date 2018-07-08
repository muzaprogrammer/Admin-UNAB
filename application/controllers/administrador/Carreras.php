<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carreras extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper("administrador/cargar_carreras");
    $this->load->helper("administrador/modals/agregar_carrera");
    $this->load->helper("administrador/modals/editar_carrera");
    $this->load->model("administrador/carreras_model");
  }

  public function index()
  {
    if ($this->session->userdata('administrador')) {
      $this->load->view('administrador/carreras');
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function cargar_carreras()
  {
    return cargar_carreras();
  }

  public function agregar_carrera()
  {
    return agregar_carrera();
  }

  public function editar_carrera()
  {
    extract($_POST);
    return editar_carrera($id);
  }

  public function eliminar_carrera(){
		extract($_POST);
		return $this->carreras_model->eliminar_carrera($id);
	}

  public function activar_carrera(){
		extract($_POST);
		return $this->carreras_model->activar_carrera($id);
	}

  public function guardar_carrera(){
		extract($_POST);
		return $this->carreras_model->guardar_carrera($facultad,$carrera);
	}

  public function editar(){
		extract($_POST);
		return $this->carreras_model->editar($id,$facultad,$carrera);
	}
}
