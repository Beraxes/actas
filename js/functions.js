$(document).ready(function() {

    
//Activa campos para registrar cliente
$('.btn_new_asistente').click(function(e){
  e.preventDefault();
  $('#nom_asistente').removeAttr('disabled');
  $('#tel_asistente').removeAttr('disabled');
  $('#correo_asistente').removeAttr('disabled');

  $('#div_registro_asistente').slideDown();
});

//buscar Asistente
$('#identificacion').keyup(function(e){
  e.preventDefault();
  var ast = $(this).val();
  var action = 'searchAsistente';

$.ajax({
  url: "ajax/ajax.php",
  type: "POST",
  async: true,
  data: {action:action,asistente:ast},
  success: function(response){
    
    
  if(response == 0) {
  $('#idasistente').val('');
  $('#nom_asistente').val('');
  $('#tel_asistente').val('');
  $('#correo_asistente').val('');
  //Mostra boton agregar
  $('.btn_new_asistente').slideDown();
  }else{
    var data = $.parseJSON(response);
    $('#idasistente').val(data.id);
    $('#nom_asistente').val(data.nombre);
    $('#tel_asistente').val(data.telefono);
    $('#correo_asistente').val(data.correo);
//Ocultar boton agregar
$('.btn_new_asistente').slideUp();

  //Bloque campos
  $('#nom_asistente').attr('disabled','disabled');
  $('#tel_asistente').attr('disabled','disabled');
  $('#correo_asistente').attr('disabled','disabled');

//Ocultar boton guardar
$('#div_registro_cliente').slideUp();
}


  },
  error: function(error){

  }
});

});

//CREAR ASISTENTE
$('#form_new_asistente').submit(function(e){
    e.preventDefault();
   $.ajax({
  url: "ajax/ajax.php",
  type: "POST",
  async: true,
  data: $('#form_new_asistente').serialize(),
  
  success: function(response){
    
     //agregar id a input hidden  
if (response != 'error') {
  $('#idasistente').val(response);
  //Bloque campos
 $('#nom_asistente').attr('disabled','disabled');
  $('#tel_asistente').attr('disabled','disabled');
  $('#correo_asistente').attr('disabled','disabled');

  //Ocultar boton agregar
$('.btn_new_asistente').slideUp();
//Ocultar boton guardar
$('#div_registro_asistente').slideUp();
}

  },
  error: function(error){

  }
});
 
})

//Guardar asistencia
$('#btn_guardar_asistencia').click(function(e){
  e.preventDefault();
var action = 'guardarasistencia';
var idasistente = $('#idasistente').val();
var id_actas = $('#id_actas').val();

    $.ajax({
  url: 'ajax/ajax.php',
  type: "POST",
  async: true,
  data: {action:action,id_actas:id_actas,idasistente:idasistente},
  success: function(response)
  {
  
if (response == 'existe') {

alert("El asistente ya está registrado en esa acta");
}else if (response == 'OK'){
alert("Asistencia Guardada correctamente");   
}else{
alert("Error al guardar la Asistencia");  
}
  

},
 error: function(error){
  }
});

});


}); //End Ready
