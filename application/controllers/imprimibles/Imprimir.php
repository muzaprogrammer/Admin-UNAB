<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imprimir extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
	}
	//** PRINT ORDENES DE SALIDA **//
	public function print_pdf_pensum(){	
    $this->load->view('imprimibles/print_pdf_pensum');

	}
}
?>
