<?php
session_start();
require("gestionBD.php");
require("gestionarUsuarios.php");
require("gestionarCalendarios.php");
require("gestionEvento.php");

if (!isset($_SESSION['login']))
    Header("Location: login.php");
else {
    if (isset($_SESSION['login'])) {
        $uvus = $_SESSION['login'];
    }
}

$conexion = crearConexionBD();
$oidU = getOIDUsuario($conexion, $uvus);
$tipoUsuario = getTipoUsuario($conexion, $uvus);
$_SESSION['oidUsuario'] = $oidU;
$_SESSION['tipoUsuario'] = $tipoUsuario;

$fechaMes = date("m");
$fechaYear = date("Y");

if (isset($_SESSION["paginacion"]))
    $paginacion = $_SESSION["paginacion"];

$pagina_seleccionada = isset($_GET["PAG_NUM"]) ? (int)$_GET["PAG_NUM"] : (isset($paginacion) ? (int)$paginacion["PAG_NUM"] : 1);
$pag_tam = isset($_GET["PAG_TAM"]) ? (int)$_GET["PAG_TAM"] : (isset($paginacion) ? (int)$paginacion["PAG_TAM"] : 5);

if ($pagina_seleccionada < 1)         $pagina_seleccionada = 1;
if ($pag_tam > 4)         $pag_tam = 4;
if ($pag_tam < 1)         $pag_tam = 4;

unset($_SESSION["paginacion"]);

$query = 'SELECT NOMBRE, DESCRIPCION FROM CALENDARIOS WHERE OID_U=' . $oidU;
$listaId=array();
$listaId=listaOidPorOidU($conexion,$oidU);
        


$total_calendarios = total_calendarios($conexion, $query);
$total_paginas = isset($_SESSION["PAG_TOT"]) ? $_SESSION["paginacion"]["PAG_TOT"] : (int)($total_calendarios / $pag_tam);

if ($total_calendarios % $pag_tam > 0)        $total_paginas++;

if ($pagina_seleccionada > $total_paginas)        $pagina_seleccionada = $total_paginas;

$paginacion["PAG_NUM"] = $pagina_seleccionada;
$paginacion["PAG_TAM"] = $pag_tam;
$paginacion["PAG_TOT"] = $total_paginas;
$_SESSION['paginacion'] = $paginacion;
$filas = consultar_calendarios($conexion, $oidU);

if (isset($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
}
if (isset($_SESSION['mensajes'])) {
    $mensajes = $_SESSION['mensajes'];
    unset($_SESSION['mensajes']);
}

$conexion = cerrarConexionBD($conexion);


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link href="img/favicon.ico" rel="icon" type="image/ico" />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>AgendaUni</title>
</head>

<body class="grid-body">
    <main>
        <?php
        if (isset($errores) && count($errores) > 0) {
            echo "<div id=\"div_errores\" class=\"error\">";
            echo "<h4> Errores:</h4>";
            foreach ($errores as $error) echo $error;
            echo "</div>";
        }
        ?>
        <?php
        if (isset($errores) && count($errores) > 0) {
            echo "<div id=\"div_mensajes\" class=\"mensaje\">";
            foreach ($mensajes as $mensaje) echo $mensaje;
            echo "</div>";
        }
        ?>
        <div class="boton_creaCalen">
            <button name="btn_creaCalen" id="crear-calendario"><i class="fas fa-plus"></i>Nuevo Calendario</button>
        </div>
        <div id="form-calendario" class="oculto">
            <?php
            include_once("form_nuevo_calendario.php");
            ?>
        </div>
        <div class="boton_creaEvento">
            <button name="btn_creaEvento" id="crear-evento"><i class="fas fa-plus"></i>Nuevo Evento</button>
        </div>
        <div id="form-evento" class="oculto">
            <?php
            include_once("form_nuevo_evento.php");
            ?>
        </div>
    
    <div class="calendarios_paginados">

            <nav>

                <div id="enlaces">

                    <?php

                    for ($pagina = 1; $pagina <= $total_paginas; $pagina++)

                        if ($pagina == $pagina_seleccionada) {     ?>

                        <span class="current"><?php echo $pagina; ?></span>

                    <?php } else { ?>

                        <a href="main.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>

                    <?php } ?>

                </div>

                <form method="get" action="main.php">

                    <input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada ?>" />

                    Mostrando

                    <input id="PAG_TAM" name="PAG_TAM" type="number" min="1" max="<?php echo sizeof($filas); ?>" value="<?php echo $pag_tam ?>" autofocus="autofocus" />

                    entradas de <?php echo $total_calendarios ?>

                    <input type="submit" value="Cambiar">

                </form>



            </nav>

            <div class="lista_Cal">
            <form method="POST">
                <?php
                $limite = $pagina_seleccionada*($pag_tam + 1) > $total_paginas ? $total_paginas : $pagina_seleccionada+$pag_tam;
                for ($i=$pagina_seleccionada*$pag_tam; $i < $limite; $i++) { 
                    $fila = $filas[$i];
                    if(isset($_POST["borrarCal-".$fila['OID_C']])) { 
                        echo eliminar_calendario($conexion,$oidc); 
                    }
                ?>
                    
                    <div class="elemento-lista">
                        <?php if (!(is_null($fila['DESCRIPCION']))) { ?>
                            <div class="elemento-cal">
                                <h4 class="nombre"><?php echo $fila['NOMBRE']  ?> 
                                    <a href="form_update_calendario.php">
                                        <img src="img/editar.png" width="15px" height="15px"> 
                                    </a> 
                                    <button value="borrarCal-<?php echo $fila['OID_C']?>">
                                        <img src="img/basura.png" width="15px" height="15px">
                                    </button> 
                                </h4>
                                <h5 class="desc-cal"><?php echo $fila['DESCRIPCION']; ?></h5>
                            </div>
                        <?php } else { ?>
                            <div id="<?php echo $filas[$i]['OID_C']?>" class="elemento-cal">
                                <h4 class="nombre"><?php echo $fila['NOMBRE'] ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    
                <?php
                }
                cerrarConexionBD($conexion);
                ?>
                </form>
            </div>

        </div>

        <div id="plantilla_calendario" data-value="<?php echo $fechaMes; ?>-<?php echo $fechaYear; ?>">
            <div id='diasCalendario'>
            </div>
        </div>
        <script type="text/javascript" src="js/plantillaCalendario.js"></script>

    </main>

    <?php
    include_once("pie.php");
    ?>
</body>

</html>