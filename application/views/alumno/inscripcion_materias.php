<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 if($this->session->userdata('administrador','rol')){
 $user_data = $this->session->userdata('administrador');
 }
 else if($this->session->userdata('recepcion','rol')){
 $user_data = $this->session->userdata('recepcion');
 }
 else if($this->session->userdata('alumno','rol')){
 $user_data = $this->session->userdata('alumno');
 }
 else if($this->session->userdata('docente','rol')){
 $user_data = $this->session->userdata('docente');
 }


?>
<!DOCTYPE html>
<html>
<head>
  <?php include "includes/meta.php";?>
</head>
<body class="" onload="load_secciones();load_materias()">
  <section id="container">
    <?php $opt="alum_inscripcion";?>
    <?php include "includes/nav_bar_header.php";?>
    <?php include "includes/menus/".$user_data['menu']?>

    <!--main content start-->
    <section class="main-content-wrapper">
      <section id="main-content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Inscripcion de Materias del alumno <?=$datos['nom_completo']?></h3>
                <div class="actions pull-right">
                  <i class="fa fa-chevron-down"></i>
                  <i class="fa fa-times"></i>
                </div>
              </div>
              <div class="panel-body">
                <h3 class="box-title">SELECCION DE MATERIAS</h3>
                <hr class="m-t-0 m-b-40">
                <br><br>
                <div class="table-responsive" id="secciones">
                </div>
                <br><br>

                <h3 class="box-title">MATERIAS SELECCIONADAS</h3>
                <hr class="m-t-0 m-b-40">
                <br><br>
                <div class="table-responsive" id="materias_seleccionadas">
                </div>

                <input type="hidden" name="id_pensum" id="id_pensum" value="<?=$user_data['pensum']?>">
                <input type="hidden" name="id_ins" id="id_ins" value="<?=$_GET["id"]?>">
                <hr class="separator" />
                 <div class="form-actions text-center">
                    <span class="btn btn-success" id="editar" onclick="ver_inscripcion(<?=$_GET["id"]?>);"><i class="fa fa-check"></i> Finalizar</span>

                 </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
    <!--main content end-->
  </section>
  <div class="modal fade" id="div_modal"></div>
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true" id="modalcontent"></div>
  <?php include "includes/footer.php"?>
  <script src="<?=base_url();?>js/alumno/inscripcion.js"></script>
</body>
</html>
