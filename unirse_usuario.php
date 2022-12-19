<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Cursos UCO</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
</html>


<?php 
session_start();
include ("conexion.php");
include ("clases\usuario.php");
include ("clases\participante.php");
include ("clases\sistema.php");
$curso = $_GET['id'];
$user=$_SESSION['idusuario'];


$s = new sistema();
$p = new participante();

$sql2="select aforo from recursos, curso_recurso where recursos=id and curso='$curso'";
$resultado2=mysqli_query($conn,$sql2);
$row = mysqli_fetch_assoc($resultado2);
$sql3="select * from cursousuario where IdCurso='$curso'";
$resultado3=mysqli_query($conn,$sql3);
$sql4="select * from cursos where FechaInicio>NOW() and Id='$curso'";
$resultado4=mysqli_query($conn,$sql4);
$sql5="select * from cursousuario where IdCurso='$curso' and Dni='$user'";
$resultado5=mysqli_query($conn,$sql5);

if (mysqli_num_rows($resultado4) >0){

if (mysqli_num_rows($resultado3) < $row["aforo"]){
if (mysqli_num_rows($resultado5) == 0){
  $p->inscribir_curso($user,$curso);
  $s->exito_usuarioapuntado();
  header("refresh:2;url=index-usuario.php"); 

}else{
$s->error_usuarioapuntado();
header("refresh:2;url=index-usuario.php"); 
}

}else{
  $s->ingresar_en_lista($user,$curso);  
  $s->exito_usuarioapuntadolista();
  header("refresh:2;url=index-usuario.php"); 
}
}

else{
$s->error_cursoiniciado();
header("refresh:2;url=index-usuario.php"); 
}
?>