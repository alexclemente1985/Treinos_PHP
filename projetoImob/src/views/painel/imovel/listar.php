<div class="wd-100">
    <div class="box-8">
        <h2><i class="fa-solid fa-user fonte18 mg-r-1"></i>Imóvel</h2>
    </div>
    <div class="box-4 flex justify-center item-centro">
        <div class="radius-start wd-30 bg-azul-escuro pd-10 fnc-branco fonte16">
            <i class="fa-solid fa-plus"></i>
        </div>
        <div class="radius-end wd-60 bg-azul pd-10 fnc-branco fonte16">
            <a class="fnc-branco" href="index.php?controller=ImovelController&method=index">Novo Cadastro</a>
        </div>
    </div>
</div>
<div class="limpar"></div>
<table class="grid wd-100 mg-t-8">
    <thead>
        <tr>
            <th class="fonte14 espaco-letra fw-bold">Código</th>
            <th class="fonte14 espaco-letra fw-bold">Valor</th>
            <th class="fonte14 espaco-letra fw-bold">Logradouro</th>
            <th class="fonte14 espaco-letra fw-bold">Bairro</th>
            <th class="fonte14 espaco-letra fw-bold">Cidade</th>
            <th class="fonte14 espaco-letra fw-bold">Tipo Imóvel</th>
            <th class="fonte14 espaco-letra fw-bold">Finalidade</th>
            <th class="fonte14 espaco-letra fw-bold">Proprietário</th>
            <th class="fonte14 espaco-letra fw-bold">Contato</th>
            <th class="fonte14 espaco-letra fw-bold">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($imoveis) && count($imoveis) > 0):
            foreach ($imoveis as $im):
        ?>
                <!--Chamar o atributo como o banco de dados está retornando-->
                <tr class="zebra">
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $formatter->dateTimeFormatter($im->DATACADASTRO); ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $im->VALOR; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $im->LOGRADOURO; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $im->BAIRRO; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $im->CIDADE; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c">
                        <?
                        foreach($tipoImovel as $ti):
                            if($im->TIPOIMOVEL == $ti->getId()): echo $ti->getDescricao();
                            endif;
                        endforeach;
                        ?>
                    </td>
                    <td class="fonte14 espaco-letra fw-300 txt-c">
                        <?
                        foreach($finalidade as $fin):
                            if($im->FINALIDADE == $fin->getId()): echo $fin->getDescricao();
                            endif;
                        endforeach;
                        ?>
                    </td>
                    <td class="fonte14 espaco-letra fw-300 txt-c">
                        <?
                        foreach($proprietario as $p):
                            if($im->PROPRIETARIO == $p->getId()): echo $p->getNome();
                            endif;
                        endforeach;
                        ?>
                    </td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $im->CONTATO; ?></td>
                    </td>
                    <td class="flex justify-center item-centro">
                        <a href="index.php?controller=ImovelController&method=deletar&id=<?= $im->ID; ?>">
                            <i class="fa-solid fa-trash fonte14 mg-r-2 fnc-preto-azulado"></i>
                        </a>
                        <a href="index.php?controller=ImovelController&method=index&id=<?= $im->ID; ?>">
                            <i class="fa-solid fa-pen fonte14 fnc-azul"></i>
                        </a>


                    </td>
                </tr>
            <?php endforeach;
        else: ?>
            <td colspan="7" class="pd-t-2">
                <h2 class="txt-c fonte16 poppins-medium">Nenhum registro no banco de dados.</h2>
            </td>
        <?php endif; ?>
    </tbody>
    <tfoot></tfoot>
</table>