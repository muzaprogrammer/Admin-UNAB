<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function cambiar_seccion($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $query = $CI->db->query("SELECT * FROM inscripciones_materias
    INNER JOIN secciones ON secciones.id_seccion = inscripciones_materias.id_seccion_materia
    INNER JOIN materias ON materias.idmateria=secciones.id_materia
    WHERE id_inscripcion_materia=".$id);
    foreach($query->result_array() as $row){
      $idmateria = $row['id_materia'];
      $materia = $row['materia'];

      $lunes=$row['lunes'];
      $martes=$row['martes'];
      $miercoles=$row['miercoles'];
      $jueves=$row['jueves'];
      $viernes=$row['viernes'];
      $sabado=$row['sabado'];
      $domingo=$row['domingo'];

      $horario="";
      if($lunes==1){
        $horario.="lun - ";
      }
      if($martes==1){
        $horario.="mar - ";
      }
      if($miercoles==1){
        $horario.="mie - ";
      }
      if($jueves==1){
        $horario.="jue - ";
      }
      if($viernes==1){
        $horario.="vie - ";
      }
      if($sabado==1){
        $horario.="sab - ";
      }
      if($domingo==1){
        $horario.="dom - ";
      }

      $horario.=date("g:i a",strtotime($row['hora_desde']))." - ";
      $horario.=date("g:i a",strtotime($row['hora_hasta']));
    }

  $optionsciclo = '<option value="">Seleccione un ciclo...</option>';
  $query = $CI->db->query("SELECT * FROM secciones
    WHERE id_materia=".$idmateria);
    foreach($query->result_array() as $row){
      $lunes=$row['lunes'];
      $martes=$row['martes'];
      $miercoles=$row['miercoles'];
      $jueves=$row['jueves'];
      $viernes=$row['viernes'];
      $sabado=$row['sabado'];
      $domingo=$row['domingo'];

      $horario="";
      if($lunes==1){
        $horario.="lun - ";
      }
      if($martes==1){
        $horario.="mar - ";
      }
      if($miercoles==1){
        $horario.="mie - ";
      }
      if($jueves==1){
        $horario.="jue - ";
      }
      if($viernes==1){
        $horario.="vie - ";
      }
      if($sabado==1){
        $horario.="sab - ";
      }
      if($domingo==1){
        $horario.="dom - ";
      }

      $horario.=date("g:i a",strtotime($row['hora_desde']))." - ";
      $horario.=date("g:i a",strtotime($row['hora_hasta']));

      $optionsciclo .= '<option value="'.$row['id_seccion'].'" selected>'.$horario.'</option>';
    }

  ?>
  <script src="<?=base_url();?>assets/components/plugins/mask/mask.js"></script>

  <div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Cambiar Seccion</h3>
			</div>
			<!-- // Modal heading END -->
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" role="form" id="form_secciones" name="form_secciones">
              <br>
              <div class="form-group">
                <label class="col-md-2 control-label">Materia:</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="materia" id="materia" readonly value="<?=$materia?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Horario:</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="horario" id="horario" readonly value="<?=$horario?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label">Seleccione nuevo horario:</label>
                  <select class="form-control" name="seccion" id="seccion">
                    <?=$optionsciclo?>
                  </select>
                </div>
              </div>
              <input type="hidden" name="id" id="id" value="<?=$id?>">
              <br><br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" class="btn btn-success" onclick="guardar_solicitud();" name="submit" id="submit">
                    <i class="fa fa-save"></i> Crear solicitud
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
