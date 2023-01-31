$(document).ready(function() {
var id_programas, opcion;
opcion = 4;
    
tablaProgramas = $('#tablaProgramas').DataTable({  
    "ajax":{            
        "url": "Dao/ProgramasDao.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id_programas"},
        {"data": "programa"},
        {"data": "facultad"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     


var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formPrograma').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    programa = $.trim($('#programa').val());
    facultad = $.trim($('#facultad').val());                             
        $.ajax({
          url: "Dao/ProgramasDao.php",
          type: "POST",
          datatype:"json",    
          data:  {id_programas:id_programas, programa:programa, facultad:facultad, opcion:opcion},    
          success: function(data) {
            tablaProgramas.ajax.reload(null, false);
           }
        });                 
    $('#modalCRUD').modal('hide');                                                          
});


        
         
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id_programas=null;
    $("#formPrograma").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Registro Programas");
    $('#modalCRUD').modal('show');      
});

//Editar        
$(document).on("click", ".btnEditar", function(){               
    opcion = 2;//editar
    fila = $(this).closest("tr");           
    id_programas = parseInt(fila.find('td:eq(0)').text()); //capturo el ID                   
    programa = fila.find('td:eq(1)').text();
    facultad = fila.find('td:eq(2)').text();
     $("#programa").val(programa);    
    $("#facultad").val(facultad);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Programa");       
    $('#modalCRUD').modal('show');         
});





//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id_programas = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;   
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+id_programas+"?");                
    if (respuesta) {            
        $.ajax({
          url: "Dao/ProgramasDao.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id_programas:id_programas},    
          success: function() {
              tablaProgramas.row(fila.parents('tr')).remove().draw();                  
           }
        }); 
    }
 });  
});  

  