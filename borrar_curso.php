<?php 
// fichero con los parámetros de la conexión 

$id=$_GET['id'];


include ("conexion.php");
$sql_query = "DELETE FROM cursos where Id='$id'";
$resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
$sql_query2 = "DELETE FROM cursousuario where IdCurso='$id'";
$resultset2 = mysqli_query($conn, $sql_query2) or die("error base de datos:". mysqli_error($conn));
$sql_query3 = "DELETE FROM lista_espera where IdCurso='$id'";
$resultset3 = mysqli_query($conn, $sql_query3) or die("error base de datos:". mysqli_error($conn));
header("location: ./borrarcursocoord.php");
?>
