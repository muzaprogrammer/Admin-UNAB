
function nombre_completo() {
  var nombre = $("#nombre").val();
  var apellido = $("#apellido").val();
  $("#nom_completo").val(nombre+" "+apellido);
}

function correo() {
  var carnet = $("#carnet").val();
  carnet = carnet.replace(/-/gi,"");
  $("#email").val(carnet+"@mail.utec.edu.sv");
  $("#user").val(carnet);
}

function calcular_edad() {
  var fecha = $("#fecha_nac").val();
  var pass = fecha;
  pass = fecha.replace(/-/gi,"");
  $("#pass").val(pass);
  $.ajax({
    url: 'Nuevo_alumno/calcular_edad',
    type: "POST",
    data: {fecha:fecha},
    success: function (response) {
      $("#edad").val(response);
    }
  });
}

function load_sexo(){
  $.ajax({
    url: 'Nuevo_alumno/load_sexo',
    type: "POST",
    success: function (response) {
      $('#sexo').append(response);
    }
  });
}

function load_pensum(){
  $.ajax({
    url: 'Nuevo_alumno/load_pensum',
    type: "POST",
    success: function (response) {
      $('#pensum').append(response);
    }
  });
}

function posee_smartphone(id){
  if(id==1){
    $('#tiposmartphone').attr('readonly',false);
  }else{
    $('#tiposmartphone').attr('readonly',true);
    load_tipo_smartphone();
  }
}

function load_compania(){
  $.ajax({
    url: 'Nuevo_alumno/load_compania',
    type: "POST",
    success: function (response) {
      $('#compania').append(response);
    }
  });
}

function load_tipo_smartphone(){
  $("#tiposmartphone").find('option').remove().end();
  $.ajax({
    url: 'Nuevo_alumno/load_tipo_smartphone',
    type: "POST",
    success: function (response) {
      $('#tiposmartphone').append(response);
    }
  });
}

function load_estado_civil(){
  $.ajax({
    url: 'Nuevo_alumno/load_estado_civil',
    type: "POST",
    success: function (response) {
      $('#estado_civil').append(response);
    }
  });
}

function load_departamentos(){
  $.ajax({
    url: 'Nuevo_alumno/load_departamentos',
    type: "POST",
    success: function (response) {
      $('#departamento').append(response);
    }
  });
}

$("#departamento").on('change',function(){
  $.ajax({
    url: 'Nuevo_alumno/load_municipios',
    type: "POST",
    data: {departamento:this.value},
    success: function (response) {
      $('#municipio').html(response);
    }
  });
});

function registrar(){

  if($("#carnet").val() == ""){ swal("No has ingresado el carnet!");}
  else if($("#nombre").val() == ""){swal("No has ingresado los nombres!");}
  else if($("#apellido").val() == ""){swal("No has ingresado los apellidos!");}
  else if($("#sexo").val() == ""){swal("No has seleccionado el sexo!");}
  else if($("#pensum").val() == ""){swal("No has seleccionado la carrera!");}
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
      confirmButtonText: 'Si, Registrar!',
      cancelButtonText: 'Cancelar'
    }).then(function () {
      var datos = $("#form-alumno").serialize();
      $.ajax({
        url: 'Nuevo_alumno/guardar_alumno',
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
          if(response > 0){
            swal({
              title: 'Exito!<br> Alumno registrado!',
              text: '¿Deseas agregar una fotografia al expediente?',
              type: 'success',
              showCancelButton: true,
              confirmButtonColor: '#4fb7fe',
              cancelButtonColor: '#EF6F6C',
              allowOutsideClick: false,
              confirmButtonText: 'Si, Tomar foto!',
              cancelButtonText: 'Solo salir'
            }).then( function() {
              cargar_modal(response);
            },
            function (dismiss) {
              if (dismiss === 'cancel') {
                window.location.replace("Buscar_alumno");
              }
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

function cargar_modal(id){
  $('#button_foto').button('toggle').addClass('fat');
$.ajax({
  data: {id:id},
  url: 'Nuevo_alumno/cargar_modal_foto',
  type: "POST",
  success: function (response) {
    $('#modalcontent').html(response);
    $('#modalcontent').modal({backdrop: 'static', keyboard: false});
    $('#modalcontent').modal('show');
  }
  });
}


function regresar(){
  window.location.replace("Buscar_alumno");
}
