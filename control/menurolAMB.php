<?php
class menurolAMB{
    public function buscarIdRol($idmenu){
        $menurol = new menuRol();
        $idrol = $menurol->obteridrol($idmenu);
        return $idrol;
    }
}