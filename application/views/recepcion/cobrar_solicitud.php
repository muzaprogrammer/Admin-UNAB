<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "includes/meta.php";?>
</head>
<body class="" onload="load_cobros_solicitudes()">
  <section id="container">
    <?php $opt="rep_solicitudes";?>
    <?php include "includes/nav_bar_header.php";?>
    <?php include "includes/menus/".$user_data['menu']?>

    <!--main content start-->
    <section class="main-content-wrapper">
      <section id="main-content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Cobros de Cambios de Seccion</h3>
                <div class="actions pull-right">
                  <i class="fa fa-chevron-down"></i>
                  <i class="fa fa-times"></i>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive" id="cobros_solicitud">
                </div>
                <div class="modal fade" id="div_modal">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
    <!--main content end-->
  </section>
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true" id="modalcontent"></div>
  <?php include "includes/footer.php"?>
  <script src="<?=base_url();?>js/recepcion/cobrar_matricula.js"></script>
</body>
</html>
