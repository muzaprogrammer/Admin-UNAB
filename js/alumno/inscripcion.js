function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function cambiar_seccion(id){
  $.ajax({
    url: 'Inscripcion/cambiar_seccion',
    type: "POST",
    data: {id:id},
    beforeSend: function(){
      $('#div_modal').html(statement_loading());
      $('#div_modal').modal({backdrop: 'static', keyboard: false});
    },
    complete: function(){
      $('#div_modal').html();
     },
    success: function (response) {
      $('#div_modal').html(response);
    }
  });
}
function load_resppuesta(id){
  $.ajax({
    url: 'Inscripcion/load_respuesta',
    type: "POST",
    data: {id:id},
    beforeSend: function(){
      $('#myModal').modal('toggle');
      $('#myModal').modal('show');
    },
    complete: function(){
      $('#myModal').modal('hide');
    },
    success: function (response) {
      if(response == 1){
        swal({
          title: 'Atencion!',
          text: 'Ya tienes una inscripcion en proceso!',
          type: 'success',
          confirmButtonColor: '#ff9933',
          confirmButtonText: 'Ver Inscripcion!',
        }).then( function() {
          load_inscripcion_mat(id);
        });
      }else if(response == 2){
        swal({
          title: 'Atencion!',
          text: 'Ya estas inscrito!',
          type: 'success',
          confirmButtonColor: '#ff9933',
          confirmButtonText: 'Ver Inscripcion!',
        }).then( function() {
          load_inscripcion_mat(id);
        });
      }else if(response==0) {
        swal({
          title: 'Bienvenido',
          text: 'Estas a punto de comenzar el proceso de inscripcion, <br> ¿Estas Seguro de comenzar?',
          type: 'question',
          showCancelButton: true,
          confirmButtonColor: '#4fb7fe',
          cancelButtonColor: '#EF6F6C',
          allowOutsideClick: false,
          confirmButtonText: 'Si, Comenzar!',
          cancelButtonText: 'Cancelar'
        }).then(function () {
          $.ajax({
            url: 'Inscripcion/inscribir',
            type: "POST",
            data: {id:id},
            beforeSend: function(){
              $('#div_modal').html(statement_loading());
              $('#div_modal').modal({backdrop: 'static', keyboard: false});
            },
            complete: function(){
              $('#div_modal').html();
             },
            success: function (response) {
              $('#div_modal').html(response);
            }
          });
        });
      }
    }
  });
}

function load_inscripcion_mat(id){
 $.ajax({
   url: 'Inscripcion/load_inscripcion',
   type: "POST",
   data: {id:id},
   beforeSend: function(){
     $('#div_modal').html(statement_loading());
     $('#div_modal').modal({backdrop: 'static', keyboard: false});
   },
   complete: function(){
     $('#div_modal').html();
    },
   success: function (response) {
     window.location = "ver_inscripcion?id="+response;
   }
 });
}

function ver_inscripcion(response){
  swal({
    title: 'Exito!',
    text: 'Ciclo inscrito!<br>Recuerde que para hacer efectiva la inscripcion tiene 24hrs para hacer el pago!',
    type: 'success',
    confirmButtonColor: '#ff9933'
  }).then( function() {
    cerrar_modal();
    window.location = "../Ver_inscripcion?id="+response;
  });
}

function cerrar_modal(){
  $('#div_modal').modal('hide');
}

function guardar(){
  var id = $("#id").val();
  var ciclo = $("#ciclo").val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de inscribir en este ciclo?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Inscribir!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Inscripcion/inscribir_ciclo',
      type: "POST",
      data: {id:id,ciclo:ciclo},
      beforeSend: function(){
        $('#myModal').modal('toggle');
        $('#myModal').modal('show');
      },
      complete: function(){
        $('#myModal').modal('hide');
      },
      success: function (response) {
        if(response > 0){
          swal({
            title: 'Exito!',
            text: 'Ciclo inscrito!<br>Ahora debe inscribir las materias!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            window.location = "Inscripcion/inscripcion_materias?id="+response;
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error! Ocurrio un error al intentar inscribir el ciclo',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}


function guardar_solicitud(){
  var id = $("#id").val();
  var seccion = $("#seccion").val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de hacer una solicitud de cambio de seccion?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Solicitar cambio!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Inscripcion/guardar_solicitud',
      type: "POST",
      data: {id:id,seccion:seccion},
      beforeSend: function(){
        $('#myModal').modal('toggle');
        $('#myModal').modal('show');
      },
      complete: function(){
        $('#myModal').modal('hide');
      },
      success: function (response) {
        if(response ==0 ){
          swal({
            title: 'Exito!',
            text: 'Se creo la solicitud!<br>Recuerde que para que la solicitud sea efectiva debe realizar el pago en las siguientes 24 hrs!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error! Ocurrio un error vuelva a intentarlo',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function load_secciones(){
  var id = $("#id_pensum").val();
  var id_ins = $("#id_ins").val();
  $.ajax({
    url: '../../alumno/Inscripcion/cargar_secciones_disponibles',
    data: {id:id,id_ins:id_ins},
    type: "POST",
    beforeSend: function(){
      $('#secciones').show();
      $('#secciones').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#secciones').html(response);
    }
  });
}

function load_materias(){
  var id_ins = $("#id_ins").val();
  $.ajax({
    url: '../../alumno/Inscripcion/cargar_materias_inscritas',
    data: {id_ins:id_ins},
    type: "POST",
    beforeSend: function(){
      $('#materias_seleccionadas').show();
      $('#materias_seleccionadas').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../../../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#materias_seleccionadas').html(response);
    }
  });
}

function load_inscripcion(){
  var id_ins = $("#id_ins").val();
  $.ajax({
    url: '../alumno/Inscripcion/cargar_materias_inscritas',
    data: {id_ins:id_ins},
    type: "POST",
    beforeSend: function(){
      $('#materias_seleccionadas').show();
      $('#materias_seleccionadas').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#materias_seleccionadas').html(response);
    }
  });
}

function inscribir_materia(id){
  var id_ins = $("#id_ins").val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de inscribir esta materia?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Inscribir!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: '../../alumno/Inscripcion/inscribir_materia',
      type: "POST",
      data: {id:id,id_ins:id_ins},
      beforeSend: function(){
        $('#myModal').modal('toggle');
        $('#myModal').modal('show');
      },
      complete: function(){
        $('#myModal').modal('hide');
      },
      success: function (response) {
        if(response == 0){
          swal({
            title: 'Exito!',
            text: 'Materia inscrita!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            load_materias();
            load_secciones();
            //window.location = "Inscripcion/inscripcion_materias?id="+response;
          });
        }else if(response == 1){
          swal({
            title: 'Ooops !',
            text: 'Error! Ya llego al limite de inscripcion',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }else{
          swal({
            title: 'Ooops !',
            text: 'Error! Ocurrio un error al intentar inscribir el ciclo',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function eliminar_materia(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de eliminar esta materia?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Eliminar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: '../../alumno/Inscripcion/eliminar_materia',
      type: "POST",
      data: {id:id,},
      beforeSend: function(){
        $('#myModal').modal('toggle');
        $('#myModal').modal('show');
      },
      complete: function(){
        $('#myModal').modal('hide');
      },
      success: function (response) {
        if(response == 0){
          swal({
            title: 'Exito!',
            text: 'Materia Eliminada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            load_materias();
            load_secciones();
            //window.location = "Inscripcion/inscripcion_materias?id="+response;
          });
        }else if(response == 1){
          swal({
            title: 'Ooops !',
            text: 'Error! Ya llego al limite de inscripcion',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }else{
          swal({
            title: 'Ooops !',
            text: 'Error! Ocurrio un error al intentar eliminar la materia',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}
