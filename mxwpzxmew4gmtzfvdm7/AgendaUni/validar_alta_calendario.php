<?php

session_start();

require_once("gestionBD.php");

if (isset($_SESSION["form"])) {
    // Recogemos los datos del formulario
    $nuevoCalendario["nombre"] = $_REQUEST["nombre"];
    $nuevoCalendario["descripcion"] = $_REQUEST["descripcion"];
    $nuevoCalendario["tipoC"] = $_REQUEST["tipoC"];
    $nuevoCalendario["esPublico"] = $_REQUEST["esPublico"];


    $_SESSION["form"] = $nuevoCalendario;
} else {
    Header("Location: form_nuevo_calendario.php");
}

$conexion = crearConexionBD();
$errores = validarDatosUsuario($conexion,  $nuevoCalendario);
cerrarConexionBD($conexion);

if (count($errores) > 0) {
    // Guardo en la sesión los mensajes de error y volvemos al formulario
    $_SESSION["errores"] = $errores;
    Header('Location: form_nuevo_calendario.php');
} else
    // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
    Header('Location: accion_alta_calendario.php');

function validarDatosCalendario($conexion, $nuevoCalendario)
{
    $errores = array();

    if ($nuevoCalendario["nombre"] == "")
        $errores[] = "<p>El nombre no puede estar vacío</p>";

    if ($nuevoCalendario["descripcion"] == "") {
        $errores[] = "<p>El uvus no puede estar vacío</p>";
    } else if (!filter_var($nuevoCalendario["uvus"], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "<p>El uvus es incorrecto: " . $nuevoCalendario["uvus"] . "</p>";
    }

    if ($nuevoCalendario["esPublico"] != "SI" &&
        $nuevoCalendario["esPublico"] != "NO") {
        $errores[] = "<p>El tipo debe ser SI o NO</p>";
    }

    if (!isset($nuevoCalendario["nombre"]) || strlen($nuevoCalendario["pass"]) < 1) {
        $errores [] = "<p>Contraseña no válida: debe tener al menos 1 caracteres</p>";


        return $errores;
    }
}

