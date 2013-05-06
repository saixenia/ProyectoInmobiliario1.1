<?php
header('Content-Type: text/html;charset=ISO-8859-1');  
$salida = $_POST["salida"];
if ($salida==1) {
$a = new Persona();
$a->salir();
}


?>
