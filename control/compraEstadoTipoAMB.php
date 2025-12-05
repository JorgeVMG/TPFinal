<?php
class compraEstadoTipoAMB{
    public function obtenerTipo($id){
        $cet = new compraEstadoItem();
        $retorno = $cet->buscarTipo($id);
        return $retorno;
    }
}