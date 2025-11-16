<?php
class compraEstadoTipo{
    private $idcompraestadotipo;
    private $cetDescripcion;
    private $cetDetalle;

    public function __construct(){
        $this->idcompraestadotipo = 0;
        $this->cetDescripcion = "";
        $this->cetDetalle = "";
    }
    public function getIdcompraestadotipo(){
        return $this->idcompraestadotipo;
    }
    public function setIdcompraestadotipo($idcompraestadotipo){
        $this->idcompraestadotipo = $idcompraestadotipo;
    }
    public function getCetDescripcion(){
        return $this->cetDescripcion;
    }
    public function setCetDescripcion($cetDescripcion){
        $this->cetDescripcion = $cetDescripcion;
    }
    public function getCetDetalle(){
        return $this->cetDetalle;
    }
    public function setCetDetalle($cetDetalle){
        $this->cetDetalle = $cetDetalle;
    }
    public function ingresar($cetDescripcion,$cetDetalle){
        $this->setCetDescripcion($cetDescripcion);
        $this->setCetDetalle($cetDetalle);
        $sql = "INSERT INTO compraestadotipo (cetdescripcion, cetdetalle) VALUES ('".$this->getCetDescripcion()."','".$this->getCetDetalle()."')";
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function eliminar($idcompraestadotipo){
        $this->setIdcompraestadotipo($idcompraestadotipo);
        $sql = "DELETE FROM compraestadotipo WHERE idcompraestadotipo = ".$this->getIdcompraestadotipo();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function modificar($idcompraestadotipo,$cetDescripcion,$cetDetalle){
        $this->setIdcompraestadotipo($idcompraestadotipo);
        $this->setCetDescripcion($cetDescripcion);
        $this->setCetDetalle($cetDetalle);
        $sql = "UPDATE compraestadotipo SET cetdescripcion = '".$this->getCetDescripcion()."', cetdetalle = '".$this->getCetDetalle()."' WHERE idcompraestadotipo = ".$this->getIdcompraestadotipo();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function listar(){
        $sql = "SELECT * FROM compraestadotipo";
        $bd = new BaseDatos();
        $resultado = $bd->query($sql);
        $lista = [];

        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $cet = new CompraEstadoTipo();
            $cet->setId($fila['idcompraestadotipo']);
            $cet->setDescripcion($fila['cedescripcion']);
            $cet->setDetalle($fila['cetdetalle']);
            $lista[] = $cet;
        }

        return $lista;
    }

}