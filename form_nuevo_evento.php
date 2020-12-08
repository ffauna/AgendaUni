<?php
    
    if(!isset($_SESSION['formEvento'])){
        $form['nombre'] = "";
        $form['fecha'] = "";
        $form['descripcion'] = "";
        $form['oid_c']="";

        $_SESSION['formEvento'] = $form;
    } else {
        $form = $_SESSION['formEvento'];
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
    <form id="nuevoEvento" method="POST" action="validar_alta_evento.php">
        <div class="f_cabecera">
            <p>Programa un evento!</p>
        </div>
        <div class="datos_evento">
            <div><label for="nombre">Título:</label>
                <input id="nombre" name="nombre" type="text" size="40" value="<?php echo $form['nombre'];?>" required/>
            </div>
            <div><label for="oid_c">Calendario:</label>
                <select name="oid_c" id="oid_c">
                
                    <?php 
                    
                    foreach($listaId as $elemento) { 
                            ?> <option name="oid_c" id="oid_c" value="<?php echo $elemento[0]; ?>"> <?php echo $elemento[1]; ?></option>
                    <?php
                    } ?>
                    
                </select>   
            </div>
            <div><label>Fecha:</label>
                <input name="fecha" id="fecha" type="text" placeholder="dd/mm/yyyy"></div>
            <div><label for="descripcion">Descripcion:</label>
                <input id="descripcion" name="descripcion" type="text" size="40" value="<?php echo $form['descripcion'];?>" />
            </div>
            <div>
            <input type="submit" value="Crear"></div>
        </div>
    </form>

 