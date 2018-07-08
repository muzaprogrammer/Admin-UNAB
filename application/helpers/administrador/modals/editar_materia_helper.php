<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function editar_materia($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $query = $CI->db->query("SELECT * FROM materias WHERE idmateria = ".$id);
  foreach($query->result_array() as $row){
    $codigo = $row['codigo'];
    $materia = $row['materia'];
  }

  ?>
  <div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Editar Materia</h3>
			</div>
			<!-- // Modal heading END -->
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" id="form_facultad" name="form_facultad">
              <br>
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo: </label>
                <div class="col-sm-10">
                  <input type="text" name="codigo" id="codigo" class="form-control" value="<?=$codigo?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Materia:</label>
                <div class="col-md-10">
                  <input type="text" name="materia" id="materia" class="form-control" value="<?=$materia?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <div class="text-center">
                  <button type="button" class="btn btn-warning" onclick="editar(<?=$id?>);" name="submit" id="submit">
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
