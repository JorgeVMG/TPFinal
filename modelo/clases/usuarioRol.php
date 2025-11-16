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
        $sql = "INSERT INTO usuariorol (idusuario, idrol) VALUES (".$this->getIdUsuario().",".$this->getIdRol().")";
    }
    public function modificarRol($idUsuario,$idRol){
        $this->setIdUsuario($idUsuario);
        $this->setIdRol($idRol);
        $sql = "UPDATE usuariorol SET idrol = ".$this->getIdRol()." WHERE idusuario = ".$this->getIdUsuario();
    }
}