<?php
if (!isset($_SESSION)) {
    session_start();
}
    if(!isset($_SESSION['formCalendario'])){
         $form['nombre'] = "";
         $form['descripcion'] = "";
         if($_SESSION['tipoUsuario']=='ADMIN')
            $form['tipoC'] = 'OFICIAL';
        else $form['tipoC'] = 'NOCOMPARTIDO';
         $form['esPublico'] = "NO";
         $form['oidu'] = $_SESSION['oidUsuario'];

         $_SESSION['formCalendario'] = $form;
    }
    else {
        $form = $_SESSION['formCalendario'];
    }
?>

<script type="text/javascript" src="js/index.js"></script>
<form id="nuevoCalendario" method="POST" action="validar_alta_calendario.php">
    
    <div class="f_cabecera">
        <p>Crea tu calendario </p>
    </div>

    <div class="datos_evento">
        <div><label for="nombre"><em>*</em> Nombre:</label>
            <input id="nombre" name="nombre" type="text" maxlength="256" required/>
        </div>
        <div><label for="descripcion">Descripcion:</label>
            <input  id="descripcion" name="descripcion" type="text" maxlength="2048"/>
        </div>
    </div>

    </fieldset>
    <input type="submit" value="Crear">

</form>