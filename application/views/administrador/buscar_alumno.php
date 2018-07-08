<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "includes/meta.php";?>
</head>
<body class="" onload="load_pensum();load_sexo();load_departamentos();load_compania();load_tipo_smartphone();">
  <section id="container">
    <?php $opt="admin_buscar_alumno";?>
    <?php include "includes/nav_bar_header.php";?>
    <?php include "includes/menus/".$user_data['menu']?>

    <!--main content start-->
    <section class="main-content-wrapper">
      <section id="main-content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Buscar Alumno</h3>
                <div class="actions pull-right">
                  <i class="fa fa-chevron-down"></i>
                  <i class="fa fa-times"></i>
                </div>
              </div>
              <div class="panel-body">
                <h3 class="box-title">Digite el nombre el alumno</h3>
                <br/>
                <div class="input-group">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-inverse"><i class="fa fa-search"></i></button>
                  </div>
                  <input type="text" class="form-control" name="alumno" id="alumno" onkeyup="cargar_alumnos();" placeholder="Escriba el nombre del alumno..."/>
                </div>
                <hr class="separator" />
                <div class="table-responsive" id="datos_alumnos">
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
  <script src="<?=base_url();?>js/administrador/buscar_alumno.js"></script>
</body>
</html>
