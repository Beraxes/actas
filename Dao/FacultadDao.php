<?php
require_once "../conexion/conexion.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$facultad = (isset($_POST['facultad'])) ? $_POST['facultad'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_facultades = (isset($_POST['id_facultades'])) ? $_POST['id_facultades'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO facultades 
        (facultad) VALUES('$facultad')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM facultades ORDER BY id_facultades DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE facultades 
        SET facultad='$facultad' 
        WHERE id_facultades='$id_facultades' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM facultades WHERE id_facultades='$id_facultades' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM facultades WHERE id_facultades='$id_facultades' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM facultades";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;