<?php
header("Content-Type: text/html;charset=ISO-8859-1");  
require '../Modelo/Clase_Persona.php';
$ntabla1 = $_POST["nomtabla1"];
$ntabla2 = $_POST["nomtabla2"];
$u = new Persona();
$u->cargarselect($ntabla1, $ntabla2);
//echo $ntabla1."----------".$ntabla2;
?>
