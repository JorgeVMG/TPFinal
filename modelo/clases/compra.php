<?php
class compra{
    private $idcompra;
    private $cofecha;
    private $idusuario;

    public function __construct(){
        $this->idcompra = 0;
        $this->cofecha = "";
        $this->idusuario = 0;
    }

    public function getIdcompra(){
        return $this->idcompra;
    }
    public function setIdcompra($idcompra){
        $this->idcompra = $idcompra;
    }
    public function getCofecha(){
        return $this->cofecha;
    }
    public function setCofecha($cofecha){
        $this->cofecha = $cofecha;
    }
    public function getIdusuario(){
        return $this->idusuario;
    }
    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
    }
    public function crearCompra($idusuario) {
        $this->setIdusuario($idusuario);
        $sql = "INSERT INTO compra (idusuario) VALUES (".$this->getIdusuario().")";
        
        $bd = new BaseDatos();
        
        // Exec ejecuta INSERT y devuelve cantidad de filas afectadas
        $filas = $bd->exec($sql);

        if ($filas > 0) {
            // Tomamos el ID creado
            $id = $bd->lastInsertId();
            return ["success" => true, "idcompra" => $id];
        } else {
            return ["success" => false];
        }
    }

    public function eliminar($idcompra){
        $this->setIdcompra($idcompra);
        $sql = "DELETE FROM compra WHERE idcompra = ".$this->getIdcompra();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function modificar($idcompra,$cofecha,$idusuario){
        $this->setIdcompra($idcompra);
        $this->setCofecha($cofecha);
        $this->setIdusuario($idusuario);
        $sql = "UPDATE compra SET cofecha = '".$this->getCofecha()."', idusuario = ".$this->getIdusuario()." WHERE idcompra = ".$this->getIdcompra();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function listar(){
        $sql = "SELECT * FROM compra";
        $bd = new BaseDatos();
        $resultado = $bd->query($sql);
        $lista = [];

        while($fila = $resultado){
            $compra = new Compra();
            $compra->setId($fila['idcompra']);
            $compra->setFecha($fila['cofecha']);
            $compra->setIdUsuario($fila['idusuario']);
            $lista[] = $compra;
        }

        return $lista;
    }

    public function buscar($idcompra){
        $this->setIdcompra($idcompra);
        $sql = "SELECT * FROM compra WHERE idcompra = ".$this->getIdcompra();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function listarCompraDeUsuario($idusuario){
        $this->setIdusuario($idusuario);
        $sql = "SELECT * FROM compra WHERE idusuario = ".$this->getIdusuario();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function buscarIdUsu($idus){
        $sql = "SELECT idcompra FROM compra WHERE idusuario = $idus";
        $bd = new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
}