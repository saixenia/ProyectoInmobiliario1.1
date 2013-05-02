<?php
header("Content-Type: text/html;charset=ISO-8859-1");  
require_once 'Clase_SAdministradorII.php';

class SAdministrativoI extends SAdministradorII {

    public function __construct() {
        
    }

    public function Crear_Asesor($c_asesor) {
        /*
         * se crea funcion crear asesor que recibe como parametro los valores a intsertar
         * se construye script y se ejecuta
         */
        try {
            $script = "INSERT INTO usuario";
            $script = $script . " (Rol_id_Rol, Sector_id_Sector, Barrio_id_Barrio,";
            $script = $script . " Usuario_id_Usuario, Oficinas_id_Oficinas, TipoDocumento_id_Tipo_Documento,";
            $script = $script . " Nombre, Apellido, Documento,";
            $script = $script . " Direccion, Email_Personal, Email_Empresarial,";
            $script = $script . " Telefono, Celular, Especializacion,";
            $script = $script . " Contrasena, Estado, Estado_pass)";
            $script = $script . " VALUES (" . $c_asesor . ")"; //aqui se agregan los valores
            $u = new mysqlcnx("inmo", "root", "");
            $u->ejecutar($script); //se ejecuta script
        } catch (Exception $exc) {
            echo 'Error creando asesor. ' . $exc->getTraceAsString();
        }
    }

    public function Borrar_Asesor($idasesor) {
        /* Se crea funcion que recibe como parametro el id del asesor
         * se ejecuta script de eliminacion.
         * funciona perfectamente para la fecha 27/04/2003
         */
        try {
            $script = "delete from usuario where id_Usuario ='" . $idasesor."'";
            $u = new mysqlcnx("inmo", "root", "");
            $u->ejecutar($script);
            echo $script . "<br>";
            echo 'Eliminado exitosamente <br>';
            echo '<input id="cancel" type="button" value ="Aceptar" />';
        } catch (Exception $exc) {
            echo 'Error borrando asesor  ' . $exc->getTraceAsString();
        }
    }

    public function Modificar_Asesor($valores) {
        /*
         * Se crea funcion querecibe como parametro el id del asesor a modificar 
         * los valores a ingresar, se ejecuta script.
         */
        try {
            $script = "UPDATE usuario SET ";
            $script = $script . $valores;
            $u = new mysqlcnx("inmo", "root", "");
            $u->ejecutar($script);
//            echo $script;
            echo "Datos almacenados correctamente";
        } catch (Exception $exc) {
            echo 'Error Modificando asesor' . $exc->getTraceAsString();
        }
    }

    public function Crear_Director_Grupo($id_asesor) {
        /*
         * Se crea funcion que recibe como parametro el id del asesor creado que sera director
         * se ejecuta script
         */
        try {
            $script = "UPDATE usuario SET ";
            $script = $script . "Rol_id_Rol = 5";
            $script = $script . " WHERE id_Usuario = " . $id_asesor;
            $u = new mysqlcnx("inmo", "root", "");
            $u->ejecutar($script);
        } catch (Exception $exc) {
            echo 'Error creando Director' . $exc->getTraceAsString();
        }
    }

    public function Borrar_Director_Grupo($id_director) {
        /*
         * Se crea funcion que recibe como parametro el id del director
         * Se consulta si tiene asesores a cargo y se cambia rol a asesor 
         */
        try {
            $script = "select count(Usuario_id_Usuario)";
            $script = $script . " from usuario";
            $script = $script . "where Usuario_id_Usuario = " . $id_director;
            $u = new mysqlcnx("inmo", "root", "");
            $u->ejecutar($script);
            $asecar = $u->cargar();
            if ($asecar > 0) {//si no tiene asesores a cargo
                $script = "UPDATE usuario SET ";
                $script = $script . "Rol_id_Rol = 6";//6 es roll asesor
                $script = $script . " WHERE id_Usuario = " . $id_director;
                $u->ejecutar($script);
                echo 'Director Borrado exitosamente';
            } else {
                echo "El usuario tiene asesores a cargo. No se puede eliminar el Director";
            }
        } catch (Exception $exc) {
            echo 'Error Borrando director '.$exc->getTraceAsString();
        }
    }
}

//$f=new SAdministrativoI();
//$f->Borrar_Asesor(95);
?>
