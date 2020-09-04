<?php


if(!isset($_SESSION['form'])){
    $form['nombre'] = "";
    $form['descripcion'] = "";
    $form['tipoC'] = "";
    $form['esPublico'] = "";
    $form['oidu'] = "";

    $_SESSION['form'] = $form;
}
else {
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





    <html>

<head>
</head>

<body>


<div>


    <form id="nuevoCalendario" method="get" action="validar_alta_calendario.php">

        <div class="f_cabecera">
            <p>Actualiza tu calendario</p>
        </div>


        <div class="datos_evento">
        <div><label for="nombre"><em>*</em> Nombre:</label>
            <input id="nombre" name="nombre" type="text" maxlength="256" value="<?php echo $form['nombre'];?>" required/>
        </div>

        <div><label for="descripcion"><em>*</em> Descripcion:</label>
            <input  id="descripcion" name=descripcion" type="text" maxlength="2048" value="<?php echo $form['descripcion'];?>"/>
        </div>
        </div>




        </fieldset>
        <input type="submit" value="Modificar">

    </form>

</div>


<script>
    function esconderDiv() {
        var x = document.getElementById("hiddenDiv");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>

</body>

    </html>


