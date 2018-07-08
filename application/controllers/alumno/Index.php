<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
    if($this->session->userdata('alumno')) {
  		$this->load->view('alumno/index');
    }else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }
}
