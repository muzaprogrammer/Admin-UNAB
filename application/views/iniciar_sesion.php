<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "includes/meta.php";?>  
</head>
<body class=" loginWrapper">
  <section id="login-container">

    <div class="row">
      <div class="col-md-3" id="login-wrapper">
        <div class="panel panel-primary animated flipInY">
          <div class="panel-heading">
            <h4 class="innerAll margin-none border-bottom text-center">
              UNAB
            </h4>
          </div>
          <div class="panel-body">
            <p class="text-center">
              <i class="fa fa-lock"></i>
              Ingreso al sistema.
            </p>
            <form role="form" method="POST">

              <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" name="contra" placeholder="Contraseña" id="contra">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Ingresar</button>

            </form>
          </div>
        </div>
      </div>
    </div>

  </section>


  <script src="<?=base_url();?>assets/js/jquery-1.10.2.min.js"></script>
  <script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>assets/plugins/waypoints/waypoints.min.js"></script>
  <script src="<?=base_url();?>assets/plugins/nanoScroller/jquery.nanoscroller.min.js"></script>
  <script src="<?=base_url();?>assets/js/application.js"></script>
</body>
</html>
