<?php
class compraItemAMB{
    public function crearCompItem($idproducto,$cantidad){
        $idus = sesion::get("idusuario");
        $comp = new compraAMB();
        $idcomp = $comp->buscarPorIdUsuario($idus); 
        $comprItem = new compraItem();
        $retorno = $comprItem->ingresarCompItem($idproducto,$idcomp,$cantidad);
        return $retorno;
    }
}