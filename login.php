<?php
session_start();

include_once("gestionBD.php");
include_once("gestionarUsuarios.php");

if (isset($_POST['submit'])) {
    $uvus = $_POST['uvus'];
    $pass = $_POST['pass'];

    $conexion = crearConexionBD();
    $num_usuarios = consultarUsuario($conexion, $uvus, $pass);
    cerrarConexionBD($conexion);

    if ($num_usuarios == 0)
        $login = "error";
    else {
        $_SESSION['login'] = $uvus;
        Header("Location: main.php");
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href="img/favicon.ico" rel="icon" type="image/ico"/>
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>AgendaUni: Login</title>
</head>

<body class="b_login">
<?php
include_once("cabecera.php");
?>

<main>
    <?php if (isset($login)) {
        echo "<div class=\"error\">";
        echo "Error en la contraseña o no existe el usuario.";
        echo "</div>";
    }
    ?>
    <?php
    if (isset($_SESSION["excepcion"])) {
        ?>
        <div class="excepcion">
            <p>Ocurrió un problema para acceder a la base de datos. </p>
        </div>
        <?php unset($_SESSION["excepcion"]);
    }
    ?>

    <div class="login">
        <form action="login.php" method="post" class="loginBox">
            <div class="h_login">
            <h2>LOGIN</h2>
            </div>
            <input type="text" name="uvus" id="uvus" placeholder="UVUS" required/>
            <input type="password" name="pass" id="pass" placeholder="Contraseña" required/>
            <label for="registro"><a href="form_nuevo_usuario.php">¡Registrate!</a></label>
            <input id="entrar" type="submit" name="submit" value="Entrar"/>
            <div>
            <label for="about"><a href="about.php">    ¡Sobre Nosotros!</a></label>
            </div>
        </form>
    </div>
</main>
<?php
include_once("pie.php");
?>
</body>
</html>

