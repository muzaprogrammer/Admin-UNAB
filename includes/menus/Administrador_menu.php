<aside class="sidebar">
  <div id="leftside-navigation" class="nano">
    <ul class="nano-content">
      <li <?php if($opt == "admin_index"){ echo 'class="active"'; }?> ><a href="../administrador/index"><i class=" icon-projector-screen-line"></i><span>Dashboard</span></a></li>



      <li <?php if($opt == "admin_nuevo_alumno" || $opt == "admin_buscar_alumno"){ echo 'class="sub-menu active"'; }else{echo 'class="sub-menu"'; }?>>
        <a href="#" data-target="#menu-alumnos" data-toggle="collapse"><i class="fa fa-group"></i><span>Alumnos</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul <?php if($opt == "admin_nuevo_alumno" || $opt == "admin_buscar_alumno"){ echo 'class="collapse in "'; }else{echo 'class="collapse"'; }?> id="menu-alumnos">
          <li <?php if($opt == "admin_nuevo_alumno"){ echo 'class="active"'; }?>><a href="../administrador/nuevo_alumno"><i class="fa fa-plus"></i>Agregar</a></li>
          <li <?php if($opt == "admin_buscar_alumno"){ echo 'class="active"'; }?>><a href="../administrador/buscar_alumno"><i class="fa fa-search"></i>Buscar alumno</a></li>
        </ul>
      </li>

      <li <?php if($opt == "admin_facultades"){ echo 'class="sub-menu active"'; }else{echo 'class="sub-menu"'; }?>>
        <a href="#" data-target="#menu-facultades" data-toggle="collapse"><i class="fa fa-paste"></i><span>Facultades</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul <?php if($opt == "admin_facultades"){ echo 'class="collapse in "'; }else{echo 'class="collapse"'; }?> id="menu-facultades">
          <li <?php if($opt == "admin_facultades"){ echo 'class="active"'; }?>><a href="../administrador/facultades"><i class="fa fa-list-ol"></i>Administracion de Facultades</a></li>
        </ul>
      </li>

      <li <?php if($opt == "admin_carreras"){ echo 'class="sub-menu active"'; }else{echo 'class="sub-menu"'; }?>>
        <a href="#" data-target="#menu-carreras" data-toggle="collapse"><i class="fa fa-list-alt"></i><span>Carreras</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul <?php if($opt == "admin_carreras"){ echo 'class="collapse in "'; }else{echo 'class="collapse"'; }?> id="menu-carreras">
          <li <?php if($opt == "admin_carreras"){ echo 'class="active"'; }?>><a href="../administrador/carreras"><i class="fa fa-list-ol"></i>Administracion de Carreras</a></li>
        </ul>
      </li>

      <li <?php if($opt == "admin_materias"){ echo 'class="sub-menu active"'; }else{echo 'class="sub-menu"'; }?>>
        <a href="#" data-target="#menu-materias" data-toggle="collapse"><i class="fa fa-paste"></i><span>Materias</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul <?php if($opt == "admin_materias"){ echo 'class="collapse in "'; }else{echo 'class="collapse"'; }?> id="menu-materias">
          <li <?php if($opt == "admin_materias"){ echo 'class="active"'; }?>><a href="../administrador/materias"><i class="fa fa-list-ol"></i>Administracion de Materias</a></li>
        </ul>
      </li>

      <li <?php if($opt == "admin_secciones"){ echo 'class="sub-menu active"'; }else{echo 'class="sub-menu"'; }?>>
        <a href="#" data-target="#menu-secciones" data-toggle="collapse"><i class="fa fa-pencil-square"></i><span>Secciones</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul <?php if($opt == "admin_secciones"){ echo 'class="collapse in "'; }else{echo 'class="collapse"'; }?> id="menu-secciones">
          <li <?php if($opt == "admin_secciones"){ echo 'class="active"'; }?>><a href="../administrador/secciones"><i class="fa fa-list-ol"></i>Administracion de Secciones</a></li>
        </ul>
      </li>

      <li <?php if($opt == "admin_pensum"){ echo 'class="sub-menu active"'; }else{echo 'class="sub-menu"'; }?>>
        <a href="#" data-target="#menu-pensum" data-toggle="collapse"><i class="fa fa-folder-open"></i><span>Pensum</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul <?php if($opt == "admin_pensum"){ echo 'class="collapse in "'; }else{echo 'class="collapse"'; }?> id="menu-pensum">
          <li <?php if($opt == "admin_pensum"){ echo 'class="active"'; }?>><a href="../administrador/pensum"><i class="fa fa-list-ol"></i>Administracion de Pensum</a></li>
        </ul>
      </li>

      <li <?php if($opt == "admin_usuarios"){ echo 'class="sub-menu active"'; }else{echo 'class="sub-menu"'; }?>>
        <a href="#" data-target="#menu-usuarios" data-toggle="collapse"><i class="fa fa-gear"></i><span>Configuraciones</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul <?php if($opt == "admin_usuarios"){ echo 'class="collapse in "'; }else{echo 'class="collapse"'; }?> id="menu-usuarios">
          <li <?php if($opt == "admin_usuarios"){ echo 'class="active"'; }?>><a href="../administrador/usuarios"><i class="fa fa-list-ol"></i>Administracion de usuarios</a></li>
        </ul>
      </li>

      <li <?php if($opt == "admin_vitacora"){ echo 'class="active"'; }?> ><a href="../administrador/vitacora"><i class="fa fa-road"></i><span>Vitacora de Eventos</span></a></li>
      <li <?php if($opt == "admin_vitacora"){ echo 'class="active"'; }?> ><a href="../iniciar_sesion/cerrar_sesion"><i class="fa fa-sign-out"></i><span>Cerrar Sesion</span></a></li>
    </ul>
  </div>

</aside>
