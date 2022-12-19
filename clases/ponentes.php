<?php

	/**
	* Clase visitante
	*/
	//namespace App;
	class ponente extends usuario
	{
		/**
		 * Declaramos variables
		*/		
		//contructor con dos parametros opcionales
		function __construct($nombre=''){
        parent::__construct($nombre);
	}
	
	function asignar_ponentes($id, $nombre){
        include("conexion.php");
        $sql2= "UPDATE cursos SET Ponente='$nombre' where cursos.Id='$id'";
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