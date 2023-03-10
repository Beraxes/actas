$(document).ready(function() {
var id_facultades, opcion;
opcion = 4;
    
tablaFacultades = $('#tablaFacultades').DataTable({  
    "ajax":{            
        "url": "Dao/FacultadDao.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id_facultades"},
        {"data": "facultad"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     



var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formFacultades').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    facultad = $.trim($('#facultad').val());                             
        $.ajax({
          url: "Dao/FacultadDao.php",
          type: "POST",
          datatype:"json",    
          data:  {id_facultades:id_facultades, facultad:facultad, opcion:opcion},    
          success: function(data) {
            tablaFacultades.ajax.reload(null, false);
           }
        });                 
    $('#modalCRUD').modal('hide');                                                          
});


        
         
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id_facultades=null;
    $("#formFacultades").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Registro Facultad");
    $('#modalCRUD').modal('show');      
});

//Editar        
$(document).on("click", ".btnEditar", function(){               
    opcion = 2;//editar
    fila = $(this).closest("tr");           
    id_facultades = parseInt(fila.find('td:eq(0)').text()); //capturo el ID                   
    facultad = fila.find('td:eq(1)').text();
    $("#facultad").val(facultad);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Facultad");       
    $('#modalCRUD').modal('show');         
});





//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id_facultades = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+id_facultades+"?");                
    if (respuesta) {            
        $.ajax({
          url: "Dao/FacultadDao.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id_facultades:id_facultades},    
          success: function() {
              tablaFacultades.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });  
});  

  