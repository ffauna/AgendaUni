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

<script type="text/javascript" src="js/index.js"></script>
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

    <div><label><em>*</em> Tipo:</label>
        <label>
            <input name="tipoC" type="radio" value="OFICIAL" checked <?php if($form['tipoC']=='OFICIAL') echo ' checked ';?>/>
            Oficial</label>
        <label>
            <input name="tipoC" type="radio" value="COMPARTIDO" <?php if($form['tipoC']=='COMPARTIDO') echo ' checked ';?>/>
            Compartido</label>
        <label>
            <input name="tipoC" type="radio" value="NOCOMPARTIDO" <?php if($form['tipoC']=='NOCOMPARTIDO') echo ' checked ';?>/>
            No Compartido</label>
    </div>

    <div><label><em>*</em> Es Publico:</label>
        <label>
            <input name="esPublico" type="radio" value="SI"  <?php if($form['esPublico']=='SI') echo ' checked ';?>/>
            Es un calendario público</label>
        <label>
            <input name="esPublico" type="radio" value="NO" checked <?php if($form['esPublico']=='NO') echo ' checked ';?>/>
            No es un calendario público</label>


    </div>
    </div>

    </fieldset>
    <input type="submit" value="Crear">

</form>