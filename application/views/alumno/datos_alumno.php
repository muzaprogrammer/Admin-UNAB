<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <?php include "includes/meta.php";?>
</head>
<body class="" onload="disabled_form();correo();calcular_edad();posee_smartphone(<?=$datos['smartphone']?>);">
  <section id="container">
    <?php $opt="alum_perfil";?>
    <?php include "includes/nav_bar_header.php";?>
    <?php include "includes/menus/".$user_data['menu']?>


    <!--main content start-->
    <section class="main-content-wrapper">
      <section id="main-content">
        <div class="row">
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Foto Alumno</h3>
                <div class="actions pull-right">
                  <i class="fa fa-chevron-down"></i>
                  <i class="fa fa-times"></i>
                </div>
              </div>
              <div class="panel-body">
                <img width="100%" alt="user" src="<?=base_url();?>/assets/images/expedientes/<?=$datos['foto']?>">
              </div>
              <div class="panel-footer text-center">
                <button type="button" class="btn btn-warning hidden-xs" onclick="cargar_modal(<?=$_GET['id']?>);">Cambiar fotografia</button>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Editar Datos del Alumno</h3>
                <div class="actions pull-right">
                  <i class="fa fa-chevron-down"></i>
                  <i class="fa fa-times"></i>
                </div>
              </div>
              <div class="panel-body">
                <form class="form-horizontal margin-none" id="form_alumno" method="get" autocomplete="off">
                  <!-- Widget -->
                  <div class="widget widget-inverse">
                    <div class="widget-body">
                      <h3 class="box-title">DATOS GENERALES</h3>
                      <hr class="m-t-0 m-b-40">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-3 control-label" for="firstname">Carnet:</label>
                            <div class="col-md-9">
                             <input class="form-control" id="carnet" name="carnet" onkeyup="correo();" type="text" data-mask="99-9999-9999" readonly value="<?=$datos['carnet']?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-3 control-label" for="firstname">Nombre Completo:</label>
                            <div class="col-md-9">
                             <input class="form-control" id="nom_completo" name="nom_completo" type="text" readonly value="<?=$datos['nom_completo']?>" readonly/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-md-3 control-label" for="firstname">Nombres:</label>
                            <div class="col-md-9">
                             <input class="form-control" id="nombre" name="nombre" onkeyup="nombre_completo()" readonly value="<?=$datos['nombre']?>" type="text" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                						<label class="col-md-3 control-label" for="lastname">Apellidos:</label>
                						<div class="col-md-9">
                              <input class="form-control" id="apellido" name="apellido" onkeyup="nombre_completo()" readonly value="<?=$datos['apellido']?>" type="text" />
                            </div>
                					</div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                						<label class="col-md-3 control-label" for="lastname">Sexo:</label>
                						<div class="col-md-9">
                              <select class="form-control" name="sexo" readonly id="sexo">
                                <?=$datos['sexo']?>
                              </select>
                            </div>
                					</div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                						<label class="col-md-3 control-label" for="lastname">Fecha de Nacimiento:</label>
                						<div class="col-md-9">
                              <input type="text" id="fecha_nac" onkeyup="calcular_edad()" readonly data-mask="99-99-9999" value="<?=$datos['fecha_nac']?>" name="fecha_nac" class="form-control span8 inputmask" placeholder="dd-mm-yyyy" />
                            </div>
                					</div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                						<label class="col-md-3 control-label" for="lastname">Edad:</label>
                						<div class="col-md-9">
                              <input type="text" id="edad" name="edad" class="form-control" readonly/>
                            </div>
                					</div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                						<label class="col-md-3 control-label" for="lastname">Tipo de sangre:</label>
                						<div class="col-md-9">
                              <input type="text" id="tsangre" name="tsangre" class="form-control" value="<?=$datos['tsangre']?>"/>
                            </div>
                					</div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                						<label class="col-md-3 control-label" for="lastname">DUI:</label>
                						<div class="col-md-9">
                              <input type="text" id="dui" name="dui" class="form-control" value="<?=$datos['dui']?>" placeholder="________-_" data-mask="99999999-9"/>
                            </div>
                					</div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                						<label class="col-md-3 control-label" for="lastname">NIT:</label>
                						<div class="col-md-9">
                              <input type="text" id="nit" name="nit" class="form-control" value="<?=$datos['nit']?>" placeholder="____-______-___-_" data-mask="9999-999999-999-9" />
                            </div>
                					</div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Departamento:</label>
                            <div class="col-md-9">
                              <select class="form-control" id="departamento" name="departamento">
                                <?=$datos['departamento']?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Municipio:</label>
                            <div class="col-md-9">
                              <select class="form-control" id="municipio" name="municipio">
                                <?=$datos['municipio']?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label col-md-1">Direccion:</label>
                            <div class="col-md-11">
                              <input type="text" class="form-control" id="direccion" value="<?=$datos['direccion']?>" name="direccion">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Telefono Casa:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control telefono" id="tel_casa" placeholder="____-____" data-mask="9999-9999" name="tel_casa" value="<?=$datos['tel_casa']?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Telefono Celular:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control telefono" id="tel_celular" placeholder="____-____" data-mask="9999-9999" name="tel_celular" value="<?=$datos['tel_celular']?>" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Correo Institucional:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="email" name="email" readonly/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Compañia de telefono:</label>
                            <div class="col-md-9">
                              <select class="form-control" name="compania" id="compania">
                                <?=$datos['compania']?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Posee SmartPhone:</label>
                            <div class="col-md-9">
                              <select class="form-control" onChange="posee_smartphone(this.value);" name="smartphone" id="smartphone">
                                <option value="">Seleccione...</option>
                                <option value="1" <?=$datos['poseesi']?>>SI</option>
                                <option value="0" <?=$datos['poseeno']?>>NO</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Tipo SmartPhone:</label>
                            <div class="col-md-9">
                              <select class="form-control" name="tiposmartphone" id="tiposmartphone" readonly>
                                <?=$datos['tiposmartphone']?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Empresa:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="empresa" name="empresa" value="<?=$datos['empresa']?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Cargo:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="cargo" name="cargo" empresa value="<?=$datos['cargo']?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Telefono Empresa:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control telefono" id="tel_trabajo" value="<?=$datos['tel_trabajo']?>" placeholder="____-____" data-mask="9999-9999" name="tel_trabajo"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Direcion Empresa:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="dir_empresa" value="<?=$datos['dir_empresa']?>" name="dir_empresa"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Estado Alumno:</label>
                            <div class="col-md-9">
                              <select class="form-control" name="estado" id="estado" readonly>
                                <option value="">Seleccione...</option>
                                <option value="0" <?=$datos['estado_activo']?>>ACTIVO</option>
                                <option value="1" <?=$datos['estado_inactivo']?>>INACTIVO</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <h3 class="box-title">OTROS DATOS</h3>
                      <hr class="m-t-0 m-b-40">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Contaco Emergencia:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="contacto_emergencia" value="<?=$datos['contacto_emergencia']?>" name="contacto_emergencia"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Telefono:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control telefono" id="tel_contac_emergencia" value="<?=$datos['tel_contac_emergencia']?>" placeholder="____-____" data-mask="9999-9999" name="tel_contac_emergencia"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <h3 class="box-title">CARRERA</h3>
                      <hr class="m-t-0 m-b-40">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label col-md-3">Carrera:</label>
                            <div class="col-md-9">
                              <select class="form-control" name="pensum" readonly id="pensum">
                                <?=$datos['pensum']?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <h3 class="box-title">INICIO DE SESION</h3>
                      <hr class="m-t-0 m-b-40">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">Usuario:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="user" value="<?=$datos['user']?>" readonly name="user"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-md-3">contraseña:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="pass" value="<?=$datos['pass']?>" name="pass"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="ida" id="ida" value="<?=$_GET["id"]?>">
                      <hr class="separator" />
              			   <div class="form-actions text-center">
              				    <span class="btn btn-success" id="editar" onclick="editar();"><i class="fa fa-edit"></i> Editar</span>
              				    <span class="btn btn-primary" id="cancelar" onclick="regresar();"><i class="fa fa-mail-reply"></i> Regresar</span>
              			   </div>
                    </div>
                  </div>
                </form>
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
  <script src="<?=base_url();?>js/administrador/nuevo_alumno.js"></script>
</body>
</html>
