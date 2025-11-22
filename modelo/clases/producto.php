<?php
class producto{
    private $idproducto;
    private $pronombre;
    private $prodetalle;
    private $procantstock;
    private $proprecio;
    private $prodesactivado;
    public function __construct(){
        $this->idproducto = 0;
        $this->pronombre = "";
        $this->prodetalle = "";
        $this->procantstock = 0;
        $this->proprecio=0;
        $this->prodesactivado="";
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
     public function getProPrecio(){
        return $this->proprecio;
    }
    public function setProPrecio($proPrecio){
        $this->proprecio = $proPrecio;
    }
    public function getProDesactivado(){
        return $this->prodesactivado;
    }
    public function setProDesactivado($prodesactivado){
        $this->prodesactivado = $prodesactivado;
    }
    public function ingresar($pronombre,$prodetalle,$proprecio,$procantstock){
        $this->setPronombre($pronombre);
        $this->setProdetalle($prodetalle);
        $this->setProcantstock($procantstock);
        $this->setProPrecio($proprecio);
        $sql = "INSERT INTO producto (pronombre, prodetalle, procantstock, proprecio) VALUES ('".$this->getPronombre()."','".$this->getProdetalle()."',".$this->getProcantstock().",".$this->getProPrecio().")";
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
    public function modificarProducto($idproducto,$pronombre,$prodetalle,$procantstock,$proprecio){
        $this->setIdproducto($idproducto);
        $this->setPronombre($pronombre);
        $this->setProdetalle($prodetalle);
        $this->setProcantstock($procantstock);
        $this->setProPrecio($proprecio);
        $sql = "UPDATE producto SET pronombre = '".$this->getPronombre()."', prodetalle = '".$this->getProdetalle()."', procantstock = ".$this->getProcantstock().", proprecio =".$this->getProPrecio()." WHERE idproducto = ".$this->getIdproducto();
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
            $producto->setIdproducto($fila['idproducto']);
            $producto->setPronombre($fila['pronombre']);
            $producto->setProdetalle($fila['prodetalle']);
            $producto->setProcantstock($fila['procantstock']);
            $producto->setProPrecio($fila["proprecio"]);
            $producto->setProDesactivado($fila["prodesactivado"]);
            $lista[] = $producto;
        }
        return $lista;
    }
    public function buscar($idpro){
        $this->setIdproducto($idpro);
        $sql= "SELECT * FROM producto WHERE idproducto = ".$this->getIdproducto();
        $bd = new BaseDatos();
        $ejecucion = $bd->query($sql);
        $retorno = null;
        if($ejecucion && $fila = $ejecucion->fetch(PDO::FETCH_ASSOC)){
            $producto = new producto();
            $producto->setIdproducto($fila['idproducto']);
            $producto->setPronombre($fila['pronombre']);
            $producto->setProdetalle($fila['prodetalle']);
            $producto->setProcantstock($fila['procantstock']);
            $producto->setProPrecio($fila["proprecio"]);
            $producto->setProDesactivado($fila["prodesactivado"]);
            $retorno = $producto;
        }
        return $retorno;

    }
    public function cambioestado($idpro){
        $encontrado = $this->buscar($idpro);
        $retorno = false;
        if($encontrado != null){
            if($encontrado->getProDesactivado() == null){
                $cambioEstado = "NOW()";  
            }else{
                $cambioEstado = "NULL";   
            }
            $sql = "UPDATE producto SET prodesactivado = $cambioEstado WHERE idproducto = ".$encontrado->getIdproducto();

            $bd = new BaseDatos();
            $retorno = $bd->exec($sql);
        }

        return $retorno;
    }


}