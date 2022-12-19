<?php

	/**
	* Clase participante
	*/
	//namespace App;
	class participante extends usuario
	{
		/**
		 * Declaramos variables
		*/		
		private $x_dni;
		//contructor con dos parametros opcionales
		function __construct($correo='',$password='',$dni=''){
		parent::__construct($correo,$password);
		$this->x_dni = $dni;

	}
	
	function inscribir_curso($user,$idcurso){
		include("conexion.php");
		$sql="INSERT INTO cursousuario (Dni,IdCurso) VALUES ('$user','$idcurso')";
    	$result= mysqli_query($conn,$sql);
		mysqli_close ($conn);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}



}
?>