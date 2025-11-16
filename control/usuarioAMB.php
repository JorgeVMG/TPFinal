<?php
class usuarioAMB{
    public function crearUsuario($usuario, $email, $contrasena){
        $us = new usuario();
        $retorno = $us->ingresar($usuario, $email, $contrasena);
        return $retorno;
    }
    public function modificarUsuario($id, $usuario, $email, $contrasena){
        $us = new usuario();
        $retorno = $us->modificar($id, $usuario, $email, $contrasena);
        return $retorno;
    }
    public function eliminarUsuario($id){
        $us = new usuario();
        $retorno = $us->eliminar($id);
        return $retorno;
    }
    public function listarUsuarios(){
        $us = new usuario();
        $listaUsuarios = $us->listar();
        return $listaUsuarios;
    }
    public function obtenerUsuarioPorId($id){
        $us = new usuario();
        $usuario = $us->buscarPorId($id);
        return $usuario;
    }
    public function deshabilitarUsuario($id){
        $us = new usuario();
        $retorno = $us->desactivar($id);
        return $retorno;
    }
}