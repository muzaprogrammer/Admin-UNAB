<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "includes/meta.php";?>
</head>
<body class="" onload="load_pensum(<?=$_GET['id']?>)">
  <section id="container">
    <?php $opt="admin_pensum";?>
    <?php include "includes/nav_bar_header.php";?>
    <?php include "includes/menus/".$user_data['menu']?>

    <!--main content start-->
    <section class="main-content-wrapper">
      <section id="main-content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Administracion de Pensum</h3>
                <div class="actions pull-right">
                  <i class="fa fa-chevron-down"></i>
                  <i class="fa fa-times"></i>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-sm-6">
                    <span class="btn btn-success" onclick="registrar(<?=$_GET['id']?>);"><i class="fa fa-plus"></i>Agregar Materia al pensum</span>
                  </div>
                  <div class="col-sm-6" style="text-align: right">
                    <span class="btn btn-info" onclick="javascript:window.open('../imprimibles/imprimir/print_pdf_pensum?id=<?php echo $_GET['id'];?>')" title="Matriculas"><i class="fa fa-print"></i>Imprimir Pensum</span>
                  </div>
                </div>
                <hr class="separator" />
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nombre Pensum: </label>
                  <div class="col-sm-10">
                    <input type="text" name="nombre" id="nombre" disabled value="<?=$datos['nombre']?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Carrera:</label>
                  <div class="col-sm-10">
                    <input type="text" name="carrera" id="carrera" disabled value="<?=$datos['carrera']?>" class="form-control">
                  </div>
                </div>


                <hr class="separator" />
                <div class="form-group">
                  <div class="col-md-12">
                    <br>
                    <div class="table-responsive" id="pensum">
                    </div>
                    <div class="modal fade" id="div_modal">
                    </div>
                  </div>
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
  <script src="<?=base_url();?>js/administrador/datos_pensum.js"></script>
</body>
</html>
