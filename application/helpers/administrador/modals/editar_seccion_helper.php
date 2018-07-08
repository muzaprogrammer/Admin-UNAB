<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function editar_seccion($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $query = $CI->db->query("SELECT * FROM secciones WHERE id_seccion = ".$id);
  foreach ($query->result_array() as $row) {

  $optionsmateria = '<option value="">Seleccione una materia...</option>';
  $query1 = $CI->db->query("SELECT * FROM materias WHERE estado=0 ORDER BY materia ASC");
  foreach($query1->result_array() as $row1){
    if($row['id_materia']==$row1['idmateria']){
      $optionsmateria .= '<option value="'.$row1['idmateria'].'" selected>'.$row1['materia'].'</option>';
    }else{
      $optionsmateria .= '<option value="'.$row1['idmateria'].'">'.$row1['materia'].'</option>';
    }
  }

  $optionsciclo = '<option value="">Seleccione un ciclo...</option>';
  $query2 = $CI->db->query("SELECT * FROM ciclo WHERE estado=0");
  foreach($query2->result_array() as $row2){
    if($row['id_ciclo']==$row2['id_ciclo']){
      $optionsciclo .= '<option value="'.$row2['id_ciclo'].'" selected>'.$row2['ciclo'].'</option>';
    }else{
      $optionsciclo .= '<option value="'.$row2['id_ciclo'].'">'.$row2['ciclo'].'</option>';
    }
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
                  <select class="form-control" name="materia" id="materia" disabled>
                    <?=$optionsmateria?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Seccion:</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" value="<?=$row['seccion']?>" name="seccion" id="seccion" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Ciclo:</label>
                <div class="col-md-10">
                  <select class="form-control" name="ciclo" id="ciclo" disabled>
                    <?=$optionsciclo?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Aula:</label>
                <div class="col-md-10">
                  <input type="text" name="aula" id="aula" value="<?=$row['aula']?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Cantidad de alumnos:</label>
                <div class="col-md-10">
                  <input type="number" name="cant_a" id="cant_a" value="<?=$row['cantidad_alumnos']?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Dias:</label>
                <div class="col-md-10">
                  <div class="col-md-12">
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="lunes" id="lunes" class="checkbox" <?if($row['lunes']==1){echo "checked";}?> value="1" />
                  			Lunes
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="miercoles" id="miercoles" class="checkbox" <?if($row['miercoles']==1){echo "checked";}?> value="1" />
                  			Miercoles
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="viernes" id="viernes" class="checkbox" <?if($row['viernes']==1){echo "checked";}?> value="1" />
                  			Viernes
                  		</label>
                    </div>
                    </div>
                  <div class="col-md-12">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="martes" id="martes" class="checkbox" <?if($row['martes']==1){echo "checked";}?> value="1" />
                  			Martes
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="jueves" id="jueves" class="checkbox" <?if($row['jueves']==1){echo "checked";}?> value="1" />
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
                  			<input type="checkbox" name="sabado" id="sabado" class="checkbox" <?if($row['sabado']==1){echo "checked";}?> value="1" />
                  			Sabado
                  		</label>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                      <label class="checkbox">
                  			<input type="checkbox" name="domingo" id="domingo" class="checkbox" <?if($row['domingo']==1){echo "checked";}?> value="1" />
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
                    <input id="desde" name="desde" type="text" data-mask="99:99" placeholder="Ej.15:00,18:00,08:00" value="<?=date('H:i',strtotime($row['hora_desde']))?>" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Hasta:</label>
                <div class="col-md-10">
                  <div class="bootstrap-timepicker">
                    <input id="hasta" name="hasta" type="text" data-mask="99:99" placeholder="Ej.15:00,18:00,08:00" value="<?=date('H:i',strtotime($row['hora_hasta']))?>" class="form-control" />
                  </div>
                </div>
              </div>
              <input type="hidden" name="id" id="id" value="<?=$id?>">
              <br><br>
              <div class="form-group">
                <div class="text-center">
                  <button type="button" class="btn btn-warning" onclick="actualizar();" name="submit" id="submit">
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

<?php }} ?>
