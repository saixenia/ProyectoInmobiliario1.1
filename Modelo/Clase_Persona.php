<?php
header('Content-Type: text/html;charset=ISO-8859-1');  
require("Clase_Conexion.php");

class Persona {

    private /* object */ $Nombre;
    private /* object */ $Apellido;
    private /* object */ $Direccion;
    private /* object */ $Email;
    private /* object */ $Telefono;
    private /* object */ $Celular;
    private /* object */ $Cargo;
    private /* object */ $Oficina;
    private /* object */ $Documento;
    private /* object */ $Contrasena;

//    public function __construct($documento, $contrasena) {
//        $this->Documento = $documento;
//        $this->Contrasena = $contrasena;
//    }

    public function __call($name, $arguments) {
        /*
         * se crea para realizar la consulta a los inmuebles
         */
        $u = new mysqlcnx("inmo", "root", "");
        if ($name == 'Consultar_inmueble') {
            switch (count($arguments)) {
                case 0: {
                        $campos = "i.Codigo,
                        i.Precio,
                        u.Nombre,
                        u.Apellido,
                        o.Nombre,
                        b.Nombre,
                        t.Nombre,
                        i.Fecha_Ingreso,
                        i.Administracion,
                        i.Habitaciones,
                        i.Banos,
                        i.Garajes,
                        i.Anos_Construido,
                        i.Piso, 
                        i.Area_Lote,
                        i.Area_Construida,
                        i.Nombre_Urbanizacion,
                        i.Ascensor,
                        i.Tipo_de_Vista,
                        i.Cod_MetroCuadrado,
                        i.Cod_FincaRaiz,
                        i.Cod_VivaReal, 
                        i.Observaciones,
                        i.Estrato ";
                        $query = "select " . $campos;
                        $query = $query . " from inmueble i";
                        $query = $query . " inner join usuario u";
                        $query = $query . " on i.Usuario_id_Usuario = u.id_Usuario";
                        $query = $query . " inner join barrio b";
                        $query = $query . " on i.Barrio_id_Barrio = b.id_Barrio";
                        $query = $query . " inner join tipo t";
                        $query = $query . " on i.Tipo_id_Tipo = t.id_Tipo";
                        $query = $query . " inner join oficinas o";
                        $query = $query . " on u.Oficinas_id_Oficinas = o.id_Oficinas";
                        $u->ejecutar($query);
                echo '<table id="report">';
//                                                echo '<table id="reportes">';
                        echo '
                        <tr>
                            <th>C&oacute;digo</th>
                            <th>Oficina</th>
                            <th>Asesor</th>
                            <th>Barrio</th>
                            <th></th>
                        </tr>
                        ';

                        while ($u->cargar()) {
                            echo "<tr>
                <td>" . $u->getdato(0) . "</td>
                <td>" . $u->getdato(4) . "</td>
                <td>" . $u->getdato(2) . " " . $u->getdato(3) . "</td>
                <td>" . $u->getdato(5) . "</td>
                <td><div class='arrow'></div></td>
            </tr><tr>
                <td colspan='4'>
                
                    <h1>Informacion del inmueble</h1>
                    <br>
                            <div class='a'>
            <label>
                C&oacute;digo:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(0) . "'>
        </div>
<div class='a'>
            <label>
                Barrio:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(5) . "'>
        </div> 
 <div class='a'>
            <label>
                Estrato:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(23) . "'>
        </div>         
<div class='a'>
            <label>
                Precio:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(1) . "'>
        </div>
        <div class='a'>
            <label>
                Asesor:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(2) . $u->getdato(3) . "'>
        </div>
        <div class='a'>
            <label>
                Tipo de Negocio:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(6) . "'>
        </div>
        <div class='a'>
            <label>
                Fecha Ingeso:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(7) . "'>
        </div>
        <div class='a'>
            <label>
                Administraci&oacute;n:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(8) . "'>
        </div>
        <div class='a'>
            <label>
                Habitaciones:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(9) . "'>
        </div>
        <div class='a'>
            <label>
                Ba&ntilde;os:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(10) . "'>
        </div>
        <div class='a'>
            <label>
                Garajes:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(11) . "'>
        </div>
        <div class='a'>
            <label>
                A&ntilde;os de Construido:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(12) . "'>
        </div>
        <div class='a'>
            <label>
                Pisos:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(13) . "'>
        </div>
        <div class='a'>
            <label>
                Area lote:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(14) . "'>
        </div>
        <div class='a'>
            <label>
                Area Construida:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(15) . "'>
        </div>
        <div class='a'>
            <label>
                Urbanizaci&oacute;n:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(16) . "'>
        </div>
        <div class='a'>
            <label>
                Ascensor:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(17) . "'>
        </div>
        <div class='a'>
            <label>
                Tipo Vista:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(18) . "'>
        </div>
        <div class='a'>
            <label>
                C&oacute;digo MetroCuadrado:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(19) . "'>
        </div>
        <div class='a'>
            <label>
                C&oacute;digo Finca Ra&iacute;z:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(20) . "'>
        </div>
        <div class='a'>
            <label>
                C&oacute;digo Viva Real:
            </label>
            <input type='text' readonly='readonly' value='" . $u->getdato(21) . "'>
        </div>
        <div class='a'>
            <label>
                Observaciones:
            </label>
            <textarea readonly='readonly'>" . $u->getdato(22) . "</textarea>
        </div>
        
                    </td>
                    <td>
                    <a href='http://www.metrocuadrado.com/' target='_blank'><img src='../recursos/imagenes/metrocuadrado.jpg' alt='metrocuadrado.com' /></a><br>
                    <a href='http://www.fincaraiz.com.co/' target='_blank'><img src='../recursos/imagenes/fr.jpg' alt='fincaraiz.com.co' /></a><br>
                    <a href='http://www.vivareal.com.co/' target='_blank'><img src='../recursos/imagenes/vr.jpg' alt='vivareal.com.co' /></a><br>
                    </td>
            </tr>";
                        }
                        echo '</table>';

                        break;
                    }
                case 1: {
                        $id = $arguments[0];
                        $u->ejecutar("select * from inmueble where Codigo=" . $id);
                        $u->cargar();
                        for ($index = 0; $index <= 30; $index++) {
                            $inmueble [$index] = $u->getdato($index);
//                            echo '['.$index.'] = '.$u->getdato($index)."<br>";
                        }
                        return $inmueble;
                        break;
                    }
                default:
                    break;
            }
        }
    }

    public function Loguin($d, $c) {
        /*
         * establece conexion con la base de datos y valida si existe 
         * y el rol del usuario
         */
//        require("Clase_Conexion.php");
        $u = new mysqlcnx("inmo", "root", "");
        $u->ejecutar("select Documento from usuario where Documento='" . $d . "'");
        $u->cargar();
        $vcontrol = "";
        if ($u->getdato(0) == 0) {
            $vcontrol = "no";
        } else {
            $u->ejecutar("select count(Contrasena) from usuario where Contrasena='" . $c . "'");
            $u->cargar();
            if ($u->getdato(0) == 0) {
                $vcontrol = "error de contrase&ntildea";
            } else {
                $u->ejecutar(" select Tipo from usuario u inner join rol r on u.Rol_id_Rol = r.id_Rol where Documento='" . $d . "'");
                $u->cargar();
                $vcontrol = $u->getdato(0);
            }
        }
        return $vcontrol;
    }

    public function ingreso($user = null, $pas = null) {
        if ($user == null and $pas == null) {
            if (!isset($_SESSION["usuario"])) {
                echo '<script>document.location="../Vista/Index.php";
                    </script>';
//                echo 'no logueo';
            }
        } else {
            $prueba = $this->Loguin($user, $pas);
            if ($prueba == "no") {
                return "usuario no existe! <br> solicite su creaci&oacuten en administraci&oacuten";
            } else {
                $_SESSION["usuario"] = session_id();
                echo $prueba;
            }
        }
    }

    public function salir() {
        
    }

    public function cargarselect($tabla, $condi) {
        /*
         * Funcion creada para que carge el objeto select de html
         * recibe el nombre de la tabla y la condicion
         */
        $query = "";
        $us = new mysqlcnx("inmo", "root", "");
        if ($condi == "") {
            switch ($tabla) {
                case "estado": case "tipo": {
                        $query = "select * from " . $tabla;
                        $us->ejecutar($query);
                        while ($us->cargar()) {
                            if ($us->getdato(1) != "Vendido" && $us->getdato(1) != "Rentado") {
                                echo'<option value="' . $us->getdato(0) . '">' . $us->getdato(1) . "</option>";
                            }
                        }
                        break;
                    }
                case "localidad": {
                        $query = "select * from " . $tabla;
                        $us->ejecutar($query);
                        while ($us->cargar()) {
                            echo'<option value="' . $us->getdato(0) . '">' . $us->getdato(2) . '</option>';
                        }
                        break;
                    }
                //agregar mas case si es necesario para otros select
                default: {
                        echo 'error en la consulta imprimiendo tabla 1 ' . $tabla;
                        break;
                    }
            }
        } else {
            switch ($tabla) {
                case "estado": {
                        $query = "select * from " . $tabla;
                        $us->ejecutar($query);
                        while ($us->cargar()) {
                            echo'<option value="' . $us->getdato(0) . '">' . $us->getdato(1) . "</option>";
                        }
                        break;
                    }
                case "barrio": {
                        $query = "select * from " . $tabla . " where Localidad_id_Localidad=" . $condi;
                        $us->ejecutar($query);
                        while ($us->cargar()) {
                            echo'<option value="' . $us->getdato(0) . '">' . $us->getdato(2) . "</option>";
                        }
                        break;
                    }
                case "usuario": {
                        $query = "select id_Usuario, Nombre, Apellido from usuario where Rol_id_Rol=" . $condi;
                        $us->ejecutar($query);
                        while ($us->cargar()) {
                            echo'<option value="' . $us->getdato(0) . '">' . $us->getdato(1) . " " . $us->getdato(2) . "</option>";
                        }
                        break;
                    }
                case "inmueble": {
                        break;
                    }
                //agregar mas case si es necesario para otros select
                default: {
                        if ($condi == 4 || $condi == 3) {
                            $query = 'SELECT COUNT(Codigo) FROM inmueble';
                            $us->ejecutar($query);
                            $us->cargar();
                            $venta = $us->getdato(0) + 1;
                            echo $venta;
                        } else {
                            echo 'error en la consulta imprimiendo condicion ' . $condi;
                        }

                        break;
                    }
            }
        }
    }

}

//$a = new Persona();
?>