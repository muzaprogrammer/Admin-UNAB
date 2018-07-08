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
<html class="no-js">
<head>
  <?php include "includes/meta.php";?>

</head>
<body class="" onload="load_resppuesta(<?=$user_data['id']?>)">
  <section id="container">
    <?php $opt="alum_inscripcion";?>
    <?php include "includes/nav_bar_header.php";?>
    <?php include "includes/menus/".$user_data['menu']?>

    <!--main content start-->
    <section class="main-content-wrapper">
      <section id="main-content">
        <div class="row">
        </div>
      </section>
    </section>
    <!--main content end-->
  </section>
  <div class="modal fade" id="div_modal">
  </div>
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true" id="modalcontent"></div>
  <?php include "includes/footer.php"?>
  <script src="<?=base_url();?>js/alumno/inscripcion.js"></script>
</body>
</html>
