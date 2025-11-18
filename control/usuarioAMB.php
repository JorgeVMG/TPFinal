<?php
class usuarioAMB{
    public function crearUsuario($usuario, $email, $contrasena){
        $us = new usuario();
        $retorno = $us->ingresar($usuario, $email, $contrasena);
        return $retorno;
    }
    public function modificarUsuario($id, $usuario, $email, $rol){
        $us = new usuario();
        $usrol= new usuarioRolAMB();
        $ur = $usrol->modificarRol($id, $rol);
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
        $lista = $us->listar();
        $usuarioRol = new usuarioRolAMB();
        $rolobj = new rolAMB();
        $estado = "";
        $result = [];

        foreach ($lista as $u) {
            $idrolusuario = $usuarioRol->obtenerRolPorUsuario($u->getId());
            $rol = $rolobj->obtenerRol($idrolusuario);
            if($u->getusdeshabilitado() == null){
                $estado = "activo";
            }else{
                $estado = "deshabilitado";
            }
            $result[] = [
                "idusuario"=> $u->getId(),
                "usnombre"=> $u->getNombre(),
                "usmail"=> $u->getEmail(),
                "rol"=> $rol->getNombre(),
                "estado"=> $estado
            ];
        }
        return $result;
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
    public function habilitarUsuario($id){
        $us = new usuario();
        $retorno = $us->activar($id);
        return $retorno;
    }
}
