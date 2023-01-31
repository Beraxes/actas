<?php
require_once "../conexion/conexion.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$fecha_inicio = (isset($_POST['fecha_inicio'])) ? $_POST['fecha_inicio'] : '';
$fecha_finalizacion = (isset($_POST['fecha_finalizacion'])) ? $_POST['fecha_finalizacion'] : '';
$hora_inicio = (isset($_POST['hora_inicio'])) ? $_POST['hora_inicio'] : '';
$hora_finalizacion = (isset($_POST['hora_finalizacion'])) ? $_POST['hora_finalizacion'] : '';
$asunto = (isset($_POST['asunto'])) ? $_POST['asunto'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_actas = (isset($_POST['id_actas'])) ? $_POST['id_actas'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO actas (fecha_inicio, fecha_finalizacion, hora_inicio, hora_finalizacion, asunto, descripcion) VALUES('$fecha_inicio', '$fecha_finalizacion', '$hora_inicio', '$hora_finalizacion', '$asunto', '$descripcion') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM actas ORDER BY id_actas DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE actas SET fecha_inicio='$fecha_inicio', fecha_finalizacion='$fecha_finalizacion', hora_inicio='$hora_inicio', hora_finalizacion='$hora_finalizacion', asunto='$asunto', descripcion='$descripcion' WHERE id_actas='$id_actas' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM actas WHERE id_actas='$id_actas' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM actas WHERE id_actas='$id_actas' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT a.id_actas, a.fecha_inicio, a.fecha_finalizacion, a.hora_inicio, a.hora_finalizacion, a.asunto, a.descripcion, count(s.asistente) as asistente FROM actas a 
            INNER JOIN asistencias s 
            WHERE s.acta = a.id_actas GROUP BY a.id_actas";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;