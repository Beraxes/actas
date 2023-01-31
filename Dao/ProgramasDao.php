<?php
require_once "../conexion/conexion.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$programa = (isset($_POST['programa'])) ? $_POST['programa'] : '';
$facultad = (isset($_POST['facultad'])) ? $_POST['facultad'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_programas = (isset($_POST['id_programas'])) ? $_POST['id_programas'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO programas 
        (programa, facultad) VALUES('$programa', '$facultad')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM programas ORDER BY id_programas DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE programas 
        SET programa = '$programa', facultad='$facultad'   
        WHERE id_programas='$id_programas' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM programas WHERE id_programas='$id_programas' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM programas WHERE id_programas='$id_programas' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
     $consulta = "SELECT p.id_programas, p.programa, f.facultad FROM programas p
     INNER JOIN facultades f ON id_facultades = p.facultad";
       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;