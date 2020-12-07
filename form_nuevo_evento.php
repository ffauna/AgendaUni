<?php

    if(!isset($_SESSION['form'])){
        $form['nombre'] = "";
        $form['fecha'] = "";
        $form['horainicio'] = "";
		$form['horafin'] = "";
		$form['descripcion'] = "";

        $_SESSION['form'] = $form;
    } else {
        $form = $_SESSION['form'];
    }

    if(isset($_SESSION['errores'])){
        $errores = $_SESSION['errores'];
    }
?>

<?php
    if (isset($errores) && count($errores)>0) {
        echo "<div id=\"div_errores\" class=\"error\">";
        echo "<h4> Errores:</h4>";
        foreach($errores as $error) echo $error;
        echo "</div>";
    }
    ?>
    <script type="text/javascript" src="js/index.js"></script>
    <form id="nuevoEvento" method="get" action="main.php">
        <div class="f_cabecera">
            <p>Programa un evento!</p>
        </div>
        <div class="datos_evento">
            <div><label for="nombre">Título:</label>
                <input id="nombre" name="nombre" type="text" size="40" value="<?php echo $form['nombre'];?>" required/>
            </div>
            <div><label>Fecha:</label>
                <input id="fecha" type="date"></div>
            <div><label>Hora inicio:</label>
                <input id="horainicio" type="time">
            </div>
            <div><label>Hora fin:</label>
                <input id="horafin" type="time">
            </div>
            <div><label for="descripcion">Descripcion:</label>
                <input id="descripcion" name="descripcion" type="text" size="40" value="<?php echo $form['descripcion'];?>" />
            </div>
            <div>
            <input type="submit" value="Crear"></div>
        </div>
    </form>

 