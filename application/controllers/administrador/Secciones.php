<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper("administrador/cargar_secciones");
    $this->load->helper("administrador/modals/agregar_seccion");
    $this->load->helper("administrador/modals/editar_seccion");
    $this->load->model("administrador/secciones_model");
  }

  public function index()
  {
    if ($this->session->userdata('administrador')) {
      $this->load->view('administrador/secciones');
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function cargar_secciones()
  {
    return cargar_secciones();
  }

  public function agregar_seccion()
  {
    return agregar_seccion();
  }

  public function editar_seccion(){
    extract($_POST);
    return editar_seccion($id);
  }

  public function eliminar_seccion(){
		extract($_POST);
		return $this->secciones_model->eliminar_seccion($id);
	}

  public function activar_seccion(){
		extract($_POST);
		return $this->secciones_model->activar_seccion($id);
	}

  public function guardar_seccion(){
    $lunes=0;$martes=0;$miercoles=0;$jueves=0;$viernes=0;$sabado=0;$domingo=0;
		extract($_POST);
		return $this->secciones_model->guardar_seccion($materia,$ciclo,$aula,$cant_a,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo,$desde,$hasta);
	}

  public function actualizar_seccion(){
    $lunes=0;$martes=0;$miercoles=0;$jueves=0;$viernes=0;$sabado=0;$domingo=0;
		extract($_POST);
		return $this->secciones_model->actualizar_seccion($aula,$cant_a,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo,$desde,$hasta,$id);
	}

}
