function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function load_facultades(){
  $.ajax({
    url: 'Facultades/cargar_facultades',
    type: "POST",
    beforeSend: function(){
      $('#facultades').show();
      $('#facultades').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#facultades').html(response);
    }
  });
}

function registrar(){
  $.ajax({
    url: 'Facultades/agregar_facultad',
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

function editar_facultad(id,facultad){
  $.ajax({
    url: 'Facultades/editar_facultad',
    type: "POST",
    data: {id:id,facultad:facultad},
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

function cerrar_modal(){
  $('#div_modal').modal('hide');
}

function eliminar_facultad(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de desactivar la facultad?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Desactivar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Facultades/eliminar_facultad',
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
        if(response == 0){
          swal({
            title: 'Exito!',
            text: 'Facultad Desactivada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_facultades();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al desactivar la facultad!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function activar_facultad(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de activar la facultad?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Activar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Facultades/activar_facultad',
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
        if(response == 0){
          swal({
            title: 'Exito!',
            text: 'Facultad Activada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_facultades();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al activar la facultad!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function guardar(){
  var facultad = $("#facultad").val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de guardar la facultad?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Agregar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Facultades/guardar_facultad',
      type: "POST",
      data: {facultad:facultad},
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
            text: 'Facultad Guardada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            load_facultades();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al guardar la facultad!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function editar(id){
  var facultad = $("#facultad").val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de editar la facultad?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Activar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Facultades/editar',
      type: "POST",
      data: {id:id,facultad:facultad},
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
            text: 'Facultad Editada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            load_facultades();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al editar la facultad!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}
