<?php
header('Content-Type: application/json');
include ('../../configuracion.php');
$accion = $_REQUEST['accion'] ?? '';
$us = new usuarioAMB();
$pro = new productoAMB();
$men = new menuAMB();
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
        $retorno = $us->validarCredenciales($_POST['usuario'], $_POST['contrasenia']);
        break;
    case "crearUsuario":
        $retorno = $us->crearUsuario($_POST["usuario"], $_POST["email"], $_POST["contrasenia"]);
        break;
    case "listarProductos":
        $retorno = $pro->listarProductos();
        break;
    case "crearProducto":
        $retorno = $pro->agregar($_POST["pronombre"],$_POST["prodetalle"],$_POST["proprecio"],$_POST["procantstock"]);
        break;
    case "modificarProducto":
        $retorno = $pro->modificar($_POST["idproducto"],$_POST["pronombre"],$_POST["prodetalle"],$_POST["procantstock"],$_POST["proprecio"]);
        break;
    case "cambioEstado":
        $retorno = $pro->estadoCambio($_POST["idproducto"]);
        break;
    case "ingresarProducto":
        $retorno = $pro->agregarCarrito($_POST["productoid"],$_POST["cant"]);
        break;
    case "listarMenu":
        $retorno = $men->listarMenus();
        break;
}
echo json_encode($retorno);
?>