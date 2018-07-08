function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function load_pensum(id){
  $.ajax({
    url: 'Datos_pensum/cargar_pensum',
    type: "POST",
    data: {id:id},
    beforeSend: function(){
      $('#pensum').show();
      $('#pensum').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#pensum').html(response);
    }
  });
}

function registrar(id){
  $.ajax({
    type: "POST",
    data: {id:id},
    url: 'Datos_pensum/agregar_pensum',
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
    url: 'Datos_pensum/editar_pensum',
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

function eliminar_pensum(id,id_pensum){
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
      url: 'Datos_pensum/eliminar_pensum',
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
            text: 'Materia Desactivado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_pensum(id_pensum);
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

function activar_pensum(id,id_pensum){
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
      url: 'Datos_pensum/activar_pensum',
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
            load_pensum(id_pensum);
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

function guardar_materia(idp){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de una materia al pensum?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Agregar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Datos_pensum/guardar_pensum',
      type: "POST",
      data: {id:$("#id").val(),correlativo:$("#correlativo").val(),materia:$("#materia").val(),num_ciclo:$("#num_ciclo").val(),prerequisito:$("#prerequisito").val(),unidades_valorativas:$("#unidades_valorativas").val()},
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
            text: 'Materia Agregada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            load_pensum(idp);
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
            text: 'Error al guardar la materia al pensum!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function editar(idpensum){
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
      url: 'Datos_pensum/editar',
      type: "POST",
      data: {id_det:$("#id_det").val(),id:$("#id").val(),correlativo:$("#correlativo").val(),materia:$("#materia").val(),num_ciclo:$("#num_ciclo").val(),prerequisito:$("#prerequisito").val(),unidades_valorativas:$("#unidades_valorativas").val()},
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
            load_pensum(idpensum);
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
