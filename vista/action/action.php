<?php
header('Content-Type: application/json');
include ('../../configuracion.php');
$accion = $_REQUEST['accion'] ?? '';
$us = new usuarioAMB();
switch ($accion){
    case "listarUsuario":
        $retorno = $us->listarUsuarios();
        break;
    case "desactivarUsuario";
        $retorno = $us->deshabilitarUsuario($_REQUEST['idusuario']);
        break;
    case "activarUsuario";
        $retorno = $us->habilitarUsuario($_REQUEST['idusuario']);
        break;
    case "modificarUsuario":
        $retorno = $us->modificarUsuario($_POST['idusuario'], $_POST['usnombre'], $_POST['usmail'], $_POST['rol']);
        break;
    case "validarExistencia":
        $usValid = $us->usuarioValido($_POST['usuario'], $_POST['contrasenia']);
        if($usValid["valid"]){
            session_start();
            $_SESSION['idusuario'] = $usValid["idusuario"];
            $_SESSION['usnombre'] = $usValid["usnombre"];
            $_SESSION['rol'] = $usValid["rol"];
        }
        $retorno = $usValid["valid"];
        break;
    case "crearUsuario":
        $retorno = $us->crearUsuario($_POST["usuario"], $_POST["email"], $_POST["contrasenia"]);
        break;

}
echo json_encode($retorno);
?>