<?php
class usuarioRol{
    private $idUsuario;
    private $idRol;

    public function __construct(){
        $this->idUsuario = 0;
        $this->idRol = 0;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getIdRol(){
        return $this->idRol;
    }

    public function setIdRol($idRol){
        $this->idRol = $idRol;
    }
    public function asignarRol($idUsuario,$idRol){
        $this->setIdUsuario($idUsuario);
        $this->setIdRol($idRol);
        $baseDatos = new BaseDatos();
        $sql = "INSERT INTO usuariorol (idusuario, idrol) VALUES (".$this->getIdUsuario().",".$this->getIdRol().")";
        $retorno = $baseDatos->exec($sql);
        return $retorno;
    }
    public function modificarRol($idUsuario,$idRol){
        $this->setIdUsuario($idUsuario);
        $this->setIdRol($idRol);
        $baseDatos = new BaseDatos();
        $sql = "UPDATE usuariorol SET idrol = ".$this->getIdRol()." WHERE idusuario = ".$this->getIdUsuario();
        $retorno = $baseDatos->exec($sql);
        return $retorno;
    }
    public function obtenerRolPorUsuario($idUsuario){
        $this->setIdUsuario($idUsuario);
        $baseDatos = new BaseDatos();
        $sql = "SELECT idrol FROM usuariorol WHERE idusuario = ".$this->getIdUsuario();
        $resultado = $baseDatos->query($sql);
        if($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->setIdRol($fila['idrol']);
            $retorno = $this->getIdRol();
        } else {
            $retorno = null;
        }
        return $retorno;
    }
}