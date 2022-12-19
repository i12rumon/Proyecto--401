<?php 
// fichero con los parámetros de la conexión 
include ("conexion.php");
$dni = $_GET['Dni'];

// preparamos la variable $query con la instrucción Sql  para insertar los datos recogidos del formulario de registro de usuarios , en la tabla Usuarios de la Base de datos PIBD. La función que recoge la marca temporal es current_time

$query="delete from usuario where Dni='$dni'";

$result= mysqli_query($conn,$query);
mysqli_close ($conn);
header("location: ./administrarusuarios.php");
?>