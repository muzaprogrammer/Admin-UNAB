<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function inscribir($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

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
				<h3 class="modal-title">Seleccione el Ciclo</h3>
			</div>
			<!-- // Modal heading END -->
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" id="form_secciones" name="form_secciones">
              <br>
              <div class="form-group">
                <label class="col-md-2 control-label">Ciclo:</label>
                <div class="col-md-10">
                  <select class="form-control" name="ciclo" id="ciclo">
                    <?=$optionsciclo?>
                  </select>
                </div>
              </div>
              <input type="hidden" name="id" id="id" value="<?=$id?>">
              <br><br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" class="btn btn-success" onclick="guardar();" name="submit" id="submit">
                    <i class="fa fa-save"></i> Inscribir
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
