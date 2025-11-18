<?php
class rolAMB{
    public function crearRol($rol){
        $r = new rol();
        $retorno = $r->ingresar($rol);
        return $retorno;
    }
    public function obtenerRol($id){
        $r = new rol();
        $rol = $r->buscarRol($id);
        return $rol;
    }
    public function listarRoles(){
        $r = new rol();
        $lista = $r->listar();
        return $lista;
    }
}