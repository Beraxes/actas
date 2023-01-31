<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" href="img/Logo-uc.png" />  
    <title>Actas</title>
    
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="css/main.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"> 

       <?php 
       include ("includes/nav.php")
        ?>
  </head>
    
  <body> 
     <header>
     <h3 class='text-center'></h3>
     </header>    
      
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">library_add</i></button>    
            </div>    
        </div>    
    </div>    
    <br>  
 <h2 class="titulo">ACTAS</h2>
    <div class="container caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaActas" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th>Id Actas</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de finalizacion</th>
                            <th>Hora de inicio</th>
                            <th>Hora de finalizacion</th>
                            <th>Asunto</th>
                            <th>Descripcion</th>
                             <th>Asistentes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>   

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formActas">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <p>Fecha de inicio</p>
                    <input type="date" class="form-control" id="fecha_inicio" placeholder="Fecha de inicio">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                     <p>Fecha de finalizacion</p>
                    <input type="date" class="form-control" id="fecha_finalizacion" placeholder="Fecha de finalizacion">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Hora de inicio</label>
                    <input type="text" class="form-control" id="hora_inicio" placeholder="Hora de inicio">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Hora de finalizacion</label>
                    <input type="text" class="form-control" id="hora_finalizacion" placeholder="Hora de finalizacion">
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                        <label for="" class="col-form-label">Asunto</label>
                        <input type="text" class="form-control" id="asunto" placeholder="asunto">
                        </div>
                    </div>    
                     
                </div>    
                 <div class="row">  
                    <div class="col-lg-3">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Descripcion</label>
                         <p><textarea name="descripcion" id="descripcion" placeholder="Descipcion del acta"></textarea></p>
                        </div>            
                    </div>    
                </div>                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
  <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="js/actas.js"></script>  
    
    
  </body>
</html>
  