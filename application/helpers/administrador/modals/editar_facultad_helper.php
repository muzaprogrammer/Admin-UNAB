<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function editar_facultad($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $query = $CI->db->query("SELECT * FROM facultades WHERE idfacultad = ".$id);
  foreach($query->result_array() as $row){
    $facultad = $row['facultad'];
  }

  ?>
  <div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Editar Facultad</h3>
			</div>
			<!-- // Modal heading END -->
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" id="form_facultad" name="form_facultad">
              <br>
              <div class="form-group">
                <label class="col-md-2 control-label">Facultad:</label>
                <div class="col-md-10">
                  <input type="text" name="facultad" id="facultad" class="form-control" value="<?=$facultad?>">
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
