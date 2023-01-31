<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'actas_unicor';

$conection = @mysqli_connect($host,$user,$password,$db);



if(!$conection){
    echo "ERROR EN LA CONEXION";
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Asistencia</title>
	
      

	    <link rel="stylesheet" href="css/asistencia.css">  
	     <?php 
       include ("includes/nav.php")
        ?>
    
</head>
<body>

<section id ="container">
	<div class="title_page">
		<h1 ><i class="fas fa-user-check"></i>Asitencia</h1>
		
	</div>

<div class="datos_asistente">
<div class="action_asistente">
<h4>Datos del Asistente</h4>
<a href="#" class="btn_new btn_new_asistente"><i class="fas fa-plus"></i> Nuevo Asistente</a>
</div>

<form name="form_new_asistente" id="form_new_asistente" class="datos" >
	<input type="hidden" name="action" value="addAsistente">
	<input type="hidden" id="idasistente" name="idasistente" value="" required>
		<div class="wd30">
		<label>Identificacion</label>
		<input type="text" name="identificacion" id="identificacion">
	</div>
	<div class="wd30">
		<label>Nombre</label>
		<input type="text" name="nom_asistente" id="nom_asistente" disabled required>
	</div>
	<div class="wd30">
		<label>Telefono</label>
		<input type="number" name="tel_asistente" id="tel_asistente" disabled required>
	</div>
	<div class="wd100">
		<label>correo</label>
		<input type="text" name="correo_asistente" id="correo_asistente" disabled required>
	</div>
<div id="div_registro_asistente" class="wd100">
	<button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i> Guardar</button>
		
	</div>


</form>

<?php 
$id_actas=$_GET['id_actas'];
$sql=mysqli_query($conection,"SELECT * FROM actas WHERE id_actas = $id_actas");

 $result_sql=mysqli_num_rows($sql);
 
 if ($result_sql > 0){
        $data = mysqli_fetch_assoc($sql);


    }else{
        echo "ERROR";
    }

 ?>
<div class="datos_venta">
	<br>
	<h4>DATOS DEL ACTA</h4>
	<div class="datos">
	<div class="wd50">
		<input type="hidden" id="id_actas" name="id_actas" value="<?php echo $_GET['id_actas']; ?>">
		<label>Asunto</label>
		<input type="text" name="acta" id="acta" placeholder="Acta" value="<?php echo $data['asunto']; ?>" disabled>
	</div>	
	<div class="wd100">
		<label>Descripcion</label>
		<input type="text" name="acta" id="acta" placeholder="Acta" value="<?php echo $data['descripcion']; ?>" disabled>
	</div>	
	<div class="wd100">
	<a href="#" class="btn_new textcenter" id="btn_guardar_asistencia" ><i class="far fa-save fa-lg"></i> Guardar</a>
	</div>
	</div>
</div>

</div>

</section>
 <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    
   

    <script type="text/javascript" src="js/functions.js"></script>  
    
</body>
</html>