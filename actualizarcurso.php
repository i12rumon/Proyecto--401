<?php 
// fichero con los parámetros de la conexión 

$nombre=$_REQUEST['nombre'];
$fecha_inicio=$_REQUEST['fechainc'];
$fecha_final=$_REQUEST['fechafin'];
$descripcion=$_REQUEST['desc'];
$ponentes=$_REQUEST['ponentes'];
$id=$_REQUEST['id'];

       //include ('grabarcurso.php');
    include ('clases\usuario.php');
   include ("clases\coordinadorcursos.php");
   $curso1=new coordinadorcursos('f','f');
   $curso1->modificar_curso($id,$nombre,$descripcion,$fecha_inicio,$fecha_final,$ponentes);

?>
