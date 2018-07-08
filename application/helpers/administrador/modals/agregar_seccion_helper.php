<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function agregar_seccion(){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $optionsmateria = '<option value="">Seleccione una materia...</option>';
  $query = $CI->db->query("SELECT * FROM materias WHERE estado=0 ORDER BY materia ASC");
  foreach($query->result_array() as $row){
    $optionsmateria .= '<option value="'.$row['idmateria'].'">'.$row['materia'].'</option>';
  }

  $optionsciclo = '<option value="">Seleccione un ciclo...</option>';
  $query = $CI->db->query("SELECT * FROM ciclo WHERE estado=0");
  foreach($query->result_array() as $row){
    $optionsciclo .= '<option value="'.$row['id_ciclo'].'" selected>'.$row['ciclo'].'</option>';
  }

  ?>
  <script src="<?=base_url();?>assets/components/plugins/mask/mask.js"></script>

  <div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Agregar Seccion</h3>
			</div>
			<!-- // Modal heading END -->
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" id="form_secciones" name="form_secciones">
              <br>
              <div class="form-group">
                <label class="col-sm-2 control-label">Materia: </label>
                <div class="col-sm-10">
                  <select class="form-control" name="materia" id="materia">
                    <?=$optionsmateria?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Ciclo:</label>
                <div class="col-md-10">
                  <select class="form-control" name="ciclo" id="ciclo">
                    <?=$optionsciclo?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Aula:</label>
                <div class="col-md-10">
                  <input type="text" name="aula" id="aula" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Cantidad de alumnos:</label>
                <div class="col-md-10">
                  <input type="number" name="cant_a" id="cant_a" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Dias:</label>
                <div class="col-md-10">
                  <div class="col-md-12">
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="lunes" id="lunes" class="checkbox" value="1" />
                  			Lunes
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="miercoles" id="miercoles" class="checkbox" value="1" />
                  			Miercoles
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="viernes" id="viernes" class="checkbox" value="1" />
                  			Viernes
                  		</label>
                    </div>
                    </div>
                  <div class="col-md-12">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="martes" id="martes" class="checkbox" value="1" />
                  			Martes
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="jueves" id="jueves" class="checkbox" value="1" />
                  			Jueves
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="sabado" id="sabado" class="checkbox" value="1" />
                  			Sabado
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="domingo" id="domingo" class="checkbox" value="1" />
                  			Domingo
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Desde:</label>
                <div class="col-md-10">
                  <div class="bootstrap-timepicker">
                    <input id="desde" name="desde" type="text" data-mask="99:99" placeholder="Ej.15:00,18:00,08:00" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Hasta:</label>
                <div class="col-md-10">
                  <div class="bootstrap-timepicker">
                    <input id="hasta" name="hasta" type="text" data-mask="99:99" placeholder="Ej.15:00,18:00,08:00" class="form-control" />
                  </div>
                </div>
              </div>

              <br><br>
              <div class="form-group">
                <div class="text-center">
                  <button type="button" class="btn btn-warning" onclick="guardar();" name="submit" id="submit">
                    <i class="fa fa-save"></i> Guardar
                  </button>
                  <button type="button" class="btn btn-info" onclick="cerrar_modal();" id="salir">
                    <i class="fa fa-mail-reply"></i> Cerrar
                  </button>
                </div>
              </div>
              <div class="form-actions">
              </div>
            </form>
          </div>
				</div>
			</div>
			<!-- // Modal body END -->
		</div>
	</div>

<?php } ?>
