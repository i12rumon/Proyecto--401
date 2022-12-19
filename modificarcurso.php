<?php
ob_start();
session_start();
?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
  </head>
  <body>


  <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="menu-administrador.php"><h4><em>Administrador</em></h4></a>
          <button class="toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="menu-administrador.php">Home</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="administrarusuarios.php">Administrar usuarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="vercursos.php">Cursos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="crearcurso.php">Crear Cursos</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="seleccionarcurso.php">Modificar curso</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="cerrar.php">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
   
</header>

<?php
include ("conexion.php");
        $curso = $_GET['olo'];
        $sql_query="Select * from cursos where Id ='$curso'";
        $resultset = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_assoc($resultset);
        $_SESSION["idcurso"]=$curso;
?>
</br>
</br>
</br></br>
   <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
   <div class="container">
  

    <form id="formregistro" action="modificarcurso.php" method="post" 
    enctype="multipart/form-data"  >
 

    <h1><center>Modificando curso</center></h1>
  <!-- capa NOmbre del usuario --> 

  <div class="form-group">
    <label for="id"><b>ID Curso *</b></label>
    <input type="text" placeholder="Id" class="form-control" id="id" name="id" value="<?php echo $row['Id']; ?>" required >       
    </div>

  <div class="form-group">
    <label for="nombre"><b>Nombre Curso *</b></label>
    <input type="text" placeholder="Nombre" class="form-control" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" required >
    </div>


   <!-- Fecha Inicio --> 
   <div class="form-group">
    <label for="fechanac"><b>Fecha inicio  *</b></label>
    <input type="date" class="form-control" id="fechanac" name="fechainc" value="<?php echo $row['FechaInicio']; ?>" required >
    <div class="invalid-feedback">Fecha debe ser válida</div>
   </div>

    <!-- Fecha Final --> 
      <div class="form-group">
    <label for="fechanac"><b>Fecha final  *</b></label>
    <input type="date" class="form-control" id="fechanac" name="fechafin" value="<?php echo $row['FechaFin']; ?>" required >
    <div class="invalid-feedback">Fecha debe ser válida</div>
   </div>

      <!-- Descripcion curso--> 
   <div class="form-group">
    <label for="descripcion"><b>Descripción * </b></label>
    <input type="text" placeholder="Descripcion de la tarea" class="form-control" id="desc" name="desc" value="<?php echo $row['Descripcion']; ?>" required >    <div class="invalid-feedback">Descripción debe ser válida</div>
    </div>

      <!-- capa NOmbre del usuario -->   	
  <div class="form-group">
    <label for="nombre"><b>Ponentes *</b></label>
    <select class="form-control" id="ponentes" name="ponentes">
    	<?php 
    	/* conecta con la base de datos PIBD de Mysql */
    	include ("conexion.php");
    	/* construir la consulta que me devuelve los paises-- pero no lanzo la 
    	   petición a MYSQL  */ 
    	$query='Select * from ponentes';
    	/* Lanzo la consulta a MYSQL y los resultados de la consulta los almacena en 
    	    $result. $result es una zona de memoria virtual donde se almacenan las filas que ha devuelto la consulta definida en $query */
		$result= mysqli_query($conn,$query);
		 /* entra en un bucle y en cada iteración del bucle recupera una fila de $result 
		 En $row tengo un array asociativo donde cada campo es una columna de la consulta*/ ?><?php
     echo "<option selected>".$row['Ponente']."</option>";
			while($row = mysqli_fetch_assoc($result)) {
        		echo "<option value=".$row['Nombre'].">".$row['Nombre']."</option>";}
          //cierra conexión 

        ?>

    </select>
    <div class="invalid-feedback"></div>
  </div>

   

     <div class="d-grid gap-2 d-md-block">
     <button class="btn btn-primary" name="Enviada" type="submit">Confirmar</button>
  <button class="btn btn-danger" onclick="location.href='seleccionarcurso.php'" type="button">Cancelar</button>

</div>
   <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
 

   </form>

   
   <?php 
       if (isset($_REQUEST['Enviada']))
       { 
       
        $nombre=$_REQUEST['nombre'];
        $fecha_inicio=$_REQUEST['fechainc'];
        $fecha_final=$_REQUEST['fechafin'];
        $descripcion=$_REQUEST['desc'];
        $ponentes=$_REQUEST['ponentes'];
        $id=$_REQUEST['id'];


        include ('clases\usuario.php');
        include ("clases\coordinadorcursos.php");
        $curso1=new coordinadorcursos('f','f');
        $curso1->modificar_curso($id,$nombre,$descripcion,$fecha_inicio,$fecha_final,$ponentes);
       	header("location: ./menu-administrador.php");	
          }; 
                  
       	    ?>


   
       	 </div>
   
    <!-- Enlaces a los servidores de BOotstrap Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>


  </body>
</html>

