<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Imagenes/uco_logo.png">

    <title>Acceso al Sistema</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"></link>


    <!-- Custom styles for this template -->
    <link href="CSS/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="acceso.php">
      <img class="mb-4" src="Imagenes/uco.png" alt="" width="250" height="150">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión </h1>
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="usuario@uco.es" required autofocus name="correo">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Constraseña" required name="Password">
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="Enviar">Entrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>


     <?php 
    
     
        if (isset($_REQUEST["Enviar"]))
        {
          include("clases\usuario.php");
          $correo=$_REQUEST['correo'];
          $pass=$_REQUEST['Password'];
          $user = new usuario();
          $user->iniciarsesion($correo,$pass);
        }

     ?> 

    </form>
  </body>
</html>