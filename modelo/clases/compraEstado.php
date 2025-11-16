<?php
class compraEstado{
    private $idcompraestado;
    private $idcompra;
    private $idcompraestadotipo;
    private $cefechaini;
    private $cefechafin;

    public function __construct(){
        $this->idcompraestado = 0;
        $this->idcompra = 0;
        $this->idcompraestadotipo = 0;
        $this->cefechaini = "";
        $this->cefechafin = "";
    }
    public function getIdcompraestado(){
        return $this->idcompraestado;
    }  
    public function setIdcompraestado($idcompraestado){
        $this->idcompraestado = $idcompraestado;
    }
    public function getIdcompra(){
        return $this->idcompra;
    }
    public function setIdcompra($idcompra){
        $this->idcompra = $idcompra;
    }
    public function getIdcompraestadotipo(){
        return $this->idcompraestadotipo;
    }
    public function setIdcompraestadotipo($idcompraestadotipo){
        $this->idcompraestadotipo = $idcompraestadotipo;
    }
    public function getCefechaini(){
        return $this->cefechaini;
    }
    public function setCefechaini($cefechaini){
        $this->cefechaini = $cefechaini;
    }
    public function getCefechafin(){
        return $this->cefechafin;
    }
    public function setCefechafin($cefechafin){
        $this->cefechafin = $cefechafin;
    }
    public function ingresar($idcompra,$idcompraestadotipo,$cefechaini,$cefechafin){
        $this->setIdcompra($idcompra);
        $this->setIdcompraestadotipo($idcompraestadotipo);
        $this->setCefechaini($cefechaini);
        $this->setCefechafin($cefechafin);
        $sql = "INSERT INTO compraestado (idcompra, idcompraestadotipo, cefechaini, cefechafin) VALUES (".$this->getIdcompra().",".$this->getIdcompraestadotipo().",'".$this->getCefechaini()."','".$this->getCefechafin()."')";
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function eliminar($idcompraestado){
        $this->setIdcompraestado($idcompraestado);
        $sql = "DELETE FROM compraestado WHERE idcompraestado = ".$this->getIdcompraestado();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function modificar($idcompraestado,$idcompra,$idcompraestadotipo,$cefechaini,$cefechafin){
        $this->setIdcompraestado($idcompraestado);
        $this->setIdcompra($idcompra);
        $this->setIdcompraestadotipo($idcompraestadotipo);
        $this->setCefechaini($cefechaini);
        $this->setCefechafin($cefechafin);
        $sql = "UPDATE compraestado SET idcompra = ".$this->getIdcompra().", idcompraestadotipo = ".$this->getIdcompraestadotipo().", cefechaini = '".$this->getCefechaini()."', cefechafin = '".$this->getCefechafin()."' WHERE idcompraestado = ".$this->getIdcompraestado();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function listar(){
        $sql = "SELECT * FROM compraestado";
        $bd = new BaseDatos();
        $resultado = $bd->query($sql);
        $lista = [];

        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $ce = new CompraEstado();
            $ce->setId($fila['idcompraestado']);
            $ce->setIdCompra($fila['idcompra']);
            $ce->setIdTipo($fila['idcompraestadotipo']);
            $ce->setFechaInicio($fila['cefechaini']);
            $ce->setFechaFin($fila['cefechafin']);
            $lista[] = $ce;
        }

        return $lista;
    }

}