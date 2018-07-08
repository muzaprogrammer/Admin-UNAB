<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function agregar_carrera(){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  ?>
  <div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Agregar Carrera</h3>
			</div>
			<!-- // Modal heading END -->
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" id="form_carreras" name="form_carreras">
              <br>
              <div class="form-group">
                <label class="col-sm-2 control-label">Facultad: </label>
                <div class="col-sm-10">
                  <select class="form-control" name="facultad" id="facultad">
                    <?
                    $options = '<option value="">Seleccione una facultad...</option>';
                    $query = $CI->db->query("SELECT * FROM facultades WHERE estado=0");
                    foreach($query->result_array() as $row){
                      $options .= '<option value="'.$row['idfacultad'].'">'.$row['facultad'].'</option>';
                    }
                    echo $options;
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Carrera:</label>
                <div class="col-md-10">
                  <input type="text" name="carrera" id="carrera" class="form-control">
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
