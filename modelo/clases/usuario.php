<?php
class usuario{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $usdeshabilitado;

    public function __construct(){
        $this->id = 0;
        $this->nombre = "";
        $this->email = "";
        $this->password = "";
        $this->usdeshabilitado = "";
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

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getusdeshabilitado(){
        return $this->usdeshabilitado;
    }

    public function setusdeshabilitado($usdeshabilitado){
        $this->usdeshabilitado = $usdeshabilitado;
    }
    public function ingresar($nombre,$email,$password){
        $this->setNombre($nombre);
        $this->setEmail($email);
        $this->setPassword($password);
        $sql = "INSERT INTO usuario (usnombre, usemail, uspass) VALUES ('".$this->getNombre()."','".$this->getEmail()."','".$this->getPassword()."')";
        $baseDatos = new BaseDatos();
        $retorno = $baseDatos->exec($sql);
        return $retorno;
    }
    public function modificar($id,$nombre,$email,$password){
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setEmail($email);
        $this->setPassword($password);
        $sql = "UPDATE usuario SET usnombre = '".$this->getNombre()."', usemail = '".$this->getEmail()."', uspass = '".$this->getPassword()."' WHERE idusuario = ".$this->getId();
        $baseDatos = new BaseDatos();
        $retorno = $baseDatos->exec($sql);
        return $retorno;
    }
    public function eliminar($id){
        $this->setId($id);
        $sql = "DELETE FROM usuario WHERE idusuario = ".$this->getId();
        $baseDatos = new BaseDatos();
        $retorno = $baseDatos->exec($sql);
        return $retorno;
    }
    public function buscar($id){
        $this->setId($id);
        $sql = "SELECT * FROM usuario WHERE idusuario = ".$this->getId();
        $baseDatos = new BaseDatos();
        $resultado = $baseDatos->query($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        if($fila){
            $this->setNombre($fila['usnombre']);
            $this->setEmail($fila['usemail']);
            $this->setPassword($fila['uspass']);
            return true;
        }else{
            return false;
        }
    }
    public function listar(){
        $sql = "SELECT * FROM usuario";
        $baseDatos = new BaseDatos();
        $resultado = $baseDatos->query($sql);
        $listaUsuarios = array();
        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $usuario = new usuario();
            $usuario->setId($fila['idusuario']);
            $usuario->setNombre($fila['usnombre']);
            $usuario->setEmail($fila['usmail']);
            $usuario->setPassword($fila['uspass']);
            $listaUsuarios[] = $usuario;
        }
        return $listaUsuarios;
    }
    public function desactivar($id){
        $this->setId($id);
        $sql = "UPDATE usuario SET usdeshabilitado = NOW() WHERE idusuario = ".$this->getId();
        $baseDatos = new BaseDatos();
        $retorno = $baseDatos->exec($sql);
        return $retorno;
    }
}
