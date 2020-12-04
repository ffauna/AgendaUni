<?php
 function alta_usuario($conexion, $usuario) {
	try {
		$consulta = "CALL INSERTAR_USUARIO(:nombre, :ape, :uvus, :pass)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':nombre',$usuario["nombre"]);
		$stmt->bindParam(':ape',$usuario["apellidos"]);
		$stmt->bindParam(':uvus',$usuario["uvus"]);
		$stmt->bindParam(':pass',$usuario["pass"]);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return false;
    }
}
  
function consultarUsuario($conexion,$uvus,$pass) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE UVUS=:uvus AND PASS=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':uvus',$uvus);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetchColumn();
}

function getNombreUsuario ($conexion, $uvus, $pass){
     $consulta = "SELECT NOMBRE FROM USUARIO WHERE UVUS=:uvus AND PASS=:pass";
     $stmt = $conexion -> prepare($consulta);
     $stmt->bindParam (':uvus',$uvus);
     $stmt->bindParam (':pass',$pass);
     $stmt->execute();
     return $stmt->fetchColum();
}

function getOIDUsuario($conexion, $uvus){
     $consulta = "SELECT OID_U FROM USUARIOS WHERE UVUS=:uvus";
     $stmt = $conexion->prepare($consulta);
     $stmt->bindParam(':uvus',$uvus);
     $stmt->execute();
     return $stmt->fetchColumn();
}
?>