<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('administrador','rol')){
$user_data = $this->session->userdata('administrador');
$texto='ADMIN';
}
else if($this->session->userdata('recepcion','rol')){
$user_data = $this->session->userdata('recepcion');
$texto='ADMIN';
}
else if($this->session->userdata('alumno','rol')){
$user_data = $this->session->userdata('alumno');
$texto='PORTAL';
}
else if($this->session->userdata('docente','rol')){
$user_data = $this->session->userdata('docente');
}


?>
<header id="header">
  <!--logo start-->
  <div class="brand">
    <a href="index" class="logo"><span><?php echo $texto;?></span>UNAB</a>
  </div>
  <!--logo end-->
  <div class="toggle-navigation toggle-left">
    <div class="pull-left">
      <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
        <i class="fa fa-bars"></i>
      </button>
    </div>
    <div class="navbar-brand">
      Universidad Dr. Andrés Bello
    </div>
  </div>
  <div class="user-nav">
    <ul>
      <li class="profile-photo">
        <img src="<?=base_url();?>assets/images/<?php echo $user_data['foto'];?>" height="35px" width="35px" alt="" class="img-circle">
      </li>
      <li class="dropdown settings">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <?php echo $user_data['nombres'];?> <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu animated fadeInDown">

          <li>
            <a href="../Iniciar_sesion/cerrar_sesion"><i class="fa fa-power-off"></i> CERRAR SESSION</a>
          </li>
        </ul>
      </li>

      </ul>
    </div>
  </header>
