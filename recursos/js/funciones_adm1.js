
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
                jAlert("navegador no compatible");
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
function acciones_sadministradorI(boton){
    var url = "../Controlador/AdministradorI.php";
    var ajax = new AjaxObj();
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("boton="+boton+"&valores="+"0");
    var i = ajax.responseText;
    switch(boton){
        case 1:{
            /*
                 *Carga los inuebles disponibles 
                 **/
            document.getElementById("contenedor").innerHTML=i;
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();
            
            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            break;
        }
        case 2:{
            /*
                 *Crea los inmuebles
                 **/
            document.getElementById("contenedor").innerHTML=i;
            break;
        }
        case 3:{
            
            break;
        }
        case 4:{
            document.getElementById("contenedor").innerHTML=i;
            break;
        }
        case 5:{
            document.getElementById("contenedor").innerHTML=i;
            break;
        }
        case 6:{
            jAlert(6);
            break;
        }
        case 7:{
            jAlert(7);
            break;
        }
    }
}
function seleccion(nomtabla1, nomtabla2, n){
    /*
     *Creada para cargar la informacion de un select
     **/
    var url = "../Controlador/seleccion.php";
    var ajax = new AjaxObj();
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("nomtabla1="+nomtabla1+"&nomtabla2="+nomtabla2);
    var rpt = ajax.responseText;
    if(n=='txt_codigo'){
        //        jAlert("numero "+ nomtabla2 + "caja de texzto : "+ n);
        document.getElementById('txt_codigo').value = rpt ;
    }else{
        for(var s="a";s<"z";s++){
            if(s=n){
                document.getElementById(n).innerHTML = rpt ;
            }
        }
    }
//document.getElementById("sd").innerHTML = rpt;
}
// Prueba Julian
function valida_letras(o,a){
    /*
     *Valida que los datos que se estan ingresando sean letras
     **/
    //var x = o.keyCode;
    var x = o.which;
    if(x>=97 && x<=122){
        document.getElementById(a).innerHTML="";
        return x;
    }else{
        document.getElementById(a).innerHTML="Solo leras ";
        return false;
    }
}
function valida_numeros(o,a){
    /*
     *Valida que los datos que se estan ingresando sean numeros
     **/
    //var x = o.keyCode;
    var x = o.which;
    if(x>=48 && x<=57){
        document.getElementById(a).innerHTML="";
        return x;
    }else{
        document.getElementById(a).innerHTML="Solo numeros ";
        return false;
    }
}
function valida_campo(ncampo,sp){
    /*
     *Valida los campos obligatorios
     **/
    if((sp=="") || (sp==0) ){
        document.getElementById(ncampo).innerHTML="*Requerido";
        return false;
    }else{
        document.getElementById(ncampo).innerHTML="";
        return sp;
    }
}
function crear_inmueble(){
    /*
     *Se genera script de crear inmueble y se envia al controlador, se espera 
     *respuesta delservidor}
     **/
    var asesor = a.value;
    var proceso = b.value;
    var tipo = c.value;
    var localidad = d.value;
    var barrio = bar.value;
    var estrato = slestrato.value;
    var cfincaraiz = txt_cfincaraiz.value;
    var cvivareal = txt_cvivareal.value;
    var observaciones = txt_observaciones.value;
    var publicidad = slpubli.value;
    var arealote = txt_arealote.value;
    var administracion = txt_admin.value;
    var garajes = txt_garajes.value;
    var codigo = txt_codigo.value;
    var urbanizacion = txt_urbanizacion.value;
    var ascensor = txt_ascensor.value;
    var acontruida = this.valida_campo("ac", txt_areacons.value);
    var precio = this.valida_campo("pc", txt_precio.value);
    var habitaciones = this.valida_campo("hb", txt_habitaciones.value);
    var banos = this.valida_campo("bn", txt_banos.value);
    var tconstruido = this.valida_campo("an", txt_tconstruido.value);
    var pisos = this.valida_campo("ps", txt_piso.value);
    var tvista = this.valida_campo("tv", txt_tvista.value);
    var npropietario = this.valida_campo("np", txt_npropietario.value);
    var tpropietario = this.valida_campo("tp", txt_tpropietario.value);
    var cmetrocuadrado = this.valida_campo("cm", txt_cmetrocuadrado.value);
    var direccion = "";//para dir
    if (this.valida_campo("dir", txt_direccion_a.value)==false){
        alert("Es requerida la Direcci\u00f3n completa");
        direccion = "";
    }else{
        if (this.valida_campo("dir", txt_direccion_c.value)==false){
            alert("Es requerida la Direcci\u00f3n completa");
            direccion = "";
        }else{
            if (this.valida_campo("dir", txt_direccion_e.value)==false){
                alert("Es requerida la Direcci\u00f3n completa");
                direccion = "";
            }else{
                direccion ='"' + sltidir.value + " " + txt_direccion_a.value + " " + txt_direccion_b.value + " " + txt_direccion_c.value + " " + txt_direccion_d.value + " " + txt_direccion_e.value + '"';
            } 
        }
    }
    if((acontruida == false) || (precio == false) || (habitaciones == false) || (banos == false)  || (tconstruido == false) || (pisos == false)  || (tvista == false) || (npropietario == false)|| (tpropietario == false) || (cmetrocuadrado == false) || (direccion == "")){
        jAlert("Error al Guardar,hace falta informaci\u00f3n (Requerido)");
    }else{
        var script = "(" + tipo + ", "+ proceso +", "+asesor+", "+barrio+", "+localidad+", '"+codigo+"', '"+npropietario+"', '"+tpropietario+"', "+publicidad+", '"+cvivareal+"', '"+cfincaraiz+"', '"+cmetrocuadrado+"', "+ascensor+", "+banos+", "+habitaciones+", "+direccion+", "+pisos+", '"+acontruida+"', "+garajes+", '"+arealote+"', "+estrato+", "+administracion+", "+precio+", "+acontruida+", '"+tvista+"', '"+urbanizacion+"', '"+observaciones+"')";
        var url = "../Controlador/AdministradorI.php";
        var ajax = new AjaxObj();
        ajax.open("POST", url, false);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("boton="+7+"&valores="+script);
        var i = ajax.responseText;
        jAlert(i);
    }
}
function cargar(id){
    /*
     *posiblemente toque borrar
     **/
    var url = "../Controlador/AdministradorI.php";
    var ajax = new AjaxObj();
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("boton="+"3"+"&valores="+id);
    var i = ajax.responseText;
    document.getElementById("contenedor").innerHTML=i;
}
function editar (){
    /*
     *editar
     **/
    var codigo = document.getElementById("codigo").value;
    var tipo = document.getElementById("tipo").value; //por el momento no se podran editar ya que se requiere un selct
    var asesor = document.getElementById("asesor").value;//*
    var estado = document.getElementById("estado").value;//*
    var estrato = document.getElementById("estrato").value;
    var cfincaraiz = document.getElementById("fraiz").value;
    var cvivareal = document.getElementById("vreal").value;
    var observaciones = document.getElementById("obser").value;
    var arealote = document.getElementById("lote").value;
    var administracion = document.getElementById("admon").value;
    var garajes = document.getElementById("garajes").value;
    var urbanizacion = document.getElementById("urbanizacion").value;
    var acontruida = document.getElementById("aconstruida").value;
    var precio = document.getElementById("precio").value;
    var habitaciones = document.getElementById("habitaciones").value;
    var banos = document.getElementById("banos").value;
    var tconstruido = document.getElementById("construidotiempo").value;
    var pisos = document.getElementById("pisos").value;
    var tvista = document.getElementById("tipovista").value;
    var cmetrocuadrado = document.getElementById("mcuadrado").value;
    var script ="Estrato="+estrato;
    script = script + ", Cod_FincaRaiz = '"+ cfincaraiz + "'";
    script = script + ", Cod_VivaReal = '" + cvivareal + "'";
    script = script + ", Observaciones = '"+observaciones + "'";
    script = script + ", Area_Lote = '" + arealote + "'";
    script = script + ", Administracion = '"+administracion + "'";
    script = script + ", Garajes = '"+ garajes + "'";
    script = script + ", Nombre_Urbanizacion = '" + urbanizacion + "'";
    script = script + ", Area_Construida = '" + acontruida + "'";
    script = script + ", Precio = '" + precio + "'";
    script = script + ", Habitaciones = '" + habitaciones + "'";
    script = script + ", Banos = '" + banos + "'";
    script = script + ", Anos_Construido = '" + tconstruido + "'";
    script = script + ", Piso = '" + pisos + "'";
    script = script + ", Tipo_de_Vista = '" + tvista + "'";
    script = script + ", Cod_MetroCuadrado = '" + cmetrocuadrado + "'";
    script = script + " WHERE Codigo = '" + codigo + "'";
    var url = "../Controlador/AdministradorI.php";
    var ajax = new AjaxObj();
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("boton="+"6"+"&valores="+script);
    var i = ajax.responseText;
    document.getElementById("mensaje").innerHTML = i;
}
function editarasesor (){
    /*
     *Edita el asesor
     **/
    var id = document.getElementById("id").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var documento = document.getElementById("documento").value;
    var direccion = document.getElementById("direccion").value;
    var epersonal = document.getElementById("epersonal").value;
    var empresarial = document.getElementById("empresarial").value;
    var telefono = document.getElementById("telefono").value;
    var celular = document.getElementById("celular").value;
    var especializacion = document.getElementById("especializacion").value;
    var estado = document.getElementById("estado").value;
    
    var script = "";
    script = script + "Nombre = '" + nombre + "'";
    script = script + ", Apellido = '" + apellido + "'";
    script = script + ", Documento = '" + documento + "'";
    script = script + ", Direccion = '" + direccion + "'";       
    script = script + ", Email_Personal = '" + epersonal + "'";
    script = script + ", Email_Empresarial = '"+ empresarial + "'";
    script = script + ", Telefono = '" + telefono + "'";
    script = script + ", Celular = '" + celular + "'";
    script = script + ", Especializacion = '" + especializacion + "'";
    script = script + ", Estado = '" + estado + "' ";
    script = script + " WHERE id_Usuario = '" + id + "'";
    
    var url = "../Controlador/AdministradorI.php";
    var ajax = new AjaxObj();
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("boton="+"9"+"&valores="+script);
    var i = ajax.responseText;
    document.getElementById("mensaje").innerHTML = i;
}
function borrar_inmo(id){
    var url = "../Controlador/AdministradorI.php";
    var ajax = new AjaxObj();
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("boton="+"10"+"&valores="+id);
    var i = ajax.responseText;
    document.getElementById("popupbox").innerHTML = i;
    $('#block').show();
    $('#popupbox').show();
}
function borrar_asesor (id){
    var url = "../Controlador/AdministradorI.php";
    var ajax = new AjaxObj();
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("boton="+"11"+"&valores="+id);
    var i = ajax.responseText;
    document.getElementById("popupbox").innerHTML = i;
    $('#block').show();
    $('#popupbox').show();
}
$(document).ready(function(){ //cuando el html fue cargado iniciar

    $('.edit').live('click',function(){
        /*
         *Permite editar el inmueble seleccionado
         **/
        var id=$(this).attr('data-id');
        var url = "../Controlador/AdministradorI.php";
        var ajax = new AjaxObj();
        ajax.open("POST", url, false);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("boton="+"3"+"&valores="+id);
        var i = ajax.responseText;
        document.getElementById("popupbox").innerHTML = i;
        $('#block').show();
        $('#popupbox').show();
    })
    
    $('.edito').live('click',function(){
        /*
         *Permite editar el asesor seleccionado
         **/
        var id=$(this).attr('data-id');
        var url = "../Controlador/AdministradorI.php";
        var ajax = new AjaxObj();
        ajax.open("POST", url, false);
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("boton="+"8"+"&valores="+id);
        var i = ajax.responseText;
        document.getElementById("popupbox").innerHTML = i;
        $('#block').show();
        $('#popupbox').show();
    })

    //    $('.delete').live('click',function(){
    //        //obtengo el id que guardamos en data-id
    //        var id=$(this).attr('data-id');
    //        //preparo los parametros
    //        //        params={};
    //        //        params.id=id;
    //        //        params.action="deleteClient";
    //        $('#popupbox').load('../vista/cara.php', params,function(){
    //            $('#content').load('../vista/cara.php',{
    //                action:"refreshGrid"
    //            });
    //        })
    //
    //    })
    $('#cancel').live('click',function(){
        /*
         *Cierra la interfaz en la que se esta trabajando
         **/
        $('#block').hide();
        $('#popupbox').hide();
    })

})
function salir(){
    var url = "../Controlador/AdministradorI.php";
    var ajax = new AjaxObj();
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("boton="+"12");
    //document.location = "../Vista/Index.php";
}