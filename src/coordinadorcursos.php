<?php

	/**
	* Clase coordinador de cursos
	*/
	
    namespace App;

	class coordinadorcursos extends usuario
	{
		
		//contructor con dos parametros
		function __construct($correo,$password){
        parent::__construct($correo,$password);
	}


	function crearcurso($nombre, $descripcion, $fecha_inicio, $fecha_final, $ponentes,$requisitos,$coordcursos) {
		include ("conexion.php");
	
	$query="INSERT INTO cursos (Id,Nombre,FechaInicio,FechaFin,Descripcion,Ponente,Requisitos,Correo_coordcursos) VALUES (null,'".$nombre."','".$fecha_inicio."','".$fecha_final."','".$descripcion."','".$ponentes."','".$requisitos."','".$coordcursos."')";
	// lanzamos la instrucción SQL para insertar .. Si generase un error se mostraría el mensaje ERROR. 
	$result= mysqli_query($conn,$query);
	mysqli_close ($conn);
	if($result){
		return 1;
	}else{
		return 0;
	}
	}

	function modificar_curso($id,$nombre='', $descripcion='', $fecha_inicio='', $fecha_final='', $ponentes=''){
		include("conexion.php");
		$sql2= "UPDATE cursos SET Nombre = '$nombre',Descripcion='$descripcion',FechaInicio='$fecha_inicio',FechaFin='$fecha_final',Ponente='$ponentes' where cursos.Id='$id'";
		$result=mysqli_query($conn,$sql2);
		mysqli_close ($conn);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

function curso_existe($nombre){
	include("conexion.php");
			$sql= "Select * from cursos where Nombre like '".$nombre."'";
			$result=mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) == 0){
				return 0;
			}else{
				return 1;
			}
}



	}
?>