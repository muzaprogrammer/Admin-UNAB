<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facultades extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper("administrador/cargar_facultades");
    $this->load->helper("administrador/modals/agregar_facultad");
    $this->load->helper("administrador/modals/editar_facultad");
    $this->load->model("administrador/facultades_model");
  }

  public function index()
  {
    if ($this->session->userdata('administrador')) {
      $this->load->view('administrador/facultades');
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function cargar_facultades()
  {
    return cargar_facultades();
  }

  public function agregar_facultad()
  {
    return agregar_facultad();
  }

  public function editar_facultad()
  {
    extract($_POST);
    return editar_facultad($id);
  }

  public function eliminar_facultad(){
		extract($_POST);
		return $this->facultades_model->eliminar_facultad($id);
	}

  public function activar_facultad(){
		extract($_POST);
		return $this->facultades_model->activar_facultad($id);
	}

  public function guardar_facultad(){
		extract($_POST);
		return $this->facultades_model->guardar_facultad($facultad);
	}

  public function editar(){
		extract($_POST);
		return $this->facultades_model->editar($id,$facultad);
	}
}
