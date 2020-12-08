<?php
session_start();

require_once("gestionBD.php");
require_once("gestionarCalendarios.php");

if (isset($_SESSION["formCalendario"])) {
    $nuevoCalendario = $_SESSION["formCalendario"];
    $_SESSION["formCalendario"] = null;
    $_SESSION["errores"] = null;
}
else
    Header("Location: main.php");

$conexion = crearConexionBD();

?>

<?php if (alta_calendario($conexion, $nuevoCalendario)) {
    $_SESSION['mensajes'] = "<p>Tu calendario se ha creado.</p>";
 } else { 
    $_SESSION['mensajes'] = "<p>El calendario ya existe.</p>";
}
Header("Location: main.php");
cerrarConexionBD($conexion);
?>
