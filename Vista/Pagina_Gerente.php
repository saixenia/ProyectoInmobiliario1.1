<?php
header("Content-Type: text/html;charset=ISO-8859-1");  
//session_start();
//include_once '../Modelo/Clase_Persona.php';
//$r=new Persona();
//$r->ingreso();
?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Gerencia</title>
        <link rel='stylesheet' href='../recursos/css/estilos.css'/>
        <script src="../recursos/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="../recursos/js/funciones.js">  
        </script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div id="cabecera" align=center></div>
        <div id="menu">
            <input type="button" value="Inmuebles" onclick="acciones_sadministradorI('boton1')"/><br>
            <input type="button" value="Ventas" onclick="acciones_gerente('v','')"/><br>
            <input type="button" value="Rentas" onclick="acciones_gerente('r','')"/><br>
            <input type="button" value="Salir" onclick="salir()"/>
        </div>
        <div id="contenedor" >
        </div>

    </body>
</html>
