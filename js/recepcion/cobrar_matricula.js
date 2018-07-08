function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function load_cobros(){
  $.ajax({
    url: 'Cobrar_matricula/load_cobros',
    type: "POST",
    beforeSend: function(){
      $('#cobros').show();
      $('#cobros').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#cobros').html(response);
    }
  });
}

function load_cobros_solicitudes(){
  $.ajax({
    url: 'Cobrar_solicitud/load_cobros',
    type: "POST",
    beforeSend: function(){
      $('#cobros_solicitud').show();
      $('#cobros_solicitud').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#cobros_solicitud').html(response);
    }
  });
}

function cobrar(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de realizar este cobro?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Cobrar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Cobrar_matricula/cobrar',
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
            text: 'Cobro Realizado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_cobros();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al cobrar!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function cobrar_solicitud(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de realizar este cobro?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Cobrar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Cobrar_solicitud/cobrar',
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
            text: 'Cobro Realizado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            load_cobros_solicitudes();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al cobrar!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}
