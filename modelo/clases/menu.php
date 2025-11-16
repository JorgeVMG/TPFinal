<?php
class menu{
    private $idmenu;
    private $menombre;
    private $medescripcion;
    private $idpadre;
    private $medeshabilitado;

    public function __construct(){
        $this->idmenu = 0;
        $this->menombre = "";
        $this->medescripcion = "";
        $this->idpadre = 0;
        $this->medeshabilitado = "";
    }
    public function getIdmenu(){
        return $this->idmenu;
    }
    public function setIdmenu($idmenu){
        $this->idmenu = $idmenu;
    }
    public function getMenombre(){
        return $this->menombre;
    }
    public function setMenombre($menombre){
        $this->menombre = $menombre;
    }
    public function getMedescripcion(){
        return $this->medescripcion;
    }
    public function setMedescripcion($medescripcion){
        $this->medescripcion = $medescripcion;
    }
    public function getIdpadre(){
        return $this->idpadre;
    }
    public function setIdpadre($idpadre){
        $this->idpadre = $idpadre;
    }
    public function getMedeshabilitado(){
        return $this->medeshabilitado;
    }
    public function setMedeshabilitado($medeshabilitado){
        $this->medeshabilitado = $medeshabilitado;
    }
    public function ingresar($menombre,$medescripcion,$idpadre){
        $this->setMenombre($menombre);
        $this->setMedescripcion($medescripcion);
        $this->setIdpadre($idpadre);
        $sql = "INSERT INTO menu (menombre, medescripcion, idpadre) VALUES ('".$this->getMenombre()."','".$this->getMedescripcion()."',".$this->getIdpadre().")";
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function eliminar($idmenu){
        $this->setIdmenu($idmenu);
        $sql = "DELETE FROM menu WHERE idmenu = ".$this->getIdmenu();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function modificar($idmenu,$menombre,$medescripcion,$idpadre){
        $this->setIdmenu($idmenu);
        $this->setMenombre($menombre);
        $this->setMedescripcion($medescripcion);
        $this->setIdpadre($idpadre);
        $sql = "UPDATE menu SET menombre = '".$this->getMenombre()."', medescripcion = '".$this->getMedescripcion()."', idpadre = ".$this->getIdpadre()." WHERE idmenu = ".$this->getIdmenu();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function listar(){
        $sql = "SELECT * FROM menu";
        $bd = new BaseDatos();
        $resultado = $bd->query($sql);
        $lista = [];

        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $menu = new Menu();
            $menu->setId($fila['idmenu']);
            $menu->setNombre($fila['menombre']);
            $menu->setDescripcion($fila['medescripcion']);
            $menu->setIdPadre($fila['idpadre']);
            $menu->setDeshabilitado($fila['medeshabilitado']);
            $lista[] = $menu;
        }

        return $lista;
    }

}