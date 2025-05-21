<section class="car">
    <div class="container">
        <div class="box-6">
            <form action="index.php?arquivo=cartController&metodo=finishCart" method="POST">
                <table class="car-table">
                    <thead>
                        <tr>
                            <th class="pd-10 bg-p2-azul fonte12 fnc-branco">Código</th>
                            <th class="pd-10 bg-p2-azul fonte12 fnc-branco">Produto</th>
                            <th class="pd-10 bg-p2-azul fonte12 fnc-branco">Qtde</th>
                            <th class="pd-10 bg-p2-azul fonte12 fnc-branco">Preço</th>
                            <th class="pd-10 bg-p2-azul fonte12 fnc-branco">Imagem</th>
                            <th class="pd-10 bg-p2-azul fonte12 fnc-branco">Sub-Total</th>
                            <th class="pd-10 bg-p2-azul fonte12 fnc-branco">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_SESSION['cart'])):
                                foreach($_SESSION['cart'] as $key=>$value):
                                    
                        ?>
                        <tr class="zebra">
                            <td class="fonte12 pd-5 txt-c"><?=$_SESSION['cart'][$key]['id'];?></td>
                            <td class="fonte12 pd-5 txt-c"><?=$_SESSION['cart'][$key]['descricao'];?></td>
                            <td class="fonte12 pd-5 txt-c">
                                <input type="number" class="qtde" rel="<?=$key;?>" value="<?=$_SESSION['cart'][$key]['qtde'];?>">                                
                            </td>
                            <td class="fonte12 pd-5 txt-c"><?=$_SESSION['cart'][$key]['preco'];?></td>
                            <td class="fonte12 pd-5 txt-c">
                                <img src=<?=$_SESSION['cart'][$key]['imagem'];?> alt="" class="logo-40 mg-auto">
                            </td>
                            <td class="fonte12 pd-5 txt-c"><?=(float)$_SESSION['cart'][$key]['preco']*(float)$_SESSION['cart'][$key]['qtde'];?></td>
                            <td class="fonte12 pd-5 txt-c">
                                <a href="index.php?arquivo=cartController&metodo=refreshCart&linha=<?=$key;?>" class="txt-c flex justify-center item-centro">
                                    <i class="fa-solid fa-trash-can fonte22 fnc-error"></i>
                                </a>
                                
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                            <td colspan="6">
                                <label for="">Selecionar Clientes</label>
                                <select name="cliente" id="" class="mg-b-2">
                                    <option value="">Selecione um cliente</option>
                                    <?php
                                        if(isset($clients) && count($clients) > 0):
                                            foreach($clients as $client):
                                    ?>
                                        <option value="<?=$client->getId()?>"><?=$client->getName()?></option>
                                    <?php endforeach; endif;?>
                                </select>

                                <label for="">Forma de pagamento</label>
                                <select name="formapagamento" id="">
                                    <option value="">Selecionar pagamento</option>
                                    <option value="1">Boleto</option>
                                    <option value="2">Pay Pal</option>
                                    <option value="3">Cartão credito</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <a href="/" class="btn-100 bg-p1-amarelo mg-b-1 fnc-branco fonte14 fw-800">Comprar Mais</a>
                                <input type="submit" value="Finalizar" class="btn-100 bg-p1-amarelo fnc-branco">
                            </td>
                        </tr>
                        <?php else:?>
                            <tr>
                            <td colspan="7">
                                <h6>Carrinho vazio!</h6>
                            </td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</section>

<script type="text/javascript" src="lib/js/jquery-3.7.1.min.js"></script>
<script>
    $(function(){
        $('.qtde').change(function(){
            var line = $(this).attr('rel');
            var qtde = $(this).val();

            $.ajax({
                type:"POST",
                url:"index.php?arquivo=cartController&metodo=refreshCart",
                data:"qtde="+qtde+"&linha="+line,
                success: function(){
                    location.reload();

                }
            })
        })
    })
</script>