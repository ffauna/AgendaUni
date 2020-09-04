
<?php
session_start();
include_once("gestionBD.php");

$connect = crearConexionBD();

$data = array();

$query = "SELECT * FROM EVENTOS ORDER BY OID_E";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'title'   => $row["NOMBRE"],
  'start'   => $row["FECHAINICIO"],
  'end'   => $row["FECHAFIN"],
  
 );
}
echo json_encode($data);

 cerrarConexionBD($connect);

?>