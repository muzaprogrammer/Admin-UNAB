<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ver_inscripcion extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper('alumno/modals/inscribir');
    $this->load->helper('alumno/cargar_secciones_disponibles');
    $this->load->helper('alumno/cargar_materias_inscritas');
    $this->load->model('alumno/inscripcion_model');
    $this->load->model("administrador/datos_alumno_model");
  }

  public function index()
  {
    if ($this->session->userdata('administrador') || $this->session->userdata('alumno')) {

      $user_data = $this->session->userdata('alumno');
      $data['datos'] = $this->datos_alumno_model->detalles_alumno($user_data['id']);
      $this->load->view('alumno/ver_inscripcion',$data);
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function load_respuesta(){
    extract($_POST);
    return $this->inscripcion_model->load_respuesta($id);
  }

  public function inscribir(){
    extract($_POST);
    return inscribir($id);
  }

  public function inscripcion_materias(){
    $user_data = $this->session->userdata('alumno');
    $data['datos'] = $this->datos_alumno_model->detalles_alumno($user_data['id']);
    $this->load->view('alumno/inscripcion_materias',$data);
  }

  public function inscribir_ciclo(){
    extract($_POST);
    return $this->inscripcion_model->inscribir_ciclo($id,$ciclo);
  }

  public function cargar_secciones_disponibles()  {
    extract($_POST);
    return cargar_secciones_disponibles($id,$id_ins);
  }

  public function cargar_materias_inscritas()  {
    extract($_POST);
    return cargar_materias_inscritas($id_ins);
  }

  public function inscribir_materia(){
    extract($_POST);
    return $this->inscripcion_model->inscribir_materia($id,$id_ins);
  }

  public function eliminar_materia(){
    extract($_POST);
    return $this->inscripcion_model->eliminar_materia($id);
  }

}
