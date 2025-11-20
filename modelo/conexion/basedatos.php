<?php
class BaseDatos extends PDO {
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    private $debug;
    private $conec;
    private $indice;
    private $resultado;
    private $error;
    private $sql;

    public function __construct() {
        $this->engine = 'mysql';
        $this->host = 'localhost';
        $this->database = 'bdcarritocompr';
        $this->user = 'root';
        $this->pass = '';
        $this->debug = true;
        $this->error = "";
        $this->sql = "";
        $this->indice = 0;

        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host; 
        try { 
            parent::__construct( $dns, $this->user, $this->pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); 
            $this->conec=true; 
        }catch (PDOException $e) {
            $this->sql = $e->getMessage(); 
            $this->conec=false; 
        }
    }

    public function getConec() {
        return $this->conec;
    }

    public function setDebug($debug) {
        $this->debug = $debug;
    }

    public function getDebug() {
        return $this->debug;
    }

    public function Iniciar() {
        return $this->getConec();
    }

    private function setIndice($valor) {
        $this->indice = $valor;
    }

    private function getIndice() {
        return $this->indice;
    }

    private function setResultado($valor) {
        $this->resultado = $valor;
    }

    private function getResultado() {
        return $this->resultado;
    }
}
