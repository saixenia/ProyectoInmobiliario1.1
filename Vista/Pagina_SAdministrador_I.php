<?php
header("Content-Type: text/html;charset=ISO-8859-1");  
session_start();
include_once '../Modelo/Clase_Persona.php';
$r = new Persona();
$r->ingreso();
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <META HTTP-EQUIV="Content-Type" charset="ISO-8859-1"> 
        <title>Super Administrador I</title>
        <link rel='stylesheet' href='../Recursos/css/estilos.css'/>
        <script type="text/javascript" language="javascript" src="../recursos/jquery/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" language="javascript" src="../recursos/js/funciones_adm1.js"></script>
        <!-- incluyo la libreria jQuery -->
        <script type="text/javascript" src="../recursos/jquery/jquery-1.7.1.min.js"></script>
        <!-- incluyo el framework css , blueprint. -->
        <link rel="stylesheet" type="text/css" href="../recursos/css/screen.css" />
        <!-- incluyo mis estilos css puede joder los estilos de julian -->
        <link rel="stylesheet" type="text/css" href="../recursos/css/style.css" /> 
        <!-- Intento implementar jalert-->
        <link rel="stylesheet" type="text/css" href="../recursos/jalert/jquery.alerts.css"/>
        <script type="text/javascript" src="../recursos/jalert/jquery.alerts.js"></script>
    </head>
    <body>
        <div id="menu">
            <img src="../Recursos/imagenes/xenia_menu.jpg"/><br>
            <input type="button" value="Inmuebles" onclick="acciones_sadministradorI(1)" class="boton"/><br>
            <input type="button" value="Crear Inmueble" onclick="acciones_sadministradorI(2)" class="boton"/><br>
            <input type="button" value="Editar Inmueble" onclick="cargar('')"class="boton"/><br>
            <input type="button" value="Asesores" onclick="acciones_sadministradorI(4)"class="boton"/><br>
            <input type="button" value="Directores" onclick="acciones_sadministradorI(5)"class="boton"/><br>
            <input type="button" value="Salir" onclick="salir()" class="boton"/>
        </div>
<div id ="block"></div>
        <div class="container">
            <div style="float: right;"><a href="Ayuda.php"><img src="../recursos/imagenes/gnome_help.png"></a></div>
            <div id="popupbox"></div>
            <div id="contenedor">
                <?php
                if ($_REQUEST != TRUE) {
                    echo '  
            <h2>&#33Bienvenido a Xenia&#33</h2>
            <p>
                Este es un sistema de informaci&oacuten activo, el cual le va ayudar a mejorar su trabajo, ya que le va a facilitar la gesti&oacuten de su trabajo siguiendo la misi&oacuten de la empresa. 
            </p>
            <h4>Para empezar recomedamos leer los siguientes pasos:</h4>
            <p>
                En la parte izquierda de su pantalla, encontrara un men&uacute con las opciones que puede realizar seg&uacuten su cargo 
            </p>
            <h4><strong> &#191Como Consultar sus inmuebles&#63 </strong></h4>
            <p>
                Dar click en el boton "Inmuebles", luego mostrar&aacute la informaci&oacuten de los inmuebles de la compa&#241ia real estate en tiempo real
            </p>
            <h4><strong>&#191Como Crear uno o varios inmuebles&#63</strong> </h4>
            <p>
                Dar click en el boton "Crear Inmueble", se abrira un formulario para ser diligenciado con los siguientes datos: 
            </p>

            <p>
                - Asesor ñññññOó
            </p>
            <p>
                - Proceso Inmueble
            </p>
            <p>
                - Tipo Inmueble
            </p>
            <p>
                -     C&oacutedigo Inmueble
            </p>
            <p>
                -   Localidad (Opcional)
            </p>
            <p>
               - Barrio (Opcional)
            </p>
            <p>
                - Direcci&oacuten
            </p>
            <p>
                -  Estrato
            </p>
            <p>
                - Precio (Opcional)
            </p>
            <p>
                - Habitaciones (Opcional)
            </p>
            <p>
                - Ba&#241os (Opcional)
            </p>
            <p>
                - Garajes (Opcional)
            </p>
            <p>
                -A&#241os Construido (Opcional)
            </p>
            <p>
                -Piso (Opcional)
            </p>
            <p>
                - Urbanizaci&oacuten (Opcional)
            </p>
            <p>
                - Ascensor (Opcional)
            </p>
            <p>
                - Tipo Vista (Opcional)
            </p>
            <p>
                - Propietario (Opcional)
            </p>
            <p>
                - Tel&eacutefono Propietario (Opcional)
            </p>
            <p>
                - C&oacutedigo Metro Cuadrado
            </p>
            <p>
                -C&oacutedigo Finca Ra&iacutez (Opcional)
            </p>
            <p>
               - C&oacutedigo Viva Real (Opcional)
            </p>
            <p>
                - Observaciones (Opcional)
            </p>
  ';
                }
                ?>
            </div>
        </div>
    </body>
</html>
