<?php
header('Content-Type: text/html;charset=ISO-8859-1');  
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Modelo/sello.php';
$vc = $_POST["boton"];
$va = $_POST["valores"];
$a = new mostrar();
switch ($vc) {
    case "1": {
            $a->cargardatos($va);
            break;
        }
    case "2": {
            $a->cargardatos($va);
            break;
        }
    case "3": {
            echo "cuestion de guardar ".$va;
            break;
        }
    default:
        break;
}
?>
