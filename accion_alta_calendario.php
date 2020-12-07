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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>AgendaUni: Alta de Calendario con éxito</title>
</head>

<body>
<?php
include_once("cabecera.php");
?>

<main>
    <?php if (alta_calendario($conexion, $nuevoCalendario)) {
        ?>
        <h1>Tu calendario se ha creado/modificado </h1>
        <div >
            Pulsa <a href="login.php">aquí</a> para acceder a tu Calendario Personal.
        </div>
    <?php } else { ?>
        <h1>El calendario ya existe en la base de datos.</h1>
        <div >
            Pulsa <a href="form_nuevo_calendario.php">aquí</a> para volver al formulario.
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
