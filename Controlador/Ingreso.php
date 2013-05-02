<?php
header("Content-Type: text/html;charset=ISO-8859-1");  
session_start();
error_reporting(0);
include '../Modelo/Clase_Persona.php';
$_SESSION["usuario"]=$_POST["usuario"];
$_SESSION["contrasena"]=$_POST["contrasena"];
$a = new Persona();
echo $a->ingreso($_SESSION["usuario"], $_SESSION["contrasena"]);
?>
