function cargar_alumnos(){
  var x = $('#alumno').val();
    if(x.length >=2){
    $.ajax({
      url: 'Buscar_alumno/cargar_alumnos',
      type: "POST",
      data: { datos:x },
      beforeSend: function(){
        $('#datos_alumnos').show();
        $('#datos_alumnos').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
      },
      success: function (response) {
        $('#datos_alumnos').html(response);
      }
    });
  }
}

function eliminar_alumno(id){
  swal({
    title: '¿Estas seguro?',
    text: 'Se dara de baja al alumno!',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Inactivarlo',
    cancelButtonText: 'Cancelar'
    }).then(function () {
      $.ajax({
        url: 'Datos_alumno/eliminar_alumno',
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
              text: 'Se inactivo al alumno!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then( function() {
              window.location.replace("Buscar_alumno");
            });
          }else {
            swal({
              title: 'Oops...',
              text: 'Hubo un error al eliminar el expediente, por favor intentelo de nuevo mas tarde!',
              type: 'error',
              confirmButtonColor: '#4fb7fe'
            }).done();
          }
        }
      });
    });
}
