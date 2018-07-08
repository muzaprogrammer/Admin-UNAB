<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar_alumno extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper("administrador/cargar_alumnos");
  }

  public function index()
  {
    if ($this->session->userdata('administrador')) {
      $this->load->view('administrador/buscar_alumno');
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function cargar_alumnos()
  {
    extract($_POST);
    return cargar_alumnos($datos);
  }
}
