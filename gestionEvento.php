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
		$stmt->bindParam(':oid_c', $evento["oid_c"]);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return false;
    }
}

function listaOidPorOidU($conexion,$oidu){
        $consulta = "SELECT OID_C FROM CALENDARIOS WHERE OID_U=:oidu";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(":oidu", $oidu);
        $stmt->execute();
        return $stmt->fetchAll();
	}

function getNombrePorOidU($conexion,$oidc){
        $consulta = "SELECT NOMBRE FROM CALENDARIOS WHERE OID_C=:oidc";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(":oidc", $oidc);
        $stmt->execute();
        return $stmt->fetchColumn();
	}

  
function consultarEvento($conexion,$evento) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE HORAINICIO=:horainicio AND HORAFIN=:horafin AND NOMBRE=:nombre  AND FECHA=:fecha AND DESCRIPCION=:descripcion AND OID_C=:oid_c";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':horainicio',$evento["horainicio"]);
	$stmt->bindParam(':horafin',$evento["horafin"]);
	$stmt->bindParam(':nombre',$evento["nombre"]);
	$stmt->bindParam(':fecha',$evento["fecha"]);
	$stmt->bindParam(':descripcion',$evento["descripcion"]);
	$stmt->bindParam(':oid_c', $evento["oid_c"]);
	$stmt->execute();
	return $stmt->fetchColumn();
}

function modificaEvento($conexion,$evento) {
	try {
		$consulta = "CALL MODIFICA_EVENTO(:nombre, :horainicio, :horafin,:fecha, :descripcion, :oid_c)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':nombre',$evento["nombre"]);
		$stmt->bindParam(':horainicio',$evento["horainicio"]);
		$stmt->bindParam(':horafin',$evento["horafin"]);
		$stmt->bindParam(':fecha',$evento["fecha"]);
		$stmt->bindParam(':descripcion',$evento["descripcion"]);
		$stmt->bindParam(':oid_c', $evento["oid_c"]);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return false;
    }
}


	?>