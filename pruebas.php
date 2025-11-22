<?php
header('Content-Type: application/json');
include "configuracion.php";
$pro = new productoAMB();
$retorno = $pro->estadoCambio(1);
echo json_encode($retorno);