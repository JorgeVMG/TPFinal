<?php
class productoAMB{
    public function listarProductos(){
        $pro = new producto();
        $lista = $pro->listar();
        $retorno = [];
        foreach ($lista as $pr){
            $retorno[]=[
                "idproducto"=>$pr->getIdproducto(),
                "pronombre"=>$pr->getPronombre(),
                "prodetalle"=>$pr->getProdetalle(),
                "procantstock"=>$pr->getProcantstock(),
                "proprecio"=>$pr->getProPrecio(),
                "prodesactivado"=>$pr->getProDesactivado()
            ];
        }
        return $retorno;
    }
    public function agregar($nombreProd,$detallePro,$precioPro,$canProd){
        $pro = new producto();
        $retorno = $pro->ingresar($nombreProd,$detallePro,$precioPro,$canProd);
        return $retorno;
    }
    public function modificar($idpro,$nombrepro,$detallepro,$stockpro,$preciopro){
        $pro = new producto();
        $retorno = $pro->modificarProducto($idpro,$nombrepro,$detallepro,$stockpro,$preciopro);
        return $retorno;
    }
    public function estadoCambio($idpro){
        $pro = new producto();
        $retorno = $pro->cambioEstado($idpro);
        return $retorno;
    }
}