<?php
session_start();

require_once ("gestionBD.php");

if(!isset($_SESSION['form'])){
    $form['uvus'] = "paco";
    $form['pass'] = "";
    $form['nombre'] = "";
    $form['apellidos'] = "";
    $form['tipousuario'] = "";

    $_SESSION['form'] = $form;
} else {
    $form = $_SESSION['form'];
}

if(isset($_SESSION['errores'])){
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
}

    $conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>AgendaUni: Registro</title>
    <link href="img/favicon.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <script src="js/validacion_formularios.js" type="text/javascript"></script>
</head>

<body class="b_registro">
    <?php
    include_once ("cabecera.php");
    ?>

    <?php
    if (isset($errores) && count($errores)>0) {
        echo "<div id=\"div_errores\" class=\"error\">";
        echo "<h4> Errores:</h4>";
        foreach($errores as $error) echo $error;
        echo "</div>";
    }
    ?>
    <div>
        <form id="altaUsuario" method="POST" action="validar_alta_usuario.php">
            <p><i>Campos obligatorios marcados con </i>*</p>
            <fieldset><legend>Datos de Registro</legend>

                <div class="datosReg">
                    <div><label for="uvus"><em>*</em> UVUS:</label>
                        <input id="uvus_Reg" name="uvus" type="text" size="40" required/>                 <!-- value="<?php echo($form['uvus']); ?>" -->
                    </div>

                    <div><label for="pass"><em>*</em> Contraseña:</label>
                        <input type="password" name="pass" id="pass" placeholder="Mínimo 8 caracteres entre letras y dígitos" minlength="8" required oninput="passwordValidation()";/>        
                    </div>

                    <div> <label for="confirmpass"><em>*</em>Confirmar Password: </label>
                        <input type="password" name="confirmpass" id="confirmpass" placeholder="Confirmación de contraseña"  oninput="passwordConfirmation();" required/>
                    </div>
                </div>
            </fieldset>

            <fieldset><legend>Datos Personales</legend>

                <div><label for="nombre"><em>*</em> Nombre:</label>
                    <input id="nombre" name="nombre" type="text" size="40" maxlength="40" required>
                </div>

                <div><label for="apellidos">Apellidos:</label>
                    <input id="apellidos" name="apellidos" type="text" size="40" maxlength="40"/>
                </div>
            </fieldset>
            <input id="registro" type="submit" value="Registrarse">
        </form>

    </div>

</body>

<?php
include_once ("pie.php");
cerrarConexionBD($conexion);
?>
</html>