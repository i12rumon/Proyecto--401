<?php
    /**
	* Clase recurso
	*/
	namespace App;
class recurso{
	/**
	 * 	Declaramos variables
	 */

	private $x_id;
	private $x_aforo;
	private $x_camaras;
	private $x_proyectores;

	function __construct($id='',$aforo='',$camaras='',$proyectores=''){
		$this->x_id = $id;
		$this->x_aforo = $aforo;
		$this->x_camaras = $camaras;
		$this->x_proyectores = $proyectores;

		}
	

		public function setid( $id ){	$this->x_id = $id; }
		public function getid(){ return $this->x_id; }
		public function set_aforo( $aforo ){	$this->x_aforo = $aforo; }
		public function get_aforo(){ return $this->x_aforo; }
		public function set_camaras( $camaras ){	$this->x_camaras = $camaras; }
		public function get_camaras(){ return $this->x_camaras; }
		public function set_proyectores( $proyectores ){	$this->x_proyectores = $proyectores; }
		public function get_proyectores(){ return $this->x_proyectores; }
		//Metodo que permite ver la información de un curso
		function mostrar_detalles($id){
		
include ("conexion.php");


$sql_query = "SELECT * FROM recursos where id='$id'";
            
$resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset)?>
<div class="container home">    
<center> <h1><u><?php echo $row['id'];?></u></h1> </center> 
<p><b>Aforo: </b><?php echo $row['aforo'];?></p>
<p><b>Camaras: </b><?php echo $row['camaras'];?></p>
<p><b>Proyectores: </b><?php echo $row['proyectores'];?></p>
<?php
		}

		function listar_recursos(){
			$sql=sprintf( "Select * from recursos" );
			return $sql;
		}




}
?>