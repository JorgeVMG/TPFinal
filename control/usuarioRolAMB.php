<?php
class usuarioRolAMB {
    public function asignarRol($idUsuario, $rol) {
        $ur = new usuarioRol();
        $retorno = $ur->asignarRol($idUsuario, $rol);
        return $retorno;
    }
    public function modificarRol($idUsuario, $rol) {
        $ur = new usuarioRol();
        $retorno = $ur->modificarRol($idUsuario, $rol);
        return $retorno;
    }
    public function obtenerRolPorUsuario($idUsuario) {
        $ur = new usuarioRol();
        $retorno = $ur->obtenerRolPorUsuario($idUsuario);
        return $retorno;
    }
}