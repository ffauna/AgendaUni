<?php
session_start();
    include('gestionBD.php');
    include('gestionarUsuarios.php');
    // include('gestionarCalendarios.php');

    $conexion = crearConexionBD();
    $uvus = $_POST['uvus'];
    $pass = $_POST['pass'];
    $nombre = getNombreUsuario($conexion,$uvus,$pass);         //Falta oid en gestionarUsuarios
    $oidu= getOIDUsuario($conexion, $uvus, $pass);
    $cpropios= query("SELECT NOMBRE FROM CALENDARIOS WHERE OID_U = $oidu");
    $cajenos= permisosCalendario($oidu, $conexion);
    cerrarConexionBD($conexion);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href="img/favicon.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Página de perfil</title>
</head>

<body class="b_login">

    <header>
        <div class="">
            <?php
                $imagen= 'SELECT IMAGEN FROM USUARIOS WHERE UVUS = $uvus';
            ?>
            <img src="/AgendaUni/  <?php echo $imagen ?>" >


            <p>  <?php echo $uvus ?> </p>
            <h2> <?php echo $nombre ?> </h2>
        </div>

    </header>



<main>

    <div style= "border : solid 2px #bebdbf;    /*La clase está en el css con el nombre .pestana_calendario pero no me da el mismo resultado que el estilo. Lo estaré haciendo mal */
                 background : #ffffff;
                 color : #000000;
                 padding : 4px;
                 width : 200px;
                 height : 250px;
                 overflow : auto;">

        <?php
        foreach ($cajenos as $calendario) {
            print_r("calendario <br>");
        }?>

    </div>

    <div style= "border : solid 2px #bebdbf;
                 background : #ffffff;
                 color : #000000;
                 padding : 4px;
                 width : 200px;
                 height : 250px;
                 overflow : auto;" >
        <?php
        foreach ($cpropios as $calendariopropio) {
            print_r("$calendariopropio <br>");
        }?>

    </div>



</main>

<?php
include_once("pie.php");
?>

</body>
</html>












