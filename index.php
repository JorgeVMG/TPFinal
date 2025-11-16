<?php
include_once('configuracion.php');
session_start();

$page = $_GET['page'] ?? null;
$submit = $_GET['submit'] ?? null;
if ($page === null) {
    $page = $submit ? 'action' : 'presentacion';
}
$rutas = [
    "presentacion" => "vista/publica/presentacion.php",
    "login"=> "vista/publica/login.php",
    "admin_usuario"=> "vista/privada/administradorUsuarios.php"
];

$url = $rutas[$page] ?? $rutas["presentacion"];

include_once 'vista/estructura/header.php';
require $url;
include_once 'vista/estructura/footer.php';
