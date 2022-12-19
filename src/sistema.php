<?php

	/**
	* Clase sistema
	*/
	namespace App;
	class sistema
	{
		
		function __construct(){

		}
	
	function exito_usuarioapuntado(){
	?><center>  <div class="alert alert-primary" role="alert">
   <a class="alert-link">SUCCESS:</a> Usuario apuntado con éxito</div></center>
   <?php
	}
	function exito_usuarioapuntadolista(){
		?><center>  <div class="alert alert-warning" role="alert">
		<a class="alert-link">Ingresado en lista de espera</a> </div></center>
		<?php
		}

	function error_usuarioapuntado(){
	?><center>  <div class="alert alert-danger" role="alert">
   <a class="alert-link">ERROR: Usuario ya apuntado</a> </div></center>
   <?php
	}

	function error_cursoiniciado(){
		?><center>  <div class="alert alert-danger" role="alert">
	   <a class="alert-link">ERROR: No se puede apuntar, el curso ya ha iniciado</a> </div></center>
	   <?php
		}
	
	function error_cursolleno(){
		?><center>  <div class="alert alert-danger" role="alert">
		<a class="alert-link">ERROR: El curso esta lleno</a> </div></center>
		<?php
		}



	function ingresar_en_curso($user,$curso){
		include ("conexion.php");
		$query="INSERT INTO cursousuario (Dni,IdCurso) VALUES ('$user','$curso')";
    	$result= mysqli_query($conn,$query);
		mysqli_close ($conn);
		if($result){
			return 1;
		}else{
			return 0;
		}
}

function ingresar_en_lista($user,$curso){
	include ("conexion.php");
	$query="INSERT INTO lista_espera (Dni,IdCurso,Fecha_ingreso) VALUES ('$user','$curso',NOW())";
	$result= mysqli_query($conn,$query);
	mysqli_close ($conn);
	if($result){
		return 1;
	}else{
		return 0;
	}
}
	}