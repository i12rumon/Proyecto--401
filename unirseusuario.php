<?php 
// fichero con los parámetros de la conexión 
session_start();
?>
<?php
include ("css.html");
include ("conexion.php");
include ("clases\usuario.php");
include ("clases\sistema.php");
$curso = $_GET['curso'];
$user=$_SESSION['idusuario'];
$s = new sistema();

$sql3="select * from cursousuario where IdCurso='$curso'";
$resultado3=mysqli_query($conn,$sql3);
$sql4="select * from cursos where FechaInicio>NOW() and Id='$curso'";
$resultado4=mysqli_query($conn,$sql4);
$sql5="select * from cursousuario where IdCurso='$curso' and Dni='$user'";
$resultado5=mysqli_query($conn,$sql5);

if (mysqli_num_rows($resultado5) == 0){
if (mysqli_num_rows($resultado4) > 0){
if (mysqli_num_rows($resultado3) <4){
   
    $s->ingresar_en_curso($user,$curso);
    $s->exito_usuarioapuntado();
    header("refresh:2;url=administrarusuarios.php"); 

}else{
$s->error_cursolleno();
header("refresh:2;url=administrarusuarios.php"); 

}

}else{
$s->error_cursoiniciado();
header("refresh:2;url=administrarusuarios.php"); 

}
}

else{
$s->error_usuarioapuntado();
header("refresh:2;url=administrarusuarios.php"); 

}
?>