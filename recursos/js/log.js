function AjaxObj(){
    var xmlhttp = null;

    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();

        if (xmlhttp.overrideMimeType)
        {
            xmlhttp.overrideMimeType('text/xml');
        }
    }
    else if (window.ActiveXObject)
    { 
        // Internet Explorer    
        try
        {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                xmlhttp = null;
                alert("navegador no compatible");
            }
        }
	
        if (!xmlhttp && typeof XMLHttpRequest!='undefined')
        {
            xmlhttp = new XMLHttpRequest();
	  
            if (!xmlhttp)
            {
                failed = true;
            }
        }
    }
    return xmlhttp;
}
function loguea(usuario, contrasena){
    //valido que las cajas de texto tengan datos
    if (usuario.length==0 || contrasena.length==0) {
        document.getElementById("txtresultado").innerHTML="Llene el campo...";
        if (usuario.length==0) {
            f.txtdocumento.focus();
        }else{
            f.txtcontrasena.focus();
        }
    }else{
        var url = "../Controlador/Ingreso.php";
        var ajax = new AjaxObj();
        ajax.open("POST", url, false);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("usuario="+usuario + "&contrasena="+ contrasena);
        var roll = ajax.responseText;
        switch(roll){
            case "S.Administrador_I":{
                document.location="../Vista/Pagina_SAdministrador_I.php";
                break;
            }
            case "S.Administrador_II":{
                document.location="../Vista/Pagina_SAdministrador_II.php";
                break;
            }
            case "Administrativo":{
                document.location="../Vista/Pagina_Administrativo.php";
                break;
            }
            case "Gerente":{
                document.location="../Vista/Pagina_Gerente.php";
                break;
            }
            case "Director":{
                document.location="../Vista/Pagina_Director.php";
                break;
            }
            case "Asesor":{
                document.location="../Vista/Pagina_Asesor.php";
                break;
            }
            default:{
                document.getElementById("txtresultado").innerHTML=ajax.responseText;// aki lo imprimo en el contenedor html sin que cambie de pagina
                break;    
            }
        }
    }
}

