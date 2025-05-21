<?php
require_once "classes/Produto.php";
class IndexController{
    public function index(){
        $prod = new Produto();
        $ret = $prod->generateData();

        #$ret será repassado automaticamente para a home por ter sido instanciado antes do require_once abaixo
        require_once "public/pages/home/home.php";
    }
}
?>