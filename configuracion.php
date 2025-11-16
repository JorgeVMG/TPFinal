<?php 
header('Content-Type: text/html; charset=utf-8');
header ("Cache-Control: no-cache, must-revalidate ");

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';

$PROYECTO = '/TPFinal/';

$ROOT = $_SERVER['DOCUMENT_ROOT'] . $PROYECTO;
$_SESSION['ROOT'] = $ROOT;

define('ROOT_PATH', $ROOT);
define('BASE_URL', $protocol . $_SERVER['HTTP_HOST'] . $PROYECTO);

include_once(ROOT_PATH . 'util/funciones.php');
?>
