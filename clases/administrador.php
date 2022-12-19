<?php

	/**
	* Clase admin
	*/
	//namespace App;
	class administrador extends usuario
	{
		/**
		 * Declaramos variables
		*/		
		//contructor con dos parametros opcionales
		function __construct($correo='',$password=''){
		parent::__construct($correo,$password);

	}
	
	function listarusuarios(){
		$sql= sprintf( "Select * from usuario" );
		return $sql;
	}

	function altausuario($usuario,$correo){
		$sql= sprintf( "Select * from usuario" );
		return $sql;
	}

	function bajausuario($usuario,$correo){
		$sql= sprintf( "Select * from usuario" );
		return $sql;
	}

	function modificar_usuario($id,$dni,$nombre,$apellidos,$usuario,$correo,$password){
		include("conexion.php");
		$sql2= "UPDATE usuario SET Dni = '$dni',Nombre='$nombre',Apellidos='$apellidos',UsuarioUco='$usuario',Correo='$correo',password='$password' where Dni='$id'";
		$result=mysqli_query($conn,$sql2);
		mysqli_close ($conn);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}
	

}
?>