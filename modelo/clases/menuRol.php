<?php
class menuRol{
    private $idMenu;
    private $idRol;

    public function __construct(){
        $this->idMenu = 0;
        $this->idRol = 0;
    }

    public function getIdMenu(){
        return $this->idMenu;
    }

    public function setIdMenu($idMenu){
        $this->idMenu = $idMenu;
    }

    public function getIdRol(){
        return $this->idRol;
    }

    public function setIdRol($idRol){
        $this->idRol = $idRol;
    }
    public function asignarMenuRol($idMenu,$idRol){
        $this->setIdMenu($idMenu);
        $this->setIdRol($idRol);
        $sql = "INSERT INTO menuroles (idmenu, idrol) VALUES (".$this->getIdMenu().",".$this->getIdRol().")";
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function eliminarMenuRol($idMenu,$idRol){
        $this->setIdMenu($idMenu);
        $this->setIdRol($idRol);
        $sql = "DELETE FROM menuroles WHERE idmenu = ".$this->getIdMenu()." AND idrol = ".$this->getIdRol();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function modificarMenuRol($idMenu,$idRolNuevo){
        $this->setIdMenu($idMenu);
        $this->setIdRol($idRolNuevo);
        $sql = "UPDATE menuroles SET idrol = ".$this->getIdRol()." WHERE idmenu = ".$this->getIdMenu();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function obteridrol($idmenu){
        $this->setIdMenu($idMenu);
        $sql = "SELECT idrol FROM menurol WHERE idmenu = ".$this->getIdMenu();
        $bd= new BaseDatos();
        $retorno = $bd->query($sql);
        return $retorno;
    }
}