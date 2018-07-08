<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "includes/meta.php";?>
</head>
<body class="" onload="load_vitacora()">
  <section id="container">
    <?php $opt="admin_vitacora";?>
    <?php include "includes/nav_bar_header.php";?>
    <?php include "includes/menus/".$user_data['menu']?>

    <!--main content start-->
    <section class="main-content-wrapper">
      <section id="main-content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Administracion de Usuarios</h3>
                <div class="actions pull-right">
                  <i class="fa fa-chevron-down"></i>
                  <i class="fa fa-times"></i>
                </div>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <div class="row">
                    <div class="well">
  			              <h4>Fecha de actividad</h4>
                      <div class="input-group date" id="datepicker2">
                        <input class="form-control" type="text" name="fecha_vitacora" id="fecha_vitacora" onchange="load_vitacora(this.value)" value="<?=date('d-m-Y')?>" />
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="separator" />
                <div class="table-responsive panel-collapse pull out">
                  <div id="resultado"></div>
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
  <script src="<?=base_url();?>js/administrador/vitacora.js"></script>
</body>
</html>
