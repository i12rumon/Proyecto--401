<?php

	/**
	* Clase usuario
	*/
	namespace App;
	class usuario
	{
		/**
		 * Declaramos variables
		*/

		private $x_correo;
		private $x_password;

		//contructor
		public function __construct($correo='',$password=''){
			$this->x_correo = $correo;
			$this->x_password = $password;
	}
		/**
		 * setter/getter
		 */
		public function setPass( $password ){	$this->x_password = $password; }
		public function getPass(){ return $this->x_password; }
		public function setCorreo($correo){	$this->x_correo = $correo; }
		public function getCorreo(){ return $this->x_correo; }



		//metodo que permite iniciar sesión

		function iniciarsesion($correo,$pass){
			include("conexion.php");
			$sql= "Select * from usuario where Correo like '".$correo."' and password like '".$pass."'";
			$result=mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) == 0){
			$hola = sprintf("<p class='form-control'style='color: red;'>No eres un usuario registrado..</p>");
			return $hola;
			}else{
				$row = mysqli_fetch_assoc($result);
                $_SESSION['idusuario']=$row['Dni'];
                $_SESSION['nombreusuario']=$row['Nombre'];
                $_SESSION['rol']=$row['Rol'];
                if ($row['Rol'] == 3) { 
                      header("location: index-usuario.php");    
                      } else {
				if ($row['Rol'] == 2) {
					header("location: menu-coordinadorcursos.php");
				} else {
					if ($row['Rol'] == 4) {
						header("location: menu-coordrecursos.php");
					} else {
						$_SESSION['admin'] = $row['Dni'];
						header("location: ./menu-administrador.php");
					}
				}
			}
          mysqli_close ($conn);
		  return 1;
		        }
		
			}
		//metodo que devuelve una consulta para verificar si el usuario existe

	 function usuarioexist($correo,$pass)
		{
			include("conexion.php");
			$sql= "Select * from usuario where Correo like '".$correo."' and password like '".$pass."'";
			$result=mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) == 0){
				return 0;
			}else{
				return 1;
			}
		}

		//metodo para cerrar sesión

		function cerrarsesion(){
			session_destroy();
			header ("location:index.php");
		}
	}

?>