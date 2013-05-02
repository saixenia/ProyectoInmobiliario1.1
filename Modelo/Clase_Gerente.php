<?php
header("Content-Type: text/html;charset=ISO-8859-1");  
include_once 'Clase_Persona.php';

class Gerente extends Persona {

    public function Anual_Ventas() {
        $u = new mysqlcnx("inmo", "root", "");
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=1 AND Estado_id_Estado=4");
        $u->cargar();
        $apartamentos = $u->getdato(0);
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=2 AND Estado_id_Estado=4");
        $u->cargar();
        $casas = $u->getdato(0);
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=3 AND Estado_id_Estado=4");
        $u->cargar();
        $consultorio = $u->getdato(0);
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=4 AND Estado_id_Estado=4");
        $u->cargar();
        $oficinas = $u->getdato(0);
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=5 AND Estado_id_Estado=4");
        $u->cargar();
        $local = $u->getdato(0);
        echo '
      <div id="vertgraph">
            <ul>
                <li class="critical" style="height: ' . $apartamentos . '%;">' . $apartamentos . '</li>
                <li class="high" style="height: ' . $casas . '%;">' . $casas . '</li>
                <li class="medium" style="height: ' . $consultorio . '%;">' . $consultorio . '</li>
                <li class="low" style="height: ' . $oficinas . '%;">' . $oficinas . '</li>
                <li class="info" style="height: ' . $local . '%;">' . $local . '</li>
            </ul>
        </div>';
    }

    public function Anual_Rentas() {
        $u = new mysqlcnx("inmo", "root", "");
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=1 AND Estado_id_Estado=5");
        $u->cargar();
        $apartamentos = $u->getdato(0);
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=2 AND Estado_id_Estado=5");
        $u->cargar();
        $casas = $u->getdato(0);
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=3 AND Estado_id_Estado=5");
        $u->cargar();
        $consultorio = $u->getdato(0);
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=4 AND Estado_id_Estado=5");
        $u->cargar();
        $oficinas = $u->getdato(0);
        $u->ejecutar("select COUNT(id_Inmueble) from inmueble WHERE Tipo_id_Tipo=5 AND Estado_id_Estado=5");
        $u->cargar();
        $local = $u->getdato(0);
        echo '
      <div id="vertgraph">
            <ul>
                <li class="critical" style="height: ' . $apartamentos . '%;">' . $apartamentos . '</li>
                <li class="high" style="height: ' . $casas . '%;">' . $casas . '</li>
                <li class="medium" style="height: ' . $consultorio . '%;">' . $consultorio . '</li>
                <li class="low" style="height: ' . $oficinas . '%;">' . $oficinas . '</li>
                <li class="info" style="height: ' . $local . '%;">' . $local . '</li>
            </ul>
        </div>';
    }

    public function Asesor(/* object */ $Age) {
        $u = new mysqlcnx("inmo", "root", "");
    }

    public function Oficina(/* object */ $Age) {
        
    }

    public function Llamadas(/* object */ $Asesor) {
        
    }

}

?>