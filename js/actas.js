$(document).ready(function() {
var id_actas, opcion;
opcion = 4;
    
tablaActas = $('#tablaActas').DataTable({  
    "ajax":{            
        "url": "Dao/ActasDao.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id_actas"},
        {"data": "fecha_inicio"},
        {"data": "fecha_finalizacion"},
        {"data": "hora_inicio"},
        {"data": "hora_finalizacion"},
        {"data": "asunto"},
        {"data": "descripcion"},
        {"data": "asistente"},
     {   "data": null,
        render: function(data){
        return "<div class='text-center'><div class='btn-group'><button class='btn btn-success' onclick=location.href='asistencia.php?id_actas="+data['id_actas']+"'>Asistencia</button><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button><button class='btn btn-warning' onclick=location.href='lista_asistentes.php?id_actas="+data['id_actas']+"'>Info</button></div></div>"

             },
            
            }
    ]
});     



var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formActas').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    fecha_inicio = $.trim($('#fecha_inicio').val());
    fecha_finalizacion = $.trim($('#fecha_finalizacion').val());
    hora_inicio = $.trim($('#hora_inicio').val());
    hora_finalizacion = $.trim($('#hora_finalizacion').val());
    asunto = $.trim($('#asunto').val());
    descripcion = $.trim($('#descripcion').val());                             
        $.ajax({
          url: "Dao/ActasDao.php",
          type: "POST",
          datatype:"json",    
          data:  {id_actas:id_actas, fecha_inicio:fecha_inicio, fecha_finalizacion:fecha_finalizacion, hora_inicio:hora_inicio, hora_finalizacion:hora_finalizacion, asunto:asunto, descripcion:descripcion, opcion:opcion},    
          success: function(data) {
            tablaActas.ajax.reload(null, false);
           }
        });                 
    $('#modalCRUD').modal('hide');                                                          
});


        
         
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id_actas=null;
    $("#formActas").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Registro Actas");
    $('#modalCRUD').modal('show');      
});

//Editar        
$(document).on("click", ".btnEditar", function(){               
    opcion = 2;//editar
    fila = $(this).closest("tr");           
    id_actas = parseInt(fila.find('td:eq(0)').text()); //capturo el ID                   
    fecha_inicio = fila.find('td:eq(1)').text();
    fecha_finalizacion = fila.find('td:eq(2)').text();
    hora_inicio = fila.find('td:eq(3)').text();
    hora_finalizacion = fila.find('td:eq(4)').text();
    asunto = fila.find('td:eq(5)').text();
    descripcion = fila.find('td:eq(6)').text();
    $("#fecha_inicio").val(fecha_inicio);
    $("#fecha_finalizacion").val(fecha_finalizacion);
    $("#hora_inicio").val(hora_inicio);
    $("#hora_finalizacion").val(hora_finalizacion);
    $("#asunto").val(asunto);
    $("#descripcion").val(descripcion);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Usuario");       
    $('#modalCRUD').modal('show');         
});





//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id_actas = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+id_actas+"?");                
    if (respuesta) {            
        $.ajax({
          url: "Dao/ActasDao.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id_actas:id_actas},    
          success: function() {
              tablaActas.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });  
});  

  