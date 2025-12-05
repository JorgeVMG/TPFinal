<?php
include_once('configuracion.php');
sesion::start();

$page = $_GET['page'] ?? null;
$submit = $_GET['submit'] ?? null;
if ($page === null) {
    $page = $submit ? 'action' : 'presentacion';
}
$rutas = [
    "presentacion" => "vista/publica/presentacion.php",
    "login"=> "vista/publica/login.php",
    "admin_usuario"=> "vista/privada/administradorUsuarios.php",
    "admin_producto"=> "vista/privada/adminProductos.php",
    "crear"=> "vista/publica/crearUsuario.php",
    "carrito"=> "vista/publica/carritoCompra.php",
    "admin_menu"=> "vista/privada/adminmenu.php"
];

$url = $rutas[$page] ?? $rutas["presentacion"];

include_once 'vista/estructura/header.php';
require $url;
include_once 'vista/estructura/footer.php';
