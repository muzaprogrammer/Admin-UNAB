<aside class="sidebar">
  <div id="leftside-navigation" class="nano">
    <ul class="nano-content">
      <li <?php if($opt == "alum_index"){ echo 'class="active"'; }?> ><a href="../alumno/index"><i class=" icon-projector-screen-line"></i><span>Dashboard</span></a></li>

      <li <?php if($opt == "alum_inscripcion"){ echo 'class="active"'; }?> ><a href="../alumno/inscripcion"><i class="fa fa-plus"></i><span>Inscripcion Ciclo</span></a></li>

      <li <?php if($opt == "alum_perfil"){ echo 'class="active"'; }?> ><a href="../alumno/datos_alumno?id=<?=$user_data['id']?>"><i class="fa fa-user"></i><span>Perfil</span></a></li>

      <li <?php if($opt == "alum_pensum"){ echo 'class="active"'; }?> ><a href="../imprimibles/imprimir/print_pdf_pensum?id=<?=$user_data['pensum']?>" target="_blank"><i class="fa fa-folder-open"></i><span>Pensum</span></a></li>

      <li <?php if($opt == "alum_"){ echo 'class="active"'; }?> ><a href="../alumno/inscripcion"><i class="fa fa-repeat"></i><span>Cambio de seccion</span></a></li>

      <li <?php if($opt == "admin_vitacora"){ echo 'class="active"'; }?> ><a href="../iniciar_sesion/cerrar_sesion"><i class="fa fa-sign-out"></i><span>Cerrar Sesion</span></a></li>
    </ul>
  </div>

</aside>
