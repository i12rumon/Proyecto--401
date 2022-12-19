<?php

	/**
	* Clase coordinador recursos
	*/
	
    //namespace App;

	class coordinador_recursos extends usuario
	{
		
		//contructor con dos parametros
		function __construct($correo='',$password=''){
			parent::__construct($correo,$password);
	
		}


function asignar_recursos($id, $aforo,$camaras,$proyector) {
    include ("conexion.php");

$query="UPDATE recursos SET id = '$id',aforo='$aforo',camaras='$camaras',proyectores='$proyector' where recursos=id";
$result= mysqli_query($conn,$query);
mysqli_close ($conn);
if($result){
	return 1;
}else{
	return 0;
}
}

	}
?>