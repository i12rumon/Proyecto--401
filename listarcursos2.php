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
   

  </head> 
    
<?php
      //mantener este encabezado y menu en todas las páginas 
      include ('encabezado.php');
      //include ('barramenu2.php');
      //Barra de navegación para mostrar información sobre : nombre de usuario registrado, fecha y hora de conexión, ip 
      
?>
<script type="text/javascript">
function confirmacion() 
     {
        var respuesta =confirm("Desea seguir?");
 if (respuesta ==true) {
     return true;
  }
  else
  {
   return false;
  }}
</script>

<div class="container home">    
   <center> <h2>Elija el curso</h2> </center>     
    <table id="data_table" class="table table-striped">
        <thead>
            <tr>
                <th scope="">Curso</th>
                <th></th>
                
               
            </tr>
        </thead>
        <tbody>
 
            <?php 
             include ('conexion.php');
             $dni = $_GET['id'];
            $sql_query = "SELECT * FROM cursos";
            
            $resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
            while($row = mysqli_fetch_assoc($resultset)) {
             
 ?>
<tr>
<td> <?php echo $row['Nombre'];?> </td>
<?php
                   $_SESSION['idcurso']=$row['Id'];
                   $_SESSION['idusuario']=$dni;
                   $cursof=$row['Id'];
                  
                  ?>
                     <td><a href="unirseusuario2.php?curso=<?php echo $cursof;?>" class="btn btn-danger">Baja</a></td>
                     
            
                   
                    <?php

                  $sql2="select * from cursousuario where Dni='$dni' and IdCurso='$cursof'";
                  $resultado2=mysqli_query($conn,$sql2);
    
?>
      
        </td>
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