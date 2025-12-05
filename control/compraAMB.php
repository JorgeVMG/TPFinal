<?php
class compraAMB{
    public function crearCarrito($idusuario){
        $comp = $this->crearCompr($idusuario);
        $idcompra = $comp["idcompra"];
        $compEst = new compraEstadoAMB();
        $retorno = $compEst->creacionEstadoCompra($idcompra,1,NULL);
        return $retorno;
    }
    public function crearCompr($idusuario){
        $comp = new compra();
        $retno = $comp->crearCompra($idusuario);
        return $retno;
    }
    public function buscarPorIdUsuario($idusuario){
        $comp = new compra();
        $retorno = $comp->buscarIdUsu($idusuario);
        return $retorno;
    }
}