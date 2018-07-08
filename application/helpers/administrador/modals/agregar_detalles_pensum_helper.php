<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function agregar_pensum($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  ?>
  <div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Agregar Materia a Pensum</h3>
			</div>
			<!-- // Modal heading END -->
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" id="form_pensum" name="form_pensum">
              <br>
              <div class="form-group">
                <label class="col-sm-2 control-label">Correlativo: </label>
                <div class="col-sm-10">
                  <input type="text" name="correlativo" id="correlativo" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Materia:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="materia" id="materia">
                    <?
                    $options = '<option value="">Seleccione una materia...</option>';
                    $query = $CI->db->query("SELECT * FROM materias WHERE estado=0");
                    foreach($query->result_array() as $row){
                      $options .= '<option value="'.$row['idmateria'].'">'.$row['codigo']." - ".$row['materia'].'</option>';
                    }
                    echo $options;
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Num Ciclo: </label>
                <div class="col-sm-10">
                  <input type="text" name="num_ciclo" id="num_ciclo" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Unidades Valorativas: </label>
                <div class="col-sm-10">
                  <input type="text" name="unidades_valorativas" id="unidades_valorativas" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Prerequisito:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="prerequisito" id="prerequisito">
                    <?
                    $options = '<option value="">Seleccione una materia...</option>';
                    $options .= '<option value="0">NINGUNA</option>';
                    $query = $CI->db->query("SELECT * FROM materias WHERE estado=0");
                    foreach($query->result_array() as $row){
                      $options .= '<option value="'.$row['idmateria'].'">'.$row['codigo']." - ".$row['materia'].'</option>';
                    }
                    echo $options;
                    ?>
                  </select>
                </div>
              </div>
              <input type="hidden" name="id" id="id" value="<?=$id?>">
              <br><br>
              <div class="form-group">
                <div class="text-center">
                  <button type="button" class="btn btn-warning" onclick="guardar_materia(<?=$id?>);" name="submit" id="submit">
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
