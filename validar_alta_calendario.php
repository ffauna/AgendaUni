<?php

session_start();

require_once("gestionBD.php");

if (isset($_SESSION["formCalendario"])) {
    // Recogemos los datos del formulario
    $nuevoCalendario["nombre"] = $_POST["nombre"];
    $nuevoCalendario["descripcion"] = $_POST["descripcion"];
    if($_SESSION['tipoUsuario']=='ADMIN')
        $nuevoCalendario['tipoC'] = 'OFICIAL';
    else $nuevoCalendario['tipoC'] = 'NOCOMPARTIDO';
        $nuevoCalendario['esPublico'] = "NO";
    $nuevoCalendario['oidu'] = $_SESSION['oidUsuario'];


    $_SESSION["formCalendario"] = $nuevoCalendario;
} else {
    Header("Location: form_nuevo_calendario.php");
}

$conexion = crearConexionBD();
$errores = validarDatosCalendario($conexion,  $nuevoCalendario);
cerrarConexionBD($conexion);

if (count($errores) > 0) {
    // Guardo en la sesión los mensajes de error y volvemos al formulario
    $_SESSION["errores"] = $errores;
    Header('Location: main.php');
} 
else
    // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
    Header('Location: accion_alta_calendario.php');

?>

<?php
function validarDatosCalendario($conexion, $nuevoCalendario)
{
    $errores = array();

    if ($nuevoCalendario["nombre"] == "")
        $errores[] = "<p>El nombre no puede estar vacío</p>";
    
    return $errores;
}

