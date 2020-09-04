<?php
 function nuevo_evento($conexion,$evento) {
	try {
		$consulta = "CALL INSERTAR_EVENTO(:oid_e:nombre,:latitud,:longitud, :fecha, :horainicio, :horafin,:tipoevento,:diacompleto,:descripcion)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':oid_e',$evento["oid_e"]);
		$stmt->bindParam(':nombre',$evento["nombre"]);
		$stmt->bindParam(':latitud',$evento["latitud"]);
		$stmt->bindParam(':longitud',$evento["longitud"]);
		$stmt->bindParam(':fecha',$evento["fecha"]);
		$stmt->bindParam(':horainicio',$evento["horainicio"]);
		$stmt->bindParam(':horafin',$evento["horafin"]);
		$stmt->bindParam(':tipoevento',$evento["tipoevento"]);
		$stmt->bindParam(':diacompleto',$evento["diacompleto"]);
		$stmt->bindParam(':descripcion',$evento["descripcion"]);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return false;
    }
}


  
function consultarEvento($conexion,$horainicio,$horafin,$nombre,$fecha) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE HORAINICIO=:horainicio AND HORAFIN=:horafin AND NOMBRE=:nombre ";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':horainicio',$horainicio);
	$stmt->bindParam(':horafin',$horafin);
	$stmt->bindParam(':nombre',$nombre);
	$stmt->execute();
	return $stmt->fetchColumn();
}

function modifica_evento($conexion,$evento) {
	try {
		$consulta = "CALL MODIFICA_EVENTO(:nombre,:latitud,:longitud, :fechainicio, :fechafin,:tipoevento,:diacompleto,:descripcion)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':nombre',$evento["nombre"]);
		$stmt->bindParam(':latitud',$evento["latitud"]);
		$stmt->bindParam(':longitud',$evento["longitud"]);
		$stmt->bindParam(':fechainicio',$evento["fechainicio"]);
		$stmt->bindParam(':horafin',$evento["horafin"]);
		$stmt->bindParam(':tipoevento',$evento["tipoevento"]);
		$stmt->bindParam(':diacompleto',$evento["diacompleto"]);
		$stmt->bindParam(':descripcion',$evento["descripcion"]);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return false;
    }
}

function EliminarEvento($conexion,$horainicio,$horafin,$nombre,$fecha) {
 	$delete = "DELETE FROM EVENTOS WHERE HORAINICIO=:horainicio AND HORAFIN=:horafin AND NOMBRE=:nombre AND FECHA=:fecha";
	$stmt = $conexion->prepare($delete);
	$stmt->bindParam(':horainicio',$horainicio);
	$stmt->bindParam(':horafin',$horafin);
	$stmt->bindParam(':nombre',$nombre);
	$stmt->bindParam(':fecha',$fecha);
	$stmt->execute();
	return true;

}