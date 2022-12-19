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
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

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
  <body>
     <!-- ***** Preloader Start ***** -->
     <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->


<?php
session_start();
?>
  
    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><h4><em><?php echo "Bienvenido/a ".$_SESSION['nombreusuario']?>"</em></h4></a>
          <button class="toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index-usuario.php">Home</a>
              </li> 
              <li class="nav-item">
              <a class="nav-link" href="cerrar.php">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
   
</header>


<main>

<div >    
   <center> <h2>Elija el curso</h2> </center>     
    <table class="f">
        <thead>
</br></br>
          <tr>
                <th scope="">Nombre</th>
                <th>FechaInicio</th>
                <th>FechaFin</th>
                <th> </th>
                <th> </th>
   
</tr> 
            
        </thead>
        <tbody>

        <?php 
      /* conecta con la base de datos PIBD de Mysql */
            include ("conexion.php");
            include("clases\curso.php");
            $curso1= new curso();
           $sql_query= $curso1->listarcursos();
            $resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
            while($row = mysqli_fetch_assoc($resultset)) {
            
 ?>
<tr>
<td> <?php echo $row['Nombre'];?> </td>
<td> <?php echo $row['FechaInicio'];?> </td>
<td> <?php echo $row['FechaFin'];?> </td>
<?php
                   $user2=$_SESSION['idusuario'];
                   $id2=$row['Id'];
                   $sql2="select * from cursousuario where Dni='$user2' and IdCurso='$id2'";
                    $resultado2=mysqli_query($conn,$sql2);?>
                  <td>  <a href="mostrardetalles.php?id=<?php echo $row["Id"]; ?>" class="btn btn-dark">Detalles</a></td><?php
                  
                  $sql4="select * from lista_espera where Dni='$user2' and IdCurso='$id2'";
                  $resultado4=mysqli_query($conn,$sql4);
                  if(mysqli_num_rows($resultado4) > 0){ ?>
                   <td> <button type="button" class="btn btn-warning">En lista</button>
                  </td>
                   <?php  }else{
                                if (mysqli_num_rows($resultado2) == 0){?>
                                    <td> <a href="unirse_usuario.php?id=<?php echo $row["Id"]; ?>" class="btn btn-success">Unirse</a></td><?php
                               }else{?>
                                    <td><button type="button" class="btn btn-info">Apuntado</button>
                                  </td>
                                    
                                <?php  }
                  
                               }?>
</tr>
 <?php } mysqli_free_result($resultset);?>


       
        </tbody>
    </table>    
</div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
</div>
</footer>

<script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor2/jquery/jquery.min.js"></script>
    <script src="vendor2/bootstrap/js/bootstrap.bundle.min.js"></script>

    
    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>

<!-- Enlaces a los servidores de BOotstrap Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
   


  </body>
</html>
