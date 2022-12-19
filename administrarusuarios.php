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


  <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
   
  <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td, tr {
  padding: 8px;
  text-align: center;
  border-bottom: 1px solid #ddd;
}
th {
  background-color: #000000;
  color: white;
}

tr:hover {background-color: grey;}

em{
  box-sizing: content-box;
width: 100%;
}

</style>



  </head> 
    
<?php
      //mantener este encabezado y menu en todas las páginas 
      include ('encabezado.php');
      
      //Barra de navegación para mostrar información sobre : nombre de usuario registrado, fecha y hora de conexión, ip 
      
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport", content="width=device-width", user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0>

    <title>Cursos UCO</title>

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
              <li class="nav-item active">
                <a class="nav-link" href="administrarusuarios.php">Administrar usuarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="vercursos.php">Cursos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="crearcurso.php">Crear Cursos</a>
              </li>
              <li class="nav-item">
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

<script type="text/javascript">
function confirmacion() 
     {
        var respuesta =confirm("Seguro que desea dar de alta a este usuario?");
 if (respuesta ==true) {
     return true;
  }
  else
  {
   return false;
  }}
</script>

<script type="text/javascript">
function confirmacion2() 
     {
        var respuesta =confirm("Seguro que desea dar de baja a este usuario?");
 if (respuesta ==true) {
     return true;
  }
  else
  {
   return false;
  }}
</script>

<div >    
   <center> <h2>Elija el usuario</h2> </center>     
    <table class="f">
        <thead>
</br></br>
          <tr>
                <th scope="">Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th> </th>
                <th> </th>
                <th> </th>
</tr> 
            
        </thead>
        <tbody>
 
            <?php 
            include ('conexion.php');
            include("clases\usuario.php");
            include("clases\administrador.php");
            $admin= new administrador();
            $sql_query= $admin->listarusuarios();
            $resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
            while($row = mysqli_fetch_assoc($resultset)) {
            
 ?>
<tr>
<td> <?php echo $row['Dni'];?> </td>
<td> <?php echo $row['Nombre'];?> </td>
<td> <?php echo $row['Correo'];?> </td>

<td><a href="listarcursos.php?id=<?php echo $row["Dni"];?>" class="btn btn-primary" onclick="return confirmacion()">Alta</a></td>

<td><a href="listarcursos2.php?id=<?php echo $row["Dni"];?>" class="btn btn-danger" onclick="return confirmacion2()">Baja</a></td>

<td><a href="modificarusuario.php?id=<?php echo $row["Dni"];?>" class="btn btn-success">Modificar</a></td>

</tr>

 <?php } mysqli_free_result($resultset);?>


       
        </tbody>
    </table>    
</div>

 <!-- Enlaces a los servidores de BOotstrap Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>