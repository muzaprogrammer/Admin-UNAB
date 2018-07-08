function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function load_secciones(){
  $.ajax({
    url: 'Secciones/cargar_secciones',
    type: "POST",
    beforeSend: function(){
      $('#secciones').show();
      $('#secciones').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#secciones').html(response);
    }
  });
}

function registrar(){
  $.ajax({
    url: 'Secciones/agregar_seccion',
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

function editar_seccion(id){
  $.ajax({
    url: 'Secciones/editar_seccion',
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

function activar_seccion(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de activar la seccion?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Activar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Secciones/activar_seccion',
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
            text: 'Seccion Activada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_secciones();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al activar la seccion!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}


function eliminar_seccion(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de eliminar la seccion?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Eliminar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Secciones/eliminar_seccion',
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
            text: 'Seccion Eliminada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_secciones();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al eliminar la seccion!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function guardar(){
  if($("#materia").val() == ""){swal("No has seleccionado la materia!");}
  else if($("#aula").val() == ""){swal("No has ingresado el aula!");}
  else if($("#cant_a").val() == ""){swal("No has ingresado la cantidad de alumnos!");}
	else if($("#desde").val() == ""){swal("No has ingresado la hora inicial!");}
  else if($("#hasta").val() == ""){swal("No has ingresado la hora final nit!");}
  else{
    swal({
      title: '¿Estas seguro?',
      text: '¿Estas a punto de guardar la seccion?',
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#4fb7fe',
      cancelButtonColor: '#EF6F6C',
      allowOutsideClick: false,
      confirmButtonText: 'Si, Agregar!',
      cancelButtonText: 'Cancelar'
    }).then(function () {
      var datos = $("#form_secciones").serialize();
      $.ajax({
        url: 'Secciones/guardar_seccion',
        type: "POST",
        data: datos,
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
              text: 'Seccion Guardada!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then( function() {
              cerrar_modal();
              load_secciones();
            });
          }else if(response==2){
            swal({
              title: 'Ooops !',
              text: 'Error! La seccion que intento guardar ya existe en la base de datos',
              type: 'error',
              confirmButtonColor: '#ff9933'
            }).then( function() {  });
          }else {
            swal({
              title: 'Ooops !',
              text: 'Error al guardar la seccion!',
              type: 'error',
              confirmButtonColor: '#ff9933'
            }).then( function() {  });
          }
        }
      });
    });
  }
}

function actualizar(){
  if($("#materia").val() == ""){swal("No has seleccionado la materia!");}
  else if($("#aula").val() == ""){swal("No has ingresado el aula!");}
  else if($("#cant_a").val() == ""){swal("No has ingresado la cantidad de alumnos!");}
	else if($("#desde").val() == ""){swal("No has ingresado la hora inicial!");}
  else if($("#hasta").val() == ""){swal("No has ingresado la hora final nit!");}
  else{
    swal({
      title: '¿Estas seguro?',
      text: '¿Estas a punto de actualizar la seccion?',
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#4fb7fe',
      cancelButtonColor: '#EF6F6C',
      allowOutsideClick: false,
      confirmButtonText: 'Si, Agregar!',
      cancelButtonText: 'Cancelar'
    }).then(function () {
      var datos = $("#form_secciones").serialize();
      $.ajax({
        url: 'Secciones/actualizar_seccion',
        type: "POST",
        data: datos,
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
              text: 'Seccion Actualizada!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then( function() {
              cerrar_modal();
              load_secciones();
            });
          }else if(response==2){
            swal({
              title: 'Ooops !',
              text: 'Error! La seccion que intento actualizar ya existe en la base de datos',
              type: 'error',
              confirmButtonColor: '#ff9933'
            }).then( function() {  });
          }else {
            swal({
              title: 'Ooops !',
              text: 'Error al actualizar la seccion!',
              type: 'error',
              confirmButtonColor: '#ff9933'
            }).then( function() {  });
          }
        }
      });
    });
  }
}
