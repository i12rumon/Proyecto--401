<?php 
session_start(); 
ob_start();
?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
   <!-- Bootstrap Validator -->
    

	<link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
   

  </head>
  <body>
  	<?php
  	  //mantener este encabezado en todas las páginas 
  	  include ('encabezado.php');
      include ('barramenu2.php');
     ?>
  <?php
 include ('conexion.php');
      $dni = $_GET['Dni'];
      
      $query="select * from usuario where Dni='$dni';";
      

      $result= mysqli_query($conn,$query);
      $row = mysqli_fetch_assoc($result);
      mysqli_close ($conn);
      ?>
   <!-- capa contenedor con los elementos del formulario de Registro de Usuarios -->
   <div class="container">
  

    <form id="formregistro" action="editarusuario.php" method="post" 
    enctype="multipart/form-data"  >
 
 <!-- capa ID del usuario -->     
  <div class="form-group">
    <label for="nombre"><b>Id de usuario a cambiar:</b></label>
    <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['IdUsuario'];?>" readonly >
             
    </div>
  <!-- capa Nombre del usuario -->   	
  <div class="form-group">
    <label for="nombre"><b>Nombre Usuario *</b></label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['NomUsuario'];?>" required >
             
    </div>
  <!-- capa clave del usuario -->
   <div class="form-group">
    <label for="clave"><b>Clave *</b></label>
    <input type="text" class="form-control" id="clave" name="clave" value="<?php echo $row['Clave'];?>" required>
     <div class="invalid-feedback"></div>
    </div>
   
   <!-- capa repetir clave -->
  <div class="form-group">
    <label for="Reclave"><b>Confirmar Clave *</b></label>
    <input type="text" class="form-control" id="Reclave" name="Reclave" value="<?php echo $row['Clave'];?>" required>
     <div class="invalid-feedback"></div>
  </div>
   
   <!-- capa email -->
   <div class="form-group">
    <label for="email"><b>Email *</b></label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?php echo $row['Email'];?>" required>
    <div class="invalid-feedback">Email debe ser válido</div>
   </div>
  

  <!-- Si el sexo era hombre(0) se pone como opcion por defecto la primera opcion -->
<?php
if ($row['Sexo']==0){
  echo "
   <div class='form-check-inline'>
    <label for='sexo'><b>Sexo  *</b>  </label>&nbsp; &nbsp; &nbsp; &nbsp;
    <input class='form-check-input' type='radio' name='sexo' id='exampleRadios1' value='0' checked>
    <label class='form-check-label' for='exampleRadios1'>    Hombre   </label>
  &nbsp; &nbsp; &nbsp; &nbsp;
    <input class='form-check-input' type='radio' name='sexo' id='exampleRadios2' value='1'>
    <label class='form-check-label' for='exampleRadios2'>
    Mujer
   </label>
   <div class='invalid-feedback'></div>
   </div>";

}
else{
  echo "
 <div class='form-check-inline'>
    <label for='sexo'><b>Sexo  *</b>  </label>&nbsp; &nbsp; &nbsp; &nbsp;
    <input class='form-check-input' type='radio' name='sexo' id='exampleRadios1' value='0' >
    <label class='form-check-label' for='exampleRadios1'>    Hombre   </label>
  &nbsp; &nbsp; &nbsp; &nbsp;
    <input class='form-check-input' type='radio' name='sexo' id='exampleRadios2' value='1' checked>
    <label class='form-check-label' for='exampleRadios2'>
    Mujer
   </label>
   <div class='invalid-feedback'></div>
   </div>";

};
?>
   <!-- capa con fecha de nacimiento --> 
   <div class="form-group">
    <label for="fechanac"><b>Fecha nacimiento  *</b></label>
    <input type="date" class="form-control" id="fechanac" name="fechanac" value="<?php echo $row['Fnacimiento'];?>" required >
    <div class="invalid-feedback">Fecha debe ser válida</div>
   </div>

   <!-- capa con Ciudad -->
    <div class="form-group">
    <label for="ciudad"><b>Ciudad  </b></label>
    <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $row['Ciudad'];?>">
    <div class="invalid-feedback">La ciudad debe ser válida</div>
    </div>
   <!--capa para Mostrar los Paises almacenados en la tabla Paises de la base de datos PIBd--> 
    <div class="form-group">
    <label for="pais"><b>Pais *</b></label>
    <select class="form-control" id="pais" name="Pais" value="<?php echo $row['Pais'];?>">
    	<?php 
    	/* conecta con la base de datos PIBD de Mysql */
    	include ("conexion.php");
    	/* construir la consulta que me devuelve los paises-- pero no lanzo la 
    	   petición a MYSQL  */ 
    	$query='Select * from paises';
    	/* Lanzo la consulta a MYSQL y los resultados de la consulta los almacena en 
    	    $result. $result es una zona de memoria virtual donde se almacenan las filas que ha devuelto la consulta definida en $query */
		$result= mysqli_query($conn,$query);
		 /* entra en un bucle y en cada iteración del bucle recupera una fila de $result 
		 En $row tengo un array asociativo donde cada campo es una columna de la consulta*/ 
			while($row = mysqli_fetch_assoc($result)) {
        		
        		echo "<option value=".$row['IdPais'].">".$row['NomPais']."</option>";}
          //cierra conexión 

          mysqli_close ($conn);  
        ?>

    </select>
    <div class="invalid-feedback"></div>
  </div>


   <!-- Botón para enviar fotos -->
   <button type="submit" class="btn btn-success" name="Enviar" value="<?php echo $row['Foto'];?>">Enviar</button>
   </form>

   
   <?php 
       if (isset($_REQUEST['Enviar']))
       { 
       	   // banderas a valor 0 indican errores, a valor 1 indican correcto 
       	    
       	   $clavevalida=1;
       	   $errores=array();
       	   //validación: el nombre de usuario debe ser único. 
       	  
       	  
       	  // Validación: comprueba que la clave y confirmación de clave  coinciden 
       	  if ($_REQUEST['clave']!=$_REQUEST	['Reclave'])
       	    {   array_push ($errores,'Las claves deben de coincidir');
                $clavevalida=0; };
          if ($clavevalida==1)
          	{
       	    include ('actualizarusuario.php');
            header("location: ./menu-administrador.php");

            
       	    	}; 
       	    ?>
       	  <ul class="text text-error">
          <?php foreach($errores as $key => $error): ?>
              <li> <?php echo "<p class='form-control'style='color: red;'>".$error."</p"; ?> </li>
          <?php endforeach; ?>
       	</ul> 
       	<?php   };    		?>
   
       	 </div>
   
    <!-- Enlaces a los servidores de BOotstrap Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>


  </body>
</html>
<?php
ob_end_flush();
?>