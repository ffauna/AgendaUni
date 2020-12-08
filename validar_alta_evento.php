<?php

session_start();

require_once("gestionBD.php");

if (isset($_SESSION["formEvento"])) {
    $nuevoEvento["nombre"] = $_POST["nombre"];
    $nuevoEvento["fecha"] = $_POST["fecha"];
    $nuevoEvento["descripcion"] = $_POST["descripcion"];
    $nuevoEvento["oid_c"] = $_POST["oid_c"];

    $_SESSION["formEvento"] = $nuevoEvento;
} else {
    Header("Location: main.php");
}

$conexion = crearConexionBD();
$errores = validarDatosEvento($conexion,  $nuevoEvento);
cerrarConexionBD($conexion);

if (count($errores) > 0) {
    $_SESSION["errores"] = $errores;
    Header('Location: main.php');
} else
    Header('Location: accion_alta_evento.php');


function validarDatosEvento($conexion, $nuevoEvento)
{
    $errores = array();

    if ($nuevoEvento["nombre"] == "")
        $errores[] = "<p>El nombre no puede estar vacío</p>";

    if($nuevoEvento["fecha"]==null)
        $errores[]="<p>La fecha no puede estar vacía</p>";

    if($nuevoEvento["oid_c"]==null)
        $errores[]="<p>Seleccione un calendario</p>";



        return $errores;
    }

?>