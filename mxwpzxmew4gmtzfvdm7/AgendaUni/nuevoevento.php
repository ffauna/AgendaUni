<?php


  
if(isset($_POST["nombre"]))
{
 $query = "
 CALL INSERTAR_EVENTO (:nombre,:latitud,:longitud,:fechainicio, :fechafin,:tipoevento,:diacompleto,:descripcion,1,6,NULL)
 ";
 $statement = $connect->prepare($query);
 
 $statement->execute(
  array(
   ':nombre'  => $_POST['nombre'],
   ':latitud' => $_POST['latitud'],
   ':longitud' => $_POST['longitud'],
   ':fechainicio' => $_POST['fechainicio'],
   ':fechafin' => $_POST['fechafin'],
   ':tipoevento'  => $_POST['tipoevento'],
   ':diacompleto' => $_POST['diacompleto'],
   ':descripcion' => $_POST['descripcion'],
  )
 );
 cerrarConexionBD($connect);
}



?>