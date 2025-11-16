<?php
class compraItem{
    private $idcompraItem;
    private $idproducto;
    private $idcompra;
    private $cicantidad;

    public function __construct(){
        $this->idcompraItem = 0;
        $this->idproducto = 0;
        $this->idcompra = 0;
        $this->cicantidad = 0;
    }
    public function getIdcompraItem(){
        return $this->idcompraItem;
    }
    public function setIdcompraItem($idcompraItem){
        $this->idcompraItem = $idcompraItem;
    }
    public function getIdproducto(){
        return $this->idproducto;
    }
    public function setIdproducto($idproducto){
        $this->idproducto = $idproducto;
    }
    public function getIdcompra(){
        return $this->idcompra;
    }
    public function setIdcompra($idcompra){
        $this->idcompra = $idcompra;
    }
    public function getCicantidad(){
        return $this->cicantidad;
    }
    public function setCicantidad($cicantidad){
        $this->cicantidad = $cicantidad;
    }
    public function ingresar($idproducto,$idcompra,$cicantidad){
        $this->setIdproducto($idproducto);
        $this->setIdcompra($idcompra);
        $this->setCicantidad($cicantidad);
        $sql = "INSERT INTO compraitem (idproducto, idcompra, cicantidad) VALUES (".$this->getIdproducto().",".$this->getIdcompra().",".$this->getCicantidad().")";
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function eliminar($idcompraItem){
        $this->setIdcompraItem($idcompraItem);
        $sql = "DELETE FROM compraitem WHERE idcompraitem = ".$this->getIdcompraItem();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function modificar($idcompraItem,$idproducto,$idcompra,$cicantidad){
        $this->setIdcompraItem($idcompraItem);
        $this->setIdproducto($idproducto);
        $this->setIdcompra($idcompra);
        $this->setCicantidad($cicantidad);
        $sql = "UPDATE compraitem SET idproducto = ".$this->getIdproducto().", idcompra = ".$this->getIdcompra().", cicantidad = ".$this->getCicantidad()." WHERE idcompraitem = ".$this->getIdcompraItem();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function listar(){
        $sql = "SELECT * FROM compraitmem";
        $bd = new BaseDatos();
        $resultado = $bd->query($sql);
        $lista = [];

        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $item = new CompraItem();
            $item->setId($fila['idcompraitem']);
            $item->setIdProducto($fila['idproducto']);
            $item->setIdCompra($fila['idcompra']);
            $item->setCantidad($fila['cicantidad']);
            $lista[] = $item;
        }

        return $lista;
    }

}