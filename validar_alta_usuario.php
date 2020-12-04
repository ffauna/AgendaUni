<?php
session_start();

require_once ("gestionBD.php");

if (isset($_SESSION["form"])) {
    // Recogemos los datos del formulario
    $nuevoUsuario["uvus"] = $_REQUEST["uvus"];
    $nuevoUsuario["pass"] = $_REQUEST["pass"];
    $nuevoUsuario["confirmpass"] = $_REQUEST["confirmpass"];
    $nuevoUsuario["nombre"] = $_REQUEST["nombre"];
    $nuevoUsuario["apellidos"] = $_REQUEST["apellidos"];
    $nuevoUsuario["tipoUsuario"] = $_REQUEST["tipoUsuario"];

    $_SESSION["form"] = $nuevoUsuario;
} else {
    Header("Location: form_nuevo_usuario.php");
}

$conexion = crearConexionBD();
$errores = validarDatosUsuario($conexion, $nuevoUsuario);
cerrarConexionBD($conexion);

if (count($errores)>0) {
    // Guardo en la sesión los mensajes de error y volvemos al formulario
    $_SESSION["errores"] = $errores;
    Header('Location: form_nuevo_usuario.php');
} else
    // Si todo va bien, vamos a la página de acción (inserción del usuario en la base de datos)
    Header('Location: accion_alta_usuario.php');

function validarDatosUsuario($conexion, $nuevoUsuario){
    $errores=array();

    if($nuevoUsuario["nombre"]=="")
        $errores[] = "<p>El nombre no puede estar vacío</p>";

    if($nuevoUsuario["uvus"]==""){
        $errores[] = "<p>El uvus no puede estar vacío</p>";
    }else if(!filter_var($nuevoUsuario["uvus"], FILTER_VALIDATE_EMAIL)){
        $errores[] = "<p>El uvus es incorrecto: " . $nuevoUsuario["uvus"]. "</p>";
    }

    if(!isset($nuevoUsuario["pass"]) || strlen($nuevoUsuario["pass"])<8){
        $errores [] = "<p>Contraseña no válida: debe tener al menos 8 caracteres</p>";
    }else if(!preg_match("/[a-z]+/", $nuevoUsuario["pass"]) ||
        !preg_match("/[A-Z]+/", $nuevoUsuario["pass"]) || !preg_match("/[0-9]+/", $nuevoUsuario["pass"])){
        $errores[] = "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos</p>";
    }else if($nuevoUsuario["pass"] != $nuevoUsuario["confirmpass"]){
        $errores[] = "<p>La confirmación de contraseña no coincide con la contraseña</p>";
    }

    return $errores;
}

?>

