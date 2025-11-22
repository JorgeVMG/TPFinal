<?php
class usuarioAMB{
    public function crearUsuario($usuario, $email, $contrasena){
        $us = new usuario();
        $ejecucion = $us->ingresar($usuario, $email, $contrasena);
        $retorno = false;
        if($ejecucion){
            $idusuario = $ejecucion["idusuario"];
            $usrol = new usuarioRolAMB();
            $rol = $usrol->asignarRol($idusuario, 2); //rol por defecto
            $retorno = true;
        }
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
    public function validarCredenciales($nombreUsuario, $contrasena){
        $us = new usuario();
        $usrol = new usuarioRolAMB();
        $rolAMB = new rolAMB();
        $sesion = new sesion();
        $ejecucion = $us->validarUsuario($nombreUsuario, $contrasena);
        if($ejecucion["valid"]){
            $idrol = $usrol->obtenerRolPorUsuario($ejecucion["idusuario"]);
            $rol = $rolAMB->obtenerRol($idrol);
            $sesion::set("rol",$rol->getNombre());
            $sesion::set("usuario",$ejecucion["usnombre"]);
        }
        $retorno = $ejecucion["valid"];
        return $retorno;
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
