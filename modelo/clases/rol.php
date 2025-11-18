<?php
class rol{
    private $id;
    private $nombre;

    public function __construct(){
        $this->id = 0;
        $this->nombre = "";
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function ingresar($nombre){
        $this->setNombre($nombre);
        $sql = "INSERT INTO rol (rolnombre) VALUES ('".$this->getNombre()."')";
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function eliminar($id){
        $this->setId($id);
        $sql = "DELETE FROM rol WHERE idrol = ".$this->getId();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function modificar($id,$nombre){
        $this->setId($id);
        $this->setNombre($nombre);
        $sql = "UPDATE rol SET rolnombre = '".$this->getNombre()."' WHERE idrol = ".$this->getId();
        $bd= new BaseDatos();
        $retorno = $bd->exec($sql);
        return $retorno;
    }
    public function listar(){
        $sql = "SELECT * FROM rol";
        $bd = new BaseDatos();
        $resultado = $bd->query($sql);
        $lista = [];

        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $rol = new Rol();
            $rol->setId($fila['idrol']);
            $rol->setNombre($fila['rodescripcion']);
            $lista[] = $rol;
        }

        return $lista;
    }

    public function buscarRol($id){
        $this->setId($id);
        $sql = "SELECT * FROM rol WHERE idrol = ".$id;
        $bd = new BaseDatos();
        $resultado = $bd->query($sql);
        if($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $rol = new rol();
            $rol->setId($fila['idrol']);
            $rol->setNombre($fila['rodescripcion']);
            $retorno = $rol;
        }
        return $retorno;
    }
}