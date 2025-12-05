<?php
class compraEstadoAMB{
    public function creacionEstadoCompra($idcompr,$idcompraestadotipo,$cefechaini){
        $comEst = new compraEstado();
        $retorno = $comEst->ingresoCompEstado($idcompr,$idcompraestadotipo,$cefechaini);
        return $retorno;
    }
}