<?php
class producto{
    private $idproducto;
    private $pronombre;
    private $prodetalle;
    private $procantstock;

    public function __construct(){
        $this->idproducto = 0;
        $this->pronombre = "";
        $this->prodetalle = "";
        $this->procantstock = 0;
    }
    public function getIdproducto(){
        return $this->idproducto;
    }
    public function setIdproducto($idproducto){
        $this->idproducto = $idproducto;
    }
    public function getPronombre(){
        return $this->pronombre;
    }
    public function setPronombre($pronombre){
        $this->pronombre = $pronombre;
    }
    public function getProdetalle(){
        return $this->prodetalle;
    }
    public function setProdetalle($prodetalle){
        $this->prodetalle = $prodetalle;
    }
    public function getProcantstock(){
        return $this->procantstock;
    }
    public function setProcantstock($procantstock){
        $this->procantstock = $procantstock;
    }
    public function ingresar($pronombre,$prodetalle,$procantstock){
        $this->setPronombre($pronombre);
        $this->setProdetalle($prodetalle);
        $this->setProcantstock($procantstock);
        $sql = "INSERT INTO producto (pronombre, prodetalle, procantstock) VALUES ('".$this->getPronombre()."','".$this->getProdetalle()."',".$this->getProcantstock().")";
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function eliminar($idproducto){
        $this->setIdproducto($idproducto);
        $sql = "DELETE FROM producto WHERE idproducto = ".$this->getIdproducto();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function modificar($idproducto,$pronombre,$prodetalle,$procantstock){
        $this->setIdproducto($idproducto);
        $this->setPronombre($pronombre);
        $this->setProdetalle($prodetalle);
        $this->setProcantstock($procantstock);
        $sql = "UPDATE producto SET pronombre = '".$this->getPronombre()."', prodetalle = '".$this->getProdetalle()."', procantstock = ".$this->getProcantstock()." WHERE idproducto = ".$this->getIdproducto();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function listar(){
        $sql = "SELECT * FROM producto";
        $bd = new BaseDatos();
        $resultado = $bd->query($sql);
        $lista = [];

        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $producto = new Producto();
            $producto->setId($fila['idproducto']);
            $producto->setNombre($fila['pronombre']);
            $producto->setDetalle($fila['prodetalle']);
            $producto->setStock($fila['procantstock']);
            $lista[] = $producto;
        }
        return $lista;
    }

}