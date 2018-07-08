<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function editar_pensum($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $query1 = $CI->db->query("SELECT * FROM detalle_pensum WHERE id_detalle_pensum = ".$id);
  foreach($query1->result_array() as $row1){
    $correlativo = $row1['correlativo'];
    $materia = $row1['id_materia'];
    $pensum = $row1['id_pensum'];
    $num_ciclo = $row1['num_ciclo'];
    $unidades_valorativas = $row1['unidades_valorativas'];
    $prerequisito = $row1['id_mat_requisito'];
  }

  ?>
  <div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Editar Pensum</h3>
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
                  <input type="text" name="correlativo" id="correlativo" value="<?=$correlativo?>" class="form-control">
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
                      if($materia == $row['idmateria']){
                        $options .= '<option value="'.$row['idmateria'].'" selected>'.$row['codigo']." - ".$row['materia'].'</option>';
                      }else {
                        $options .= '<option value="'.$row['idmateria'].'">'.$row['codigo']." - ".$row['materia'].'</option>';
                      }
                    }
                    echo $options;
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Num Ciclo: </label>
                <div class="col-sm-10">
                  <input type="text" name="num_ciclo" id="num_ciclo" value="<?=$num_ciclo?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Unidades Valorativas: </label>
                <div class="col-sm-10">
                  <input type="text" name="unidades_valorativas" id="unidades_valorativas" value="<?=$unidades_valorativas?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Prerequisito:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="prerequisito" id="prerequisito">
                    <?
                    $options = '<option value="">Seleccione una materia...</option>';

                      $options .= '<option value="0" selected >NINGUNA</option>';

                    $query = $CI->db->query("SELECT * FROM materias WHERE estado=0");
                    foreach($query->result_array() as $row){
                      if($prerequisito == $row['idmateria']){
                          $options .= '<option value="'.$row['idmateria'].'" selected>'.$row['codigo']." - ".$row['materia'].'</option>';
                      }else{
                          $options .= '<option value="'.$row['idmateria'].'">'.$row['codigo']." - ".$row['materia'].'</option>';
                      }

                    }

                    echo $options;
                    ?>
                  </select>
                </div>
              </div>
              <input type="hidden" name="id" id="id" value="<?=$pensum?>">
              <input type="hidden" name="id_det" id="id_det" value="<?=$id?>">
              <br><br>
              <div class="form-group">
                <div class="text-center">
                  <button type="button" class="btn btn-warning" onclick="editar(<?=$pensum?>);" name="submit" id="submit">
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
