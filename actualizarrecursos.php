<?php 
// fichero con los parámetros de la conexión 
session_start();
$aforo=$_REQUEST['aforo'];
$camaras=$_REQUEST['camaras'];
$proyector=$_REQUEST['proyectores'];
$id=$_SESSION["id"];

include ("clases\coordinador_recursos.php");
$curso1 = new coordinador_recursos();
$curso1->asignar_recursos($id,$aforo,$camaras,$proyector);
header("location: ./menu-coordrecursos.php");	

?>
