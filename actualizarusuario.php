<?php

session_start();

$id = $_SESSION["dni"];
$dni=$_REQUEST['dni'];
$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellidos'];
$usuario=$_REQUEST['usuario'];
$correo=$_REQUEST['correo'];
$password=$_REQUEST['contraseña'];


   include("clases\usuario.php");
   include ("clases\administrador.php");
   $curso1=new administrador('f','f');
   $curso1->modificar_usuario($id,$dni,$nombre,$apellidos,$usuario,$correo,$password);
   header("location: ./administrarusuarios.php");	
?>
