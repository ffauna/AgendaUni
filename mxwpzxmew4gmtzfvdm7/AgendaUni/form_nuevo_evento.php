<?php

    if(!isset($_SESSION['form'])){
        $form['nombre'] = "";
        $form['latitud'] = "";
        $form['longitud'] = "";
        $form['fecha'] = "";
        $form['horainicio'] = "";
		$form['horafin'] = "";
		$form['tipoevento'] = "";
		$form['diacompleto'] = "";
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
    <form id="nuevoEvento" method="get" action="main.php">
        <div class="f_cabecera">
            <p>Crea tu evento</p>
        </div>
        <div class="datos_evento">
            <div><label for="nombre"><em>*</em> Nombre:</label>
                <input id="nombre" name="nombre" type="text" size="40" value="<?php echo $form['nombre'];?>" required/>
            </div>

            <div><label for="latitud">Latitud:</label>
                <input type="text" name="latitud" id="latitud" value="<?php echo $form['latitud'];?>"/>
            </div>

             <div><label for="longitud">Longitud:</label>
                <input type="text" name="longitud" id="longitud" value="<?php echo $form['longitud'];?>"/>
            </div>
        
            <div><label><em>*</em> Tipo:</label>
                <label>
                    <input name="tipoevento" type="radio" value="OFICIAL"/>
                    Oficial</label>
                <label>
                    <input name="tipoevento" type="radio" value="NO_OFICIAL"/>
                    No oficial</label>
                <label>
                    <input name="tipoevento" type="radio" value="PRIVADO" checked/>
                    Privado</label>
            </div>

            <div><label>Dia completo:</label>
                <label>
                    <input name="diacompleto" type="checkbox" value="SI"/>Sí</label>
            </div>
            <div><label for="descripcion">Descripcion:</label>
                <input id="descripcion" name="descripcion" type="text" size="40" value="<?php echo $form['descripcion'];?>" />
            </div>
<!--            <div><label for="calEvento">Calendario:</label>-->
<!--                <input id="calEvento" name="calEvento" type="text" size="40" value="--><?php //echo $form['descripcion'];?><!--" />-->
<!--            </div>-->
        </div>
        </fieldset>
        <input type="submit" value="Crear">
    </form>
</div>

 