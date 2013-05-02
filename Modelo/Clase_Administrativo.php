<?php
header("Content-Type: text/html;charset=ISO-8859-1");  
require 'Clase_Gerente.php';
include_once 'Clase_Conexion.php';

class Administrativo extends Gerente {

    public function __call($name, $arguments) {
        if ($name == "Consultar_Asesor") {
            if (count($arguments) == 0) {
                
            } elseif (count($arguments) == 1) {
                
            }
        }
    }

    public function listaaesores() {
        $u = new mysqlcnx("inmo", "root", "");
        $u->ejecutar("select * from usuario where Rol_id_Rol=6");
        while ($u->cargar()) {
            echo "<option value=" . $u->getdato(0) . ">" . $u->getdato(7).$u->getdato(8);
        }
    }

    protected function Registro_Llamadas() {
        
    }

    protected function Registro_Asistencia() {
        
    }

}

?>