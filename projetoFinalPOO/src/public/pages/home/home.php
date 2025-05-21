<?php
    function getCartLink(Produto $prod){
        $link = "index.php?arquivo=cartController&metodo=insertCart";
        $link .= "&id={$prod->getId()}";

        return $link;
    }
?>
<section class="banner mg-t-4">
    <div class="container">
        <div class="box-8 flex justify-content item-centro">
            <div class="box-6 mg-t-10">
                <span class="bg-p1-laranja fonte16 pd-l-1 block wd-50">Grandes Promoções</span>
                <h3 class="fonte50">Venha conferir!<br> Nossos preços <br>estão incríveis</h3>
            </div>
        </div>
    </div>
</section>
<section class="prod mg-t-6">
    <div class="container bg-branco radius">
        <div class="box-12 mg-b-3">
            <h3 class="fonte40 fnc-preto-1 poppins-black">Produtos em destaque</h3>
        </div>
    </div>
    <?php 
        if(isset($ret) && count($ret)>0):
            foreach($ret as $prod): 
    ?>
        <div class="box-2 borda-1 shadow-down pd-10">
            <div class="box-12">
                <h4 class="fonte14 mg-b-2">Promoção</h4>
            </div>
            <div class="box-8">
                <img src=<?=$prod->getImage();?> alt="" class="img-prod">

            </div>
            <div class="box-12 mg-t-2 mg-b-1">
                <p class="fonte14"><?=$prod->getDescription();?></p>
                <div class="divider"></div>
            </div>
            <div class="box-12 mg-t-1 mg-b-2">
                <p class="fonte18 poppins-black txt-c">R$ <?=number_format($prod->getPrice(),2,',','.');?></p>
            </div>
            <div class="box-12">
                <a 
                href=<?=getCartLink($prod);?> 
                class="btn-100 bg-p7-electric mg-t-1 fnc-branco fonte14 bg-p1-verde-hover"
                >Inserir no carrinho</a>
            </div>
        </div>
    <?php endforeach; endif;?>
</section>