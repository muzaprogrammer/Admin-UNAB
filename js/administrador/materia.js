function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function load_materias(){
  $.ajax({
    url: 'Materias/cargar_materias',
    type: "POST",
    beforeSend: function(){
      $('#materias').show();
      $('#materias').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#materias').html(response);
    }
  });
}

function registrar(){
  $.ajax({
    url: 'Materias/agregar_materia',
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

function editar_materia(id){
  $.ajax({
    url: 'Materias/editar_materia',
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

function cerrar_modal(){
  $('#div_modal').modal('hide');
}

function eliminar_materia(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de desactivar la materia?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Desactivar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Materias/eliminar_materia',
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
            text: 'Materia Desactivada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_materias();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al desactivar la materia!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function activar_materia(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de activar la materia?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Activar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Materias/activar_materia',
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
            text: 'Materia Activada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_materias();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al activar la materia!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function guardar(){
  var codigo = $("#codigo").val();
  var materia = $("#materia").val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de guardar la materia?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Agregar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Materias/guardar_materia',
      type: "POST",
      data: {codigo:codigo,materia:materia},
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
            text: 'Materia Guardada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            load_materias();
          });
        }else if(response==2){
          swal({
            title: 'Ooops !',
            text: 'Error! La materia que intento guardar ya existe en la base de datos',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al guardar la materia!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function editar(id){
  var codigo = $("#codigo").val();
  var materia = $("#materia").val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de editar la materia?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Editar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Materias/editar',
      type: "POST",
      data: {id:id,codigo:codigo,materia:materia},
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
            text: 'Materia Editada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            load_materias();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al editar la materia!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}
