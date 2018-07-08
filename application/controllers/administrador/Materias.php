<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materias extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper("administrador/cargar_materias");
    $this->load->helper("administrador/modals/agregar_materia");
    $this->load->helper("administrador/modals/editar_materia");
    $this->load->model("administrador/materias_model");
  }

  public function index()
  {
    if ($this->session->userdata('administrador')) {
      $this->load->view('administrador/materias');
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function cargar_materias()
  {
    return cargar_materias();
  }

  public function agregar_materia()
  {
    return agregar_materia();
  }

  public function editar_materia()
  {
    extract($_POST);
    return editar_materia($id);
  }

  public function eliminar_materia(){
		extract($_POST);
		return $this->materias_model->eliminar_materia($id);
	}

  public function activar_materia(){
		extract($_POST);
		return $this->materias_model->activar_materia($id);
	}

  public function guardar_materia(){
		extract($_POST);
		return $this->materias_model->guardar_materia($codigo,$materia);
	}

  public function editar(){
		extract($_POST);
		return $this->materias_model->editar($id,$codigo,$materia);
	}
}
