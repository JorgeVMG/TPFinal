<?php
$usuario = ["id" => 1, "nombre" => "yamel"];//mas usuarios
$rol = ["idrol" => 3, "roldes" => "cliente "];//mas roles
$rolusuario = ["idusuario" => 1, "idrol" => 3];

if($rolusuario["idusuario"] == 1){
    echo "nombre usuario es: ".$usuario["nombre"];
}else{
    echo "usuario no existe, se fue de viaje, nos abandono";
}
