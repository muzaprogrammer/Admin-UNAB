<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuevo_alumno extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
    $this->load->helper("calcular_edad_helper");
    $this->load->helper("administrador/modals/tomar_foto");
    $this->load->model('administrador/nuevo_alumno_model');
	}

	public function index()
	{
    if($this->session->userdata('administrador') || $this->session->user_data('alumno')) {
  		$this->load->view('administrador/nuevo_alumno');
    }else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function calcular_edad(){
    extract($_POST);
		return calcular_edad($fecha);
	}

  public function load_sexo(){
		return $this->nuevo_alumno_model->load_sexo();
	}

  public function load_compania(){
		return $this->nuevo_alumno_model->load_compania();
	}

  public function load_tipo_smartphone(){
		return $this->nuevo_alumno_model->load_tipo_smartphone();
	}

  public function load_estado_civil(){
		return $this->nuevo_alumno_model->load_estado_civil();
	}

  public function load_departamentos(){
		return $this->nuevo_alumno_model->load_departamentos();
	}

  public function load_municipios(){
    extract($_POST);
		return $this->nuevo_alumno_model->load_municipios($departamento);
	}

  public function load_pensum(){
    extract($_POST);
		return $this->nuevo_alumno_model->load_pensum();
	}

  public function cargar_modal_foto(){
    extract($_POST);
		return cargar_modal($id);
	}

  public function do_upload(){
		extract($_POST);
    echo $_GET['id'];
		$data = file_get_contents("php://input");
		$data = str_replace('data:image/png;base64,', '', $data);
		$data = str_replace(' ', '+', $data);
		$data = base64_decode($data);

		$newfile= rtrim($_GET['id'].".png");
		$var_name_img = $newfile;
		$var_img_dir =rtrim("assets/images/expedientes/");
		$imagen= $var_img_dir.$var_name_img;
		unlink($imagen);
		//subida de imagen normal
		$fp = fopen($imagen, 'wb');
	  $ok = fwrite( $fp, $data);
	  fclose( $fp );

		return $this->nuevo_alumno_model->actualizar_foto($_GET['id'],$var_name_img);
	}

  public function guardar_alumno(){
    extract($_POST);
		return $this->nuevo_alumno_model->guardar_alumno(
      $carnet,$nom_completo,$nombre,$apellido,$sexo,$fecha_nac,$tsangre,$dui,$nit,$departamento,
      $municipio,$direccion,$tel_casa,$tel_celular,$email,$compania,$smartphone,$tiposmartphone,
      $contacto_emergencia,$tel_contac_emergencia,$empresa,$cargo,$tel_trabajo,$dir_empresa,
      $user,$pass,$pensum
    );
	}
}
