<?php
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
        $id_usuario = $_GET['id'];
        $sql_query="Select * from usuario where Dni ='$id_usuario'";
        $resultset = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_assoc($resultset);
        $_SESSION["dni"]=$id_usuario;
?>
</br>
</br>
</br></br>
   <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
   <div class="container">
  

    <form id="formregistro" action="actualizarusuario.php" method="post" 
    enctype="multipart/form-data"  >
 

    <h1><center>Modificando usuario</center></h1>
  <!-- capa NOmbre del usuario --> 

  <div class="form-group">
    <label for="id"><b>Dni *</b></label>
    <input type="text" placeholder="Dni" class="form-control" id="dni" name="dni" value="<?php echo $row['Dni']; ?>" required >       
    </div>


  <div class="form-group">
    <label for="nombre"><b>Nombre *</b></label>
    <input type="text" placeholder="Nombre" class="form-control" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" required >
    </div>


    <div class="form-group">
    <label for="nombre"><b>Apellidos *</b></label>
    <input type="text" placeholder="Apellidos" class="form-control" id="apellidos" name="apellidos" value="<?php echo $row['Apellidos']; ?>" required >
    </div>

    <div class="form-group">
    <label for="nombre"><b>Usuario Uco *</b></label>
    <input type="text" placeholder="Nombre de usuario" class="form-control" id="usuario" name="usuario" value="<?php echo $row['UsuarioUco']; ?>" required >
    </div>

    <div class="form-group">
    <label for="nombre"><b>Correo Uco *</b></label>
    <input type="text" placeholder="@uco.es" class="form-control" id="correo" name="correo" value="<?php echo $row['Correo']; ?>" required >
    </div>

    <div class="form-group">
    <label for="nombre"><b>Contraseña *</b></label>
    <input type="text" placeholder="Contraseña" class="form-control" id="contraseña" name="contraseña" value="<?php echo $row['password']; ?>" required >
    </div>


     <div class="d-grid gap-2 d-md-block">
     <button class="btn btn-primary" name="Enviara" type="submit">Confirmar</button>
  <button class="btn btn-danger" onclick="location.href='seleccionarcurso.php'" type="button">Cancelar</button>

</div>
   <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
 

   </form>

   
   <?php 
       if (isset($_REQUEST['Enviara']))
       { 
        
       	include ("actualizarusuario.php");
       	
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

