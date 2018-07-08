<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cobrar_solicitud extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper("recepcion/load_cobros");
    $this->load->model("recepcion/cobrar_matricula_model");
  }

  public function index()
  {
    if ($this->session->userdata('recepcion')) {
      $this->load->view('recepcion/cobrar_solicitud');
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function load_cobros()
  {
    return load_cobros_solicitudes();
  }

  public function cobrar(){
		extract($_POST);
		return $this->cobrar_matricula_model->cobrar_solicitud($id);
	}
}
