function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function load_pensum(){
  $.ajax({
    url: 'Pensum/cargar_pensum',
    type: "POST",
    beforeSend: function(){
      $('#pensum').show();
      $('#pensum').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#pensum').html(response);
    }
  });
}

function registrar(){
  $.ajax({
    url: 'Pensum/agregar_pensum',
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

function editar_pensum(id){
  $.ajax({
    url: 'Pensum/editar_pensum',
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

function eliminar_pensum(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de desactivar el pensum?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Desactivar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Pensum/eliminar_pensum',
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
            text: 'Pensum Desactivado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_pensum();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al desactivar el pensum!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function activar_pensum(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de activar el pensum?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Activar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Pensum/activar_pensum',
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
            text: 'Pensum Activado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_pensum();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al activar el pensum!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function guardar(){
  var carrera = $("#carrera").val();
  var nombre = $("#nombre").val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de guardar el pensum?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Agregar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Pensum/guardar_pensum',
      type: "POST",
      data: {carrera:carrera,nombre:nombre},
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
            text: 'Pensum Guardado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            load_pensum();
          });
        }else if(response==2){
          swal({
            title: 'Ooops !',
            text: 'Error! El pensum que intento guardar ya existe en la base de datos',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al guardar El pensum!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function editar(){
  var carrera = $("#carrera").val();
  var id = $("#id").val();
  var nombre = $("#nombre").val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de editar el pensum?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Editar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Pensum/editar',
      type: "POST",
      data: {id:id,carrera:carrera,nombre:nombre},
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
            text: 'Pensum Editado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            load_pensum();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al editar el pensum!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}
