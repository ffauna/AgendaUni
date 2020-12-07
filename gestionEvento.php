<?php
 function nuevoEvento($conexion,$evento) {
	try {
		$consulta = "CALL INSERTAR_EVENTO(:fecha, :horainicio,:horafin,:descripcion)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':nombre',$evento["nombre"]);
		$stmt->bindParam(':fecha',$evento["fecha"]);
		$stmt->bindParam(':horainicio',$evento["horainicio"]);
		$stmt->bindParam(':horafin',$evento["horafin"]);
		$stmt->bindParam(':descripcion',$evento["descripcion"]);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return false;
    }
}


  
function consultarEvento($conexion,$evento) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE HORAINICIO=:horainicio AND HORAFIN=:horafin AND NOMBRE=:nombre  AND FECHA=:fecha AND DESCRIPCION=:descripcion";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':horainicio',$evento["horainicio"]);
	$stmt->bindParam(':horafin',$evento["horafin"]);
	$stmt->bindParam(':nombre',$evento["nombre"]);
	$stmt->bindParam(':fecha',$evento["fecha"]);
	$stmt->bindParam(':descripcion',$evento["descripcion"]);
	
	$stmt->execute();
	return $stmt->fetchColumn();
}

function modificaEvento($conexion,$evento) {
	try {
		$consulta = "CALL MODIFICA_EVENTO(:nombre, :horainicio, :horafin,:descripcion)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':nombre',$evento["nombre"]);
		$stmt->bindParam(':horainicio',$evento["horainicio"]);
		$stmt->bindParam(':horafin',$evento["horafin"]);
		$stmt->bindParam(':fecha',$evento["fecha"]);
		$stmt->bindParam(':descripcion',$evento["descripcion"]);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return false;
    }
}

function eliminaEvento($conexion,$evento) {
 	$delete = "DELETE FROM EVENTOS WHERE HORAINICIO=:horainicio AND HORAFIN=:horafin AND NOMBRE=:nombre  AND FECHA=:fecha AND DESCRIPCION=:descripcion";
	$stmt = $conexion->prepare($delete);
	$stmt->bindParam(':horainicio',$horainicio);
	$stmt->bindParam(':horafin',$horafin);
	$stmt->bindParam(':nombre',$nombre);
	$stmt->bindParam(':fecha',$fecha);
	$stmt->bindParam('descripcion',$descripcion);
	$stmt->execute();
	return true;

}