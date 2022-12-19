<?php 
// fichero con los parámetros de la conexión 
session_start();
include ("conexion.php");
$Id = $_SESSION['idusuario'];
$curso=$_GET['curso'];

// preparamos la variable $query con la instrucción Sql  para insertar los datos recogidos del formulario de registro de usuarios , en la tabla Usuarios de la Base de datos PIBD. La función que recoge la marca temporal es current_time
$sql2="select * from cursousuario where Dni='$Id' and IdCurso='$curso'";
                    $resultado2=mysqli_query($conn,$sql2);
                   
                   if (mysqli_num_rows($resultado2) > 0){
                     $query="DELETE FROM cursousuario WHERE Dni='$Id' and IdCurso='$curso'";
                     $result= mysqli_query($conn,$query);
                    mysqli_close ($conn);
                    echo "<center><p class='form-control'style='color: red;'>Usuario borrado con éxito</p></center>";
                    header("refresh:2;url=administrarusuarios.php"); 
                   }else{
                    
                    echo "<center><p class='form-control'style='color: red;'>Usuario no está inscrito en el curso, no se puede borrar</p></center>";
                    header("refresh:2;url=administrarusuarios.php"); 
                   }
                    



// lanzamos la instrucción SQL par insertar .. Si generase un error se mostraría el mensaje ERROR. 

?>