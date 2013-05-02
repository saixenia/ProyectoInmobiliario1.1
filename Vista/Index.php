<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
       
<meta http-equiv="Content-Type" content="text" charset="iso-8859-1">
        <title>SAI</title>
         <link rel='stylesheet' href='../Recursos/css/estilos.css'/>
         <script type="text/javascript" language="javascript" src="../recursos/js/log.js"></script>
    </head>
    <body>
      <div id="header"></div>
            <fieldset >
            <legend>Inicio de Sesión</legend>
            <div id="formulario">
            <form name="f" method="POST" >
                <samp id="txtresultado"></samp>
                <p>Documento: <input type="text" name="txtdocumento" maxlength="20" ></p>
                <p>Contraseña: <input type="password" name="txtcontrasena" ></p>
                <p class="centro"><input type="button" value="Inicio" class="botonsesion" onclick='loguea(txtdocumento.value, txtcontrasena.value)'></p>
            </form>
                </div>
        </fieldset>
    </body>
</html>
