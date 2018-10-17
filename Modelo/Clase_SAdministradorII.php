<?php
header('Content-Type: text/html;charset=ISO-8859-1');  
//require("Clase_Conexion.php");
include_once 'Clase_Persona.php';

class SAdministradorII extends Persona {

    public function Crear_Inmueble($valores) {
        try {
            /*
             * Funcion que permite almacenar los inmuebles con los valores recibidos 
             * se ejecuta query
             */
            $u = new mysqlcnx("inmo", "root", "");
            $query = "INSERT INTO inmueble( ";
            $query = $query . "Tipo_id_Tipo, Estado_id_Estado, Usuario_id_Usuario,";
            $query = $query . " Barrio_id_Barrio, Localidad_id_Localidad, Codigo,";
            $query = $query . " Propietario, Tel_Propietario, Publicidad,";
            $query = $query . " Cod_VivaReal, Cod_FincaRaiz, Cod_MetroCuadrado,";
            $query = $query . " Ascensor, Banos, Habitaciones,";
            $query = $query . " Direccion, Piso, Anos_Construido,";
            $query = $query . " Garajes, Area_Lote, Estrato,";
            $query = $query . " Administracion, Precio, Area_Construida,";
            $query = $query . " Tipo_de_Vista, Nombre_Urbanizacion,";
            $query = $query . " Observaciones)";
            $query = $query . " VALUES " . $valores;
            $u->ejecutar($query);
            echo 'almacenado correctamente';
        } catch (Exception $exc) {
            echo 'Error creando inmueble' . $exc->getTraceAsString();
        }
    }

    public function Modificar_Inmueble($valores) {

        /*
         * permite modificar valores del inmueble especificado
         * secrea script y se ejecuta
         */
        $script = "UPDATE inmueble SET ";
        $script = $script . $valores;
        try {
            $u = new mysqlcnx("inmo", "root", "");
            $u->ejecutar($script);
            echo 'Datos almacenados correctamente';
        } catch (Exception $exc) {
            echo "Error Modificando inmueble. " . $exc->getTraceAsString();
        }
    }

    public function cinmueble($param = NULL) {
        /*
         * Se crea para que cargue los inmuebles para editar y borrar
         */
        try {
            if ($param == NULL) {
                $campos = "i.Codigo, 
                t.Nombre, 
                e.Nombre, 
                u.Nombre, 
                u.Apellido, 
                b.Nombre, 
                i.Precio";
                $query = "select " . $campos;
                $query = $query . " from inmueble i inner join tipo t 
                    on i.Tipo_id_Tipo = t.id_Tipo 
                inner join estado e 
                    on i.Estado_id_Estado = e.id_Estado 
                inner join usuario u 
                    on i.Usuario_id_Usuario = u.id_Usuario 
                inner join barrio b 
                    on i.Barrio_id_Barrio = b.id_Barrio";
                $u = new mysqlcnx("inmo", "root", "");
                $u->ejecutar($query);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Asesor</th>
                            <th>Barrio</th>
                            <th>Precio</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        while ($u->cargar()) {
                            ?>
                            <tr>
                        <span id="<?php echo $u->getdato(0); ?>"></span>
                        <td><?php echo $u->getdato(0); ?></td>
                        <td><?php echo $u->getdato(1); ?></td>
                        <td><?php echo $u->getdato(2); ?></td>
                        <td><?php echo $u->getdato(3) . " " . $u->getdato(4); ?></td>
                        <td><?php echo $u->getdato(5); ?></td>
                        <td><?php echo $u->getdato(6); ?></td>
                        <td><input type="button" id="edit" class="edit" value="Editar" data-id='<?php echo $u->getdato(0); ?>'/></td>
                        <td><input type="button" value="Borrar" onclick="borrar_inmo('<?php echo $u->getdato(0); ?>')"/></td>
                    </tr>
                    <?
                }
                ?>
                </tbody>
                </table> 
                <?
            } else {
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
                        i.Estrato,
                        e.Nombre";
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
                $query = $query . " inner join estado e";
                $query = $query . " on i.Estado_id_Estado = e.id_Estado";
                $query = $query . " WHERE i.Codigo = '" . $param . "'";
                $u = new mysqlcnx("inmo", "root", "");
                $u->ejecutar($query);
                while ($u->cargar()) {
                    ?>
                    <form name ="client" id="client" method="POST">
                        <input type="hidden" name="id" id="id" value="<?php echo $u->getdato(0); ?>">
                        <div>
                            <label>Codigo</label>
                            <input type="text" name="codigo" id="codigo" readonly="true" value = "<?php echo $u->getdato(0); ?>">
                        </div>
                        <div>
                            <label>Tipo</label>
                            <input type="text" name="tipo" id="tipo" value = "<?php echo $u->getdato(6); ?>">
                        </div>
                        <div>
                            <label>Precio</label>
                            <input type="text" name="precio" id="precio" value = "<?php echo $u->getdato(1); ?>">
                        </div>
                        <div>
                            <label>Estado</label>
                            <input type="text" name="estado" id="estado" value = "<?php echo $u->getdato(24); ?>">
                        </div>
                        <div>
                            <label>Barrio</label>
                            <input type="text" name="barrio" id="barrio" readonly="true" value = "<?php echo $u->getdato(5); ?>">
                        </div>
                        <div>
                            <label>Asesor</label>
                            <input type="text" name="asesor" id="asesor" readonly="true" value = "<?php echo $u->getdato(2) . " " . $u->getdato(3); ?>">
                        </div>
                        <div>
                            <label>Oficina</label>
                            <input type="text" name="oficina" id="oficina" readonly="true" value = "<?php echo $u->getdato(4); ?>">
                        </div>
                        <div>
                            <label>Fecha de Ingreso</label>
                            <input type="text" name="ingreso" id="ingreso" readonly="true" value = "<?php echo $u->getdato(7); ?>">
                        </div>
                        <div>
                            <label>Urbanizaci&oacute;n</label>
                            <input type="text" name="urbanizacion" id="urbanizacion" value = "<?php echo $u->getdato(16); ?>">
                        </div>
                        <div>
                            <label>Administraci&oacute;n</label>
                            <input type="text" name="admon" id="admon" value = "<?php echo $u->getdato(8); ?>">
                        </div>
                        <div>
                            <label>Estrato</label>
                            <input type="text" name="estrato" id="estrato" value = "<?php echo $u->getdato(23); ?>">
                        </div>
                        <div>
                            <label>Habitaciones</label>
                            <input type="text" name="habitaciones" id="habitaciones" value = "<?php echo $u->getdato(9); ?>">
                        </div>
                        <div>
                            <label>Ba&ntilde;os</label>
                            <input type="text" name="banos" id="banos" value = "<?php echo $u->getdato(10); ?>">
                        </div>
                        <div>
                            <label>Garajes</label>
                            <input type="text" name="garajes" id="garajes" value = "<?php echo $u->getdato(11); ?>">
                        </div>
                        <div>
                            <label>Tiempo Construido</label>
                            <input type="text" name="construidotiempo" id="construidotiempo" value = "<?php echo $u->getdato(12); ?>">
                        </div>
                        <div>
                            <label>Area Lote</label>
                            <input type="text" name="lote" id="lote" value = "<?php echo $u->getdato(14); ?>">
                        </div>
                        <div>
                            <label>Area Construida</label>
                            <input type="text" name="aconstruida" id="aconstruida" value = "<?php echo $u->getdato(15); ?>">
                        </div>
                        <div>
                            <label>pisos</label>
                            <input type="text" name="pisos" id="pisos" value = "<?php echo $u->getdato(13); ?>">
                        </div>
                        <div>
                            <label>Tipo Vista</label>
                            <input type="text" name="tipovista" id="tipovista" value = "<?php echo $u->getdato(18); ?>">
                        </div>
                        <div>
                            <label>C metrocuadrado</label>
                            <input type="text" name="mcuadrado" id="mcuadrado" value = "<?php echo $u->getdato(19); ?>">
                        </div>
                        <div>
                            <label>C Viva real</label>
                            <input type="text" name="vreal" id="vreal" value = "<?php echo $u->getdato(21); ?>">
                        </div>
                        <div>
                            <label>C finca ra&iacute;z</label>
                            <input type="text" name="fraiz" id="fraiz" value = "<?php echo $u->getdato(20); ?>">
                        </div>
                        <div>
                            <label>Observaciones</label>
                            <textarea type="text" name="obser" id="obser"><?php echo $u->getdato(22); ?></textarea>
                        </div>
                        <div class="buttonsBar">
                            <input id="cancel" type="button" value ="Cerrar" onclick="acciones_sadministradorI(3)"/>
                            <input id="guardar" type="button" name="guardar" value ="Guardar" onclick="editar()" />
                            <br>
                            <span id="mensaje"></span>
                        </div>
                    </form>
                    <?
                }
            }
        } catch (Exception $exc) {
            echo 'Error Cargando inmuebles para editar ' . $exc->getTraceAsString();
        }
    }

    public function Cambiar_Estado_inmueble($id_inmueble, $estado) {
        /*
         * Permite definir el estado del inmueble solicitado
         * se creascript y se ejecuta
         */
        try {
            $script = "UPDATE inmueble SET ";
            $script = $script . " Estado_id_Estado = " . $estado;
            $script = $script . "WHERE id_Inmueble =" . $id_inmueble;
            $u = new mysqlcnx("inmo", "root", "");
            $u->ejecutar($script);
            echo 'Datos almacenados correctamente';
        } catch (Exception $exc) {
            echo 'Error cambiando estado' . $exc->getTraceAsString();
        }
    }

    public function Borrar_Inmueble($id_inmueble) {
        /*
         * Funcio que elimina un inmueble especifico
         * se crea script y se ejecuta
         */
        try {
            $script = "DELETE FROM inmueble";
            $script = $script . " WHERE codigo = '" . $id_inmueble . "'";
            $u = new mysqlcnx("inmo", "root", "");
            $u->ejecutar($script);
            echo 'Eliminado exitosamente <br>';
            echo '<input id="cancel" type="button" value ="Aceptar" />';
        } catch (Exception $exc) {
            echo 'Error Borrando inmueble ' . $exc->getTraceAsString();
        }
    }

    public function casesores($asesor = NULL) {
        /*
         * le permite al administrador 2 ver todos los asesores dispónibles
         */
        try {
            $u = new mysqlcnx("inmo", "root", "");
            if ($asesor == NULL) {
                $query = "select u.Nombre, u.Apellido, u.Celular, u.Email_Empresarial, o.Nombre ";
                $query = $query . "from usuario u inner join oficinas o ";
                $query = $query . "on u.Oficinas_id_Oficinas = o.id_Oficinas ";
                $query = $query . "where Rol_id_Rol = 6";
                $u->ejecutar($query);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Celular</th>
                            <th>Email Empresarial</th>
                            <th>Oficina</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        while ($u->cargar()) {
                            ?><tr>
                                <td><?php echo $u->getdato(0) . " " . $u->getdato(1); ?></td>
                                <td><?php echo $u->getdato(2); ?></td>
                                <td><?php echo $u->getdato(3); ?></td>
                                <td><?php echo $u->getdato(4); ?></td>
                                <td></td>
                            </tr>
                            <?
                        }
                        ?>
                    </tbody>
                </table>
                <?
            } elseif ($asesor == "adm1") {
                $query = "select u.Nombre, u.Apellido, u.Celular, u.Email_Empresarial, o.Nombre, u.id_Usuario ";
                $query = $query . "from usuario u inner join oficinas o ";
                $query = $query . "on u.Oficinas_id_Oficinas = o.id_Oficinas ";
                $query = $query . "where Rol_id_Rol = 6";
                $u->ejecutar($query);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Celular</th>
                            <th>Email Empresarial</th>
                            <th>Oficina</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        while ($u->cargar()) {
                            ?><tr>
                                <td><?php echo $u->getdato(0) . " " . $u->getdato(1); ?></td>
                                <td><?php echo $u->getdato(2); ?></td>
                                <td><?php echo $u->getdato(3); ?></td>
                                <td><?php echo $u->getdato(4); ?></td>
                                <td><input type="button" id="edito" class="edito" value="Editar" data-id='<?php echo $u->getdato(5); ?>'/></td>
                                <th><input type="button" value="Borrar" onclick="borrar_asesor('<?php echo $u->getdato(5); ?>')"/></th>
                            </tr>
                            <?
                        }
                        ?>
                    </tbody>
                </table>
                <?
            } else {
                $query = "select u.Nombre, u.Apellido, u.Documento, u.Direccion, u.Email_Personal,";
                $query = $query . " u.Email_Empresarial, u.Telefono, u.Celular,";
                $query = $query . " u.Especializacion, u.Estado, u.id_Usuario from usuario u";
                $query = $query . " WHERE id_Usuario = " . $asesor;
                $u->ejecutar($query);
                while ($u->cargar()) {
                    ?>
                    <form name ="client" id="client" method="POST">
                        <input type="hidden" name="id" id="id" value="<?php echo $u->getdato(10); ?>">
                        <div>
                            <label>Nombre</label>
                            <input type="text" name="nombre" id="nombre" value = "<?php echo $u->getdato(0); ?>">
                        </div>
                        <div>
                            <label>Apellido</label>
                            <input type="text" name="apellido" id="apellido" value = "<?php echo $u->getdato(1); ?>">
                        </div>
                        <div>
                            <label>Documento</label>
                            <input type="text" name="documento" id="documento" value = "<?php echo $u->getdato(2); ?>">
                        </div>
                        <div>
                            <label>Direcci&oacute;n</label>
                            <input type="text" name="direccion" id="direccion" value = "<?php echo $u->getdato(3); ?>">
                        </div>
                        <div>
                            <label>Email personal</label>
                            <input type="text" name="epersonal" id="epersonal" value = "<?php echo $u->getdato(4); ?>">
                        </div>
                        <div>
                            <label>Email empresarial</label>
                            <input type="text" name="empresarial" id="empresarial" value = "<?php echo $u->getdato(5); ?>">
                        </div>
                        <div>
                            <label>Telefono</label>
                            <input type="text" name="telefono" id="telefono" value = "<?php echo $u->getdato(6); ?>">
                        </div>
                        <div>
                            <label>Celular</label>
                            <input type="text" name="Celular" id="celular" value = "<?php echo $u->getdato(7); ?>">
                        </div>
                        <div>
                            <label>Especializaci&oacute;n</label>
                            <input type="text" name="especializacion" id="especializacion" value = "<?php echo $u->getdato(8); ?>">
                        </div>
                        <div>
                            <label>Estado</label>
                            <input type="text" name="estado" id="estado" value = "<?php echo $u->getdato(9); ?>">
                        </div>
                        <div class="buttonsBar">
                            <input id="cancel" type="button" value ="Cerrar" onclick="acciones_sadministradorI(4)" />
                            <input id="guardar" type="button" name="guardar" value ="Guardar" onclick="editarasesor()" />
                            <br>
                            <span id="mensaje"></span>
                        </div>
                    </form>
                    <?
                }
            }
        } catch (Exception $exc) {
            echo 'Error consultando los asesores' . $exc->getTraceAsString();
        }
    }

    public function cdirectores($asesor = NULL) {
        /*
         * le permite al administrador 2 ver todos los asesores dispónibles
         */
        try {
            $u = new mysqlcnx("inmo", "root", "");
            if ($asesor == NULL) {
                $query = "select u.Nombre, u.Apellido, u.Celular, u.Email_Empresarial, o.Nombre ";
                $query = $query . "from usuario u inner join oficinas o ";
                $query = $query . "on u.Oficinas_id_Oficinas = o.id_Oficinas ";
                $query = $query . "where Rol_id_Rol = 5";
                $u->ejecutar($query);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Celular</th>
                            <th>Email Empresarial</th>
                            <th>Oficina</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        while ($u->cargar()) {
                            ?><tr>
                                <td><?php echo $u->getdato(0) . " " . $u->getdato(1); ?></td>
                                <td><?php echo $u->getdato(2); ?></td>
                                <td><?php echo $u->getdato(3); ?></td>
                                <td><?php echo $u->getdato(4); ?></td>
                                <td></td>
                            </tr>
                            <?
                        }
                        ?>
                    </tbody>
                </table>
                <?
            } elseif ($asesor == "adm1") {
                $query = "select u.Nombre, u.Apellido, u.Celular, u.Email_Empresarial, o.Nombre, u.id_Usuario ";
                $query = $query . "from usuario u inner join oficinas o ";
                $query = $query . "on u.Oficinas_id_Oficinas = o.id_Oficinas ";
                $query = $query . "where Rol_id_Rol = 5";
                $u->ejecutar($query);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Celular</th>
                            <th>Email Empresarial</th>
                            <th>Oficina</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        while ($u->cargar()) {
                            ?><tr>
                                <td><?php echo $u->getdato(0) . " " . $u->getdato(1); ?></td>
                                <td><?php echo $u->getdato(2); ?></td>
                                <td><?php echo $u->getdato(3); ?></td>
                                <td><?php echo $u->getdato(4); ?></td>
                                <td><input type="button" id="edito" class="edito" value="Editar" data-id='<?php echo $u->getdato(5); ?>'/></td>
                                <th><input type="button" value="Borrar" onclick="borrar_asesor('<?php echo $u->getdato(5); ?>')"/></th>
                            </tr>
                            <?
                        }
                        ?>
                    </tbody>
                </table>
                <?
            } else {
                $query = "select u.Nombre, u.Apellido, u.Documento, u.Direccion, u.Email_Personal,";
                $query = $query . " u.Email_Empresarial, u.Telefono, u.Celular,";
                $query = $query . " u.Especializacion, u.Estado, u.id_Usuario from usuario u";
                $query = $query . " WHERE id_Usuario = " . $asesor;
                $u->ejecutar($query);
                while ($u->cargar()) {
                    ?>
                    <form name ="client" id="client" method="POST">
                        <input type="hidden" name="id" id="id" value="<?php echo $u->getdato(10); ?>">
                        <div>
                            <label>Nombre</label>
                            <input type="text" name="nombre" id="nombre" value = "<?php echo $u->getdato(0); ?>">
                        </div>
                        <div>
                            <label>Apellido</label>
                            <input type="text" name="apellido" id="apellido" value = "<?php echo $u->getdato(1); ?>">
                        </div>
                        <div>
                            <label>Documento</label>
                            <input type="text" name="documento" id="documento" value = "<?php echo $u->getdato(2); ?>">
                        </div>
                        <div>
                            <label>Direcci&oacute;n</label>
                            <input type="text" name="direccion" id="direccion" value = "<?php echo $u->getdato(3); ?>">
                        </div>
                        <div>
                            <label>Email personal</label>
                            <input type="text" name="epersonal" id="epersonal" value = "<?php echo $u->getdato(4); ?>">
                        </div>
                        <div>
                            <label>Email empresarial</label>
                            <input type="text" name="empresarial" id="empresarial" value = "<?php echo $u->getdato(5); ?>">
                        </div>
                        <div>
                            <label>Telefono</label>
                            <input type="text" name="telefono" id="telefono" value = "<?php echo $u->getdato(6); ?>">
                        </div>
                        <div>
                            <label>Celular</label>
                            <input type="text" name="Celular" id="celular" value = "<?php echo $u->getdato(7); ?>">
                        </div>
                        <div>
                            <label>Especializaci&oacute;n</label>
                            <input type="text" name="especializacion" id="especializacion" value = "<?php echo $u->getdato(8); ?>">
                        </div>
                        <div>
                            <label>Estado</label>
                            <input type="text" name="estado" id="estado" value = "<?php echo $u->getdato(9); ?>">
                        </div>
                        <div class="buttonsBar">
                            <input id="cancel" type="button" value ="Cerrar" />
                            <input id="guardar" type="button" name="guardar" value ="Guardar" onclick="editarasesor()" />
                            <br>
                            <span id="mensaje"></span>
                        </div>
                    </form>
                    <?
                }
            }
        } catch (Exception $exc) {
            echo 'Error consultando los asesores' . $exc->getTraceAsString();
        }
    }

}

//$d = new SAdministradorII();
//$d->cinmueble("j");
//echo '<br><select name=a><option>seleccione';
//$d->VerUrbanizacion();
//echo '</select>';
//$d->Consultar_inmueble();
?>