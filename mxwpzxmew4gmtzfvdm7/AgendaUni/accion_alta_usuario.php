<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarUsuarios.php");
		
	if (isset($_SESSION["form"])) {
		$nuevoUsuario = $_SESSION["form"];
		$_SESSION["form"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: form_nuevo_usuario.php");

	$conexion = crearConexionBD(); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>AgendaUni: Alta de Usuario con éxito</title>
</head>

<body>
	<?php
		include_once("cabecera.php");
	?>

	<main>
		<?php if (alta_usuario($conexion, $nuevoUsuario)) { 
				$_SESSION['login'] = $nuevoUsuario['uvus'];
		?>
				<h1>Hola <?php echo $nuevoUsuario["nombre"]; ?>, gracias por registrarte</h1>
				<div >	
			   		Pulsa <a href="login.php">aquí</a> para acceder a tu Calendario Personal.
				</div>
		<?php } else { ?>
				<h1>El usuario ya existe en la base de datos.</h1>
				<div >	
					Pulsa <a href="form_nuevo_usuario.php">aquí</a> para volver al formulario.
				</div>
		<?php } ?>

	</main>

	<?php
		include_once("pie.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>

