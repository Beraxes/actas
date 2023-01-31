<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'actas_unicor';

$conection = @mysqli_connect($host,$user,$password,$db);



if(!$conection){
    echo "ERROR EN LA CONEXION";
}
//print_r($_POST); exit;
  
 
  if ($_POST['action'] == 'searchAsistente') {

   if (!empty($_POST['asistente'])) {
      $id_asistente = $_POST['asistente'];

       $query = mysqli_query($conection, "SELECT * FROM asistentes WHERE identificacion LIKE '$id_asistente'");
         $result = mysqli_num_rows($query);

      $data = '';
      if ($result > 0) {
        $data = mysqli_fetch_assoc($query);
      }else{
        $data = 0;
      }
      echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }
    exit;
  }

// Registrar Asistente
  
 if ($_POST['action'] == 'addAsistente') {
  
  $identificacion = $_POST['identificacion'];
  $nombre = $_POST['nom_asistente'];
  $telefono = $_POST['tel_asistente'];
  $correo = $_POST['correo_asistente'];

  $query_insert = mysqli_query($conection,"INSERT INTO asistentes(identificacion,nombre,telefono,correo)
    VALUES('$identificacion', '$nombre', '$telefono', '$correo')");
  if ($query_insert) {
  $codAsistente = mysqli_insert_id($conection);
  $msg = $codAsistente;
}else{
  $msg='error';
}
echo $msg;
exit;
}
 
 //Guardar asistencia

 if ($_POST['action'] == 'guardarasistencia') {

  $idasistente = $_POST['idasistente'];
 $acta = $_POST['id_actas'];
  

    $query = mysqli_query($conection,"SELECT * FROM asistencias WHERE asistente = '$idasistente' AND acta = '$acta'");
    
    $result = mysqli_fetch_array($query);

        if($result > 0){
      echo "existe";

    }else{

  $query_asistencia = mysqli_query($conection,"INSERT INTO asistencias(asistente,acta)
    VALUES('$idasistente','$acta')");
 
  if($query_asistencia){
                echo "OK";
            }else{
                echo "error";
            
        }
      }
     exit;
    }




  ?>

