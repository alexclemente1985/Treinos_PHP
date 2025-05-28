<?php
require_once "classes/Cliente.php";
require_once "classes/Produto.php";

require_once "classes/CartaoCredito.php";
require_once "classes/Boleto.php";
require_once "classes/PayPal.php";
require_once "classes/abstracts/Notification.php";
class CartController extends Notification{
    public function insertCart(){
        $id = 0;
        $clients = (new Cliente())->getAllClients();

        if($_GET && isset($_GET['id'])){
            $id = $_GET['id'];
            $qtde = 1;
            $exists = false;

            if(!isset($_SESSION['cart'])){
                $line = -1;
            }
            else{
                $line = count($_SESSION['cart']) - 1;
            }          
            

            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $l => $value){     
                   
                    if($value['id'] == $id){
                        $exists = true;
                        #$_SESSION['cart'][$l]['qtde']+= 1;
                    }
                }
            }

            if(!$exists){
                $produto = (new Produto())->getProductByID($id);
                

                if (isset($produto)){
                    $_SESSION['cart'][$line + 1]['id'] = $produto->getId();
                    $_SESSION['cart'][$line + 1]['descricao'] = $produto->getDescription();
                    $_SESSION['cart'][$line + 1]['qtde'] = $qtde;
                    $_SESSION['cart'][$line + 1]['preco'] = $produto->getPrice();
                    $_SESSION['cart'][$line + 1]['imagem'] = $produto->getImage();

                    if(!isset($_SESSION['productQuantity'])){
                        $_SESSION['productQuantity'] = $qtde;
                    } 
                    else{
                        $_SESSION['productQuantity'] += 1;
                    } 

                    header("location:index.php?arquivo=cartController&metodo=refreshCart");
                    
                   
                    
                }

            }
                     

        }

        require_once "public/pages/cart/cart.php";
    }

    public function refreshCart(){
        if($_POST){
            $line = $_POST['linha'];
            $qtde = $_POST['qtde'];

            if($qtde > 0){
                $_SESSION['cart'][$line]['qtde'] = $qtde;
            }

            
            $_SESSION['productQuantity'] = 0;
            foreach($_SESSION['cart'] as $key=>$value){
                $_SESSION['productQuantity'] += $value['qtde'];
            }

        }

        if($_GET){
            $line = $_GET['linha'];

            if(isset($_SESSION['cart'][$line])){
                unset($_SESSION['cart'][$line]);
            }

            $totalOfProducts = 0;
            foreach($_SESSION['cart'] as $key=>$value){
                $totalOfProducts += $value['qtde'];
            }

            $_SESSION['productQuantity'] = $totalOfProducts;

            header("location:index.php?arquivo=cartController&metodo=insertCart");
        }

    }

    public function finishCart(){

        if($_POST){
            $clientId = $_POST['cliente'];
            $paymentTypeId = $_POST['formapagamento'];

            $selectedClient = (new Cliente())->getClientByID($clientId);

            $paymentType = null;
            switch($paymentTypeId):
                case "1":
                    $paymentType = new Boleto();
                    break;
                case "2":  
                    $paymentType = new PayPal();
                    break;  
                default:
                    $paymentType = new CartaoCredito();
                    break;
                endswitch;
            
            #$_SESSION['selectedClient'] = $selectedClient;
            #$_SESSION['paymentType'] = $$paymentType->;
            
            require_once "public/components/finishCartComponent.php";

        }

        #unset($_SESSION['cart']);
        #unset($_SESSION['productQuantity']);

        #echo $this->showMessage("Carrinho finalizado com sucesso");

    }
}
?>