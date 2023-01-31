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
	<?php include "includes/scripts.php"?>
	<title>Lista de asistentes</title>
</head>
<body>
    <link rel="stylesheet" href="css/asistencia.css">  
       <?php 
       include ("includes/nav.php")
        ?>
	<section id="container">

		<h1><i class="fas fa-users fa-lg"></i> LISTA DE ASISTENTES POR ACTA </h1>
<?php

$id_actas=$_GET['id_actas'];

$query = mysqli_query($conection, "SELECT * FROM actas WHERE id_actas = $id_actas");



  while ($data2 = mysqli_fetch_array($query)) {
?>
<div class="datos_estudiante">
   
  <div class="datos">
  <div class="wd50">
    <label>Asunto Acta</label>
    <p><?php echo $data2 ["asunto"]; ?></p>
    
  </div>  
   <div class="wd50">
    <label>Descripcion Acta</label>
    <p><?php echo $data2 ["descripcion"]; ?></p>
  </div>  
   
  </div>
</div>

<?php   
  }


?>


<div class="containerTable">
<table>
<tr>

<th>ID</th>
<th>Nombre</th>
<th>Telefono</th>
<th>Correo</th>
</tr>
<?php
$query = mysqli_query($conection, "SELECT a.identificacion, a.nombre, a.telefono, a.correo FROM asistentes a 
INNER JOIN asistencias s ON s.asistente = a.id_asistente
INNER JOIN actas c ON c.id_actas = s.acta
WHERE s.acta = $id_actas");

$result = mysqli_num_rows($query);
if($result > 0){

  while ($data = mysqli_fetch_array($query)) {
    
?>
<tr>
<td><?php echo $data ["identificacion"]; ?></td>
<td><?php echo $data ["nombre"]; ?></td>
<td><?php echo $data ["telefono"]; ?></td>
<td><?php echo $data ["correo"]; ?></td>

</tr>

<?php   
  }
}
?>

</table>
</div>
	</section>
</body>
</html>