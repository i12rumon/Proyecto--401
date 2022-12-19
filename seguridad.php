<?php

session_start(); 
if(!isset($_SESSION['nombreusuario'])){
  header('Location:index2.php');
}
session_abort();

?>