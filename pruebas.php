<?php
header('Content-Type: application/json');
include "configuracion.php";
$us = new usuarioAMB();
$usValid = $us->usuarioValido("juanIbarra", "Linda2025");
if($usValid["valid"]){
            session_start();
            $_SESSION['idusuario'] = $usValid["idusuario"];
            $_SESSION['usnombre'] = $usValid["usnombre"];
            $_SESSION['rol'] = $usValid["rol"];
            $retorno = ["valid" => "existe"];
        }else{
            $retorno= ["valid" => "noexiste"];
        }
echo json_encode($retorno);