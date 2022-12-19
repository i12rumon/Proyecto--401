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
          <a class="navbar-brand" href="menu-coordinadorcursos.php"><h4><em>Coordinador de recursos</em></h4></a>
          <button class="toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="menu-coordinadorcursos.php">Home</a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="seleccionar_curso.php">Asignar recursos</a>
              </li> 
              <li class="nav-item">
              <a class="nav-link" href="cerrar.php">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
   
</header>
   
</header>
<?php
include ("conexion.php");
        $curso = $_GET['olo'];
        $sql_query="Select * from recursos, curso_recurso where recursos=id and curso='$curso'";
        $resultset = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_assoc($resultset);
        $_SESSION["idcurso"]=$curso;
?>

</br>
</br>
</br></br>
   <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
   <div class="container">
  

    <form id="formregistro" action="actualizarrecursos.php" method="post" 
    enctype="multipart/form-data"  >
 

    <h1><center>Asignando recursos</center></h1>


  <div class="form-group">
    <label for="nombre"><b>Aulas *</b></label>
    <input type="text"  class="form-control" id="aulas" name="aulas" value="<?php echo $row['id']; ?>" required >
    </div>

    <div class="form-group">
    <label for="nombre"><b>Aforo *</b></label>
    <input type="text"  class="form-control" id="aforo" name="aforo" value="<?php echo $row['aforo']; ?>" required >
    </div>

    <div class="form-group">
    <label for="nombre"><b>Cámaras *</b></label>
    <input type="text"  class="form-control" id="camaras"" name="camaras" value="<?php echo $row['camaras']; ?>" required >
    </div>

    <div class="form-group">
    <label for="id"><b>Proyector *</b></label>
    <input type="text"  class="form-control" id="proyectores" name="proyectores" value="<?php echo $row['proyectores']; ?>" required >       
    </div>



     <div class="d-grid gap-2 d-md-block">
     <button class="btn btn-primary" name="Enviara" type="submit">Confirmar</button>
  <button class="btn btn-danger" onclick="location.href='seleccionar_curso.php'" type="button">Cancelar</button>

</div>
   <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
 

   </form>

   
   <?php 
       if (isset($_REQUEST['Enviara']))
       {
        include("actualizarrecursos.php");
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

