<?php
    /**
	* Clase curso
	*/
	namespace App;
class curso{
	/**
	 * 	Declaramos variables
	 */
	private $x_id;
	private $x_nombre;
	private $x_fecha_inicio;
	private $x_fecha_final;
	private $x_descripcion;
	private $x_ponentes;

	

	function __construct($id='',$nombre='',$fecha_inicio='',$fecha_final='',$descripcion='',$ponentes='',
	$aforo=''){
		$this->x_nombre = $nombre;
		$this->x_id = $id;
		$this->x_descripcion = $descripcion;
		$this->x_fecha_inicio = $fecha_inicio;
		$this->x_fecha_final = $fecha_final;
		}
	

		public function setid( $id ){	$this->x_id = $id; }
		public function getid(){ return $this->x_id; }
		public function set_Nombre( $nombre ){	$this->x_nombre = $nombre; }
		public function get_Nombre(){ return $this->x_nombre; }
		public function set_Descripcion( $descripcion ){	$this->x_descripcion = $descripcion; }
		public function get_Descripcion(){ return $this->x_descripcion; }
		public function set_fecha_inicio( $fecha_inicio ){	$this->x_fecha_inicio = $fecha_inicio; }
		public function get_fecha_inicio(){ return $this->x_fecha_inicio; }
		public function set_fecha_final( $fecha_final ){	$this->x_fecha_final = $fecha_final; }
		public function get_fecha_final(){ return $this->x_fecha_final; }
		
		//Metodo que permite ver la información de un curso

		function mostrar_detalles($id){
		
			include ("conexion.php");
			$sql_query = "SELECT * FROM cursos where Id='$id'";
            $resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
			$row = mysqli_fetch_assoc($resultset)?>
			<div class="container home">    
			<center> <h1><u><?php echo $row['Nombre'];?></u></h1> </center> 
			<p><b>Fecha Inicio: </b><?php echo $row['FechaInicio'];?></p>
			<p><b>Fecha Fin: </b><?php echo $row['FechaFin'];?></p>
			<p><b>Descripcion: </b><?php echo $row['Descripcion'];?></p>
			<p><b>Ponente: </b><?php echo $row['Ponente'];?></p>
<?php
		}


	function lista_espera($id)
	{

		include("conexion.php");
		$sql_query = "Select usuario.Dni,usuario.UsuarioUco,lista_espera.Fecha_ingreso from lista_espera,usuario where lista_espera.Dni=usuario.Dni and lista_espera.IdCurso='$id' order by lista_espera.Fecha_ingreso";
		$resultset = mysqli_query($conn, $sql_query) or die("error base de datos:" . mysqli_error($conn));
?><center> <h1><u>Lista de Usuarios del Curso</u></h1> </center>
<table class="f">
        <thead>
</br></br>
          <tr>
                <th scope="">Dni</th>
                <th>Usuario Uco</th>
                <th>Fecha de Ingreso en lista</th>
</tr> 
            
        </thead>
        <tbody>
			<?php
		while ($row = mysqli_fetch_assoc($resultset)) {
			?>
			<tr>
			<td> <?php echo $row['Dni'];?> </td>
			<td> <?php echo $row['UsuarioUco'];?> </td>
			<td> <?php echo $row['Fecha_ingreso'];?> </td>


<?php
		}
	}

		function listarcursos(){
			$sql=sprintf( "Select * from cursos" );
			return $sql;
		}

		function nparticipantes($id){
			$sql=sprintf( "Select count(cursousuario.Dni) cuenta from cursousuario,cursos where cursousuario.IdCurso=cursos.Id 
			and cursousuario.IdCurso='$id' group by(cursousuario.IdCurso)" );
			return $sql;
		}

};
?>