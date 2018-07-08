function calcular_edad() {
  var fecha = $("#fecha_nac").val();
  var pass = fecha;
  pass = fecha.replace(/-/gi,"");
  //$("#pass").val(pass);
  $.ajax({
    url: '../administrador/Nuevo_alumno/calcular_edad',
    type: "POST",
    data: {fecha:fecha},
    success: function (response) {
      $("#edad").val(response);
    }
  });
}

function correo() {
  var carnet = $("#carnet").val();
  carnet = carnet.replace(/-/gi,"");
  $("#email").val(carnet+"@mail.utec.edu.sv");
  //$("#user").val(carnet);
}

function nombre_completo() {
  var nombre = $("#nombre").val();
  var apellido = $("#apellido").val();
  $("#nom_completo").val(nombre+" "+apellido);
}

function posee_smartphone(id){
  if(id==1){
    $('#tiposmartphone').attr('readonly',false);
  }else{
    $('#tiposmartphone').attr('readonly',true);
    load_tipo_smartphone();
  }
}

function load_tipo_smartphone(){
  $("#tiposmartphone").find('option').remove().end();
  $.ajax({
    url: '../administrador/Nuevo_alumno/load_tipo_smartphone',
    type: "POST",
    success: function (response) {
      $('#tiposmartphone').append(response);
    }
  });
}

$("#departamento").on('change',function(){
  $.ajax({
    url: '../administrador/Nuevo_alumno/load_municipios',
    type: "POST",
    data: {departamento:this.value},
    success: function (response) {
      $('#municipio').html(response);
    }
  });
});

function cargar_modal(id){
  $('#button_foto').button('toggle').addClass('fat');
$.ajax({
  data: {id:id},
  url: '../administrador/Nuevo_alumno/cargar_modal_foto',
  type: "POST",
  success: function (response) {
    $('#modalcontent').html(response);
    $('#modalcontent').modal({backdrop: 'static', keyboard: false});
    $('#modalcontent').modal('show');
  }
  });
}

function disabled_form(){
  $('#form_alumno').find('input, textarea, select').attr('disabled','disabled');
}

function editar(){
  $('input[disabled="disabled"]').removeAttr("disabled");
  $('select[disabled="disabled"]').removeAttr("disabled");
  $('textarea[disabled="disabled"]').removeAttr("disabled");
  $("#editar").html('<i class="fa fa-check"></i> Actualizar');
  $("#cancelar").html('<i class="fa fa-ban"></i> Cancelar');
  document.getElementById('editar').onclick = function(){ actualizar_alumno(); };
  document.getElementById('cancelar').onclick = function(){ cancelar(); };
}

function cancelar(){
  $("#editar").html('<i class="fa fa-edit"></i> Editar');
  $("#cancelar").html('<i class="fa fa-mail-reply"></i> Regresar');
  document.getElementById('editar').onclick = function(){ editar(); };
  document.getElementById('cancelar').onclick = function(){ regresar(); };
  $('#form_alumno').find('input, textarea, select').attr('disabled','disabled');
}

function regresar(){
  window.location.replace("Index");
}

function actualizar_alumno(){

  if($("#carnet").val() == ""){ swal("No has ingresado el carnet!");}
  else if($("#nombre").val() == ""){swal("No has ingresado los nombres!");}
  else if($("#apellido").val() == ""){swal("No has ingresado los apellidos!");}
  else if($("#sexo").val() == ""){swal("No has seleccionado el sexo!");}
  else if($("#fecha_nac").val() == ""){swal("No has ingresado la fecha de nacimiento!");}
  else if($("#dui").val() == ""){swal("No has ingresado el dui!");}
	else if($("#nit").val() == ""){swal("No has ingresado el nit!");}
  else if($("#departamento").val() == ""){swal("No has seleccionado el departamento!");}
  else if($("#municipio").val() == ""){swal("No has seleccionado el municipio!");}
	else if($("#direccion").val() == ""){swal("No has ingresado la direccion!");}
  else if($("#tel_casa").val() == ""){swal("No has ingresado el telefono!");}
  else if($("#tel_celular").val() == ""){swal("No has ingresado el celular!");}
  else{
    swal({
      title: '¿Estas seguro?',
      text: '¿Todos los datos estan ingresados correctamente?',
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#4fb7fe',
      cancelButtonColor: '#EF6F6C',
      allowOutsideClick: false,
      confirmButtonText: 'Si, Actualizar!',
      cancelButtonText: 'Cancelar'
    }).then(function () {
      var datos = $("#form_alumno").serialize();
      $.ajax({
        url: 'Datos_alumno/actualizar_alumno',
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
              text: 'Alumno Actualizado!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then( function() {
              window.location.replace("Index");
            });
          }else {
            swal({
              title: 'Ooops !',
              text: 'Error al registrar al alumno!',
              type: 'error',
              confirmButtonColor: '#ff9933'
            }).then( function() {  });
          }
        }
      });
    });
  }
}
