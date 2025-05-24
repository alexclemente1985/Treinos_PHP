<?php
?>
<div class="container flex justify-center">
    <div class="box 6 pd-10 bg-branco radius mg-t-10 wd-50">
        <div class="box 12">
            <h3 class="poppins-medium fonte24">Detalhes da compra</h3>
            <div class="divider mg-t-2 mg-b-2"></div>
            <?php
                    
                if(isset($selectedClient)):
            ?>
                <div class="box 12 flex justify-between">
                    <p class="fonte14 espaco-letra poppins-medium"><strong>Cliente:</strong> <?= $selectedClient->getName()."   ";?>  </p>
                    <p class="fonte14 espaco-letra poppins-medium"><strong>Documento cliente:</strong> <?=$selectedClient->getCPF();?></p>
                </div>
            <?php endif;?>
            
            <div class="limpar">
                <div class="divider mg-t-2 mg-b-2"></div>
            </div>            
            <div class="box-12 mg-t-4">
                <h3 class="poppins-medium fonte24 mg-b-2"> Itens no carrinho </h3>
                <div class="box-12">
                    <?php 
                        if(isset($_SESSION['cart'])):
                            $total = 0;
                            foreach($_SESSION['cart'] as $key => $value):
                                $subtotal = $value['qtde']*$value['preco'];
                                $total += $subtotal;
                    ?>
                        <div class="box-12 bg-p3-paper radius pd-10 mg-b-2">
                            <div class="box-2"><img src="<?=$value['imagem']?>" alt="" class="logo-40"></div>
                            <div class="box-10">
                                <p class="fonte-14 espaco-letra poppins-medium"><strong>Descrição: <?=$value['descricao']?></strong></p>
                                <p class="fonte-14 espaco-letra poppins-medium"><strong>Quantidade: <?=$value['qtde']?></strong></p>
                                <p class="fonte-14 espaco-letra poppins-medium"><strong>Sub-total: R$<?=number_format($subtotal, 2, ',', '.');?></strong></p>
                            </div>
                        </div>
                        
                    <?php endforeach; endif;?>
                </div>
            </div>
        </div>
    </div>
</div>