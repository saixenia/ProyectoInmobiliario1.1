<?php
header("Content-Type: text/html;charset=ISO-8859-1");  
error_reporting(0);
include '../Modelo/Clase_SAdministrativoI.php';
$vccontrol = $_POST["boton"];
$valores = $_POST["valores"];
$a = new SAdministrativoI();
switch ($vccontrol) {
    case "1": {
            /*
             * carga los inmuebles
             */
            try {
                $a->Consultar_inmueble();
            } catch (Exception $exc) {
                echo "error cargando la informacion";
            }
            break;
        }
    case "2": {
            /*
             * Inserta los objetos html para crear el inmueble
             */
            ?>
            <h1>Crear Inmueble</h1>
            <table  align=center>
                <tr>
                    <td>Asesor:</td>
                    <td>
                        <select id="a" onfocus="seleccion('usuario', '6', 'a')">
                            <option>seleccione Asesor</option>
                        </select>
                    </td>
                   
                </tr>
                <tr>
                    <td>Proceso:</td>
                    <td>
                        <select id="b" onfocus="seleccion('estado', '', 'b')">
                            <option>seleccione Proceso</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tipo:</td>
                    <td>
                        <select id="c" onfocus="seleccion('tipo', '', 'c')">
                            <option>seleccione Tipo</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Localidad:</td>
                    <td>
                        <select id="d" onfocus="seleccion('localidad', '', 'd')">
                            <option>seleccione Localidad</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Barrio:</td>
                    <td>
                        <select id="bar" onfocus="seleccion('barrio',d.value, 'bar')">
                            <option>seleccione Barrio</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>C&oacute;digo:</td>
                    <td>
                        <input type="text" id="txt_codigo" readonly="readonly" onfocus="seleccion('',b.value, 'txt_codigo')"/>
                    </td>
                </tr>
                <tr>
                    <td>Direcci&oacute;n:</td>
                    <td>
                        <select id="sltidir"><!--seleccion tipo de direccion-->
                            <option value="Calle">Calle</option>
                            <option value="Carrera">Carrera</option>
                            <option value="Diagonal">Diagonal</option>
                            <option value="Transversal">Transversal</option>
                        </select>
                        <input type="text" id="txt_direccion_a" size="5" placeholder="233ABIS" maxlength="8"/>
                        <input type="text" id="txt_direccion_b" size="1" value="N" disabled=""/>
                        <input type="text" id="txt_direccion_c" size="5" placeholder="233ABIS" maxlength="8"/>
                        <input type="text" id="txt_direccion_d" size="1" value="-" disabled=""/>
                        <input type="text" id="txt_direccion_e" size="5" placeholder="233 S / N" maxlength="8"/>
                        <span id="dir"></span>
                    </td>
                </tr>
                <tr>
                    <td>Estrato:</td>
                    <td>
                        <select id="slestrato">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td>
                        <input type="text" id="txt_precio" onkeypress="return valida_numeros(event,'pc')" maxlength="20"/>
                        <span id="pc"></span>
                    </td>
                </tr>
                <tr>
                    <td>Administraci&oacute;n:</td>
                    <td>
                        <input type="text" id="txt_admin" onkeypress="return valida_numeros(event,'admin')" maxlength="20"/>
                        <span id="admin"></span>
                    </td>
                </tr>
                <tr>
                    <td>Habitaciones:</td>
                    <td>
                        <input type="text" id="txt_habitaciones" onkeypress="return valida_numeros(event,'hb')" maxlength="20"/>
                        <span id="hb"></span>
                    </td>
                </tr>
                <tr>
                    <td>Ba&ntilde;os:</td>
                    <td>
                        <input type="text" id="txt_banos" onkeypress="return valida_numeros(event,'bn')" maxlength="20" />
                        <span id="bn"></span>
                    </td>
                </tr>
                <tr>
                    <td>Garajes:</td>
                    <td>
                        <input type="text" id="txt_garajes" onkeypress="return valida_numeros(event,'gara')" maxlength="20"/>
                        <span id="gara"></span>
                    </td>
                </tr>
                <tr>
                    <td>A&ntilde;os Construido:</td>
                    <td>
                        <input type="text" id="txt_tconstruido" onkeypress="return valida_numeros(event,'an')" maxlength="20"/>
                        <span id="an"></span>
                    </td>
                </tr>
                <tr>
                    <td>Pisos:</td>
                    <td>
                        <input type="text" id="txt_piso" onkeypress="return valida_numeros(event,'ps')" maxlength="20"/>
                        <span id="ps"></span>
                    </td>
                </tr>
                <tr>
                    <td>Area Lote:</td>
                    <td>
                        <input type="text" id="txt_arealote" onkeypress="return valida_numeros(event,'areal')" maxlength="20"/>
                        <span id="areal"></span>
                    </td>
                </tr>
                <tr>
                    <td>Area Construida:</td>
                    <td>
                        <input type="text" id="txt_areacons" onkeypress="return valida_numeros(event,'ac')" maxlength="20"/>
                        <span id="ac"></span>
                    </td>
                </tr>
                <tr>
                    <td>Urbanizaci&oacute;n: </td>
                    <td>
                        <input type="text" id="txt_urbanizacion" onkeypress="return valida_letras(event,'urba')" maxlength="80" />
                        <span id="urba"></span>
                    </td>
                </tr>
                <tr>
                    <td>Ascensor:</td>
                    <td>
                        <input type="text" id="txt_ascensor" onkeypress="return valida_numeros(event,'asce')" maxlength="20"/>
                        <span id="asce"></span>
                    </td>
                </tr>
                <tr>
                    <td>Tipo Vista:</td>
                    <td>
                        <input type="text" id="txt_tvista" onkeypress="return valida_letras(event,'tv')"/>
                        <span id="tv"></span>
                    </td>
                </tr>
                <tr>
                    <td>Nombre Propietario:</td>
                    <td>
                        <input type="text" id="txt_npropietario"/>
                        <span id="np"></span>
                    </td>
                </tr>
                <tr>
                    <td>Telefono Propietario:</td>
                    <td>
                        <input type="text" id="txt_tpropietario" onkeypress="return valida_numeros(event,'tp')" maxlength="20"/>
                        <span id="tp"></span>
                    </td>
                </tr>
                <tr>
                    <td>Publicidad:</td>
                    <td>
                        <select id="slpubli">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>C&oacute;digo Metro Cuadrado:</td>
                    <td>
                        <input type="text" id="txt_cmetrocuadrado"/>
                        <span id="cm"></span>
                    </td>
                </tr>
                <tr>
                    <td>C&oacute;digo Finca Ra&iacute;z:</td>
                    <td>
                        <input type="text" id="txt_cfincaraiz"/>
                    </td>
                </tr>
                <tr>
                    <td>C&oacute;digo Viva Real:</td>
                    <td>
                        <input type="text" id="txt_cvivareal"/>
                    </td>
                </tr>
                <tr>
                    <td>Observaciones:</td>
                    <td>
                        <textarea id="txt_observaciones"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <input type="button" value="Guardar" onclick="crear_inmueble()"/>
                    </td>
                </tr>
            </table>
            <?
            break;
        }
    case "3": {
            /*
             * Seleccionar inmueble para editar
             */
            echo $a->cinmueble($valores);
            break;
        }
    case "4": {
            try {
                if ($valores == "0") {
                    $a->casesores("adm1");
                }
            } catch (Exception $exc) {
                echo 'error cargando asesores' . $exc->getTraceAsString();
            }
            break;
        }
    case "5": {
            if ($valores == "0") {
                $a->cdirectores("adm1");
            }
            break;
        }
    case "6": {
            /*
             * Recibe los valores a modificar del inmueble 
             */
            try {
                $a->Modificar_Inmueble($valores);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }


            break;
        }
    case "7": {
            /*
             * crea el inmueble
             */
//            echo "bien es hora de crear el inmueble  <br>";
//            echo $valores;
            $a->Crear_Inmueble($valores);
            break;
        }
    case "8": {
            /*
             * carga interfazdeedicion asesor
             */
            try {
                echo $a->casesores($valores);
            } catch (Exception $exc) {
                echo '¬¬' . $exc->getTraceAsString();
            }
//            echo $valores;
            break;
        }
    case "9": {
            try {
                $a->Modificar_Asesor($valores);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            break;
        }
    case "10":{
            try {
                $a->Borrar_Inmueble($valores);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

            break;
    }
    case "11":{
            try {
                $a->Borrar_Asesor($valores);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

            break;
    }
        default : {
            break;
        }
}
//echo ''.$vccontrol;
?>