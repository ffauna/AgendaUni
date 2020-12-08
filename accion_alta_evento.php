<?php
session_start();

require_once("gestionBD.php");
require_once("gestionEvento.php");

if (isset($_SESSION["formEvento"])) {
    $nuevoEvento = $_SESSION["formEvento"];
    $_SESSION["formEvento"] = null;
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
    <title>AgendaUni: Alta de Evento con éxito</title>
</head>

<body>
<?php
include_once("cabecera.php");
?>
<main>
    <?php if (alta_evento($conexion, $nuevoEvento)) {
        ?>
        <h1>Tu Evento se ha creado/modificado </h1>
        <div >
            Pulsa <a href="main.php">aquí</a> para volver.
        </div>
    <?php } else { ?>
        <h1>El evento ya existe en la base de datos.</h1>
        <div >
            Pulsa <a href="form_nuevo_evento.php">aquí</a> para crear un evento.
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