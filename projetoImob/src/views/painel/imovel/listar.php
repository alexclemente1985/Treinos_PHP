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
            <th class="fonte14 espaco-letra fw-bold">Data Cadastro</th>
            <th class="fonte14 espaco-letra fw-bold">Código</th>
            <th class="fonte14 espaco-letra fw-bold">Valor</th>
            <th class="fonte14 espaco-letra fw-bold">Endereço</th>
            <th class="fonte14 espaco-letra fw-bold">Bairro</th>
            <th class="fonte14 espaco-letra fw-bold">Cidade</th>
            <th class="fonte14 espaco-letra fw-bold">Tipo Imóvel</th>
            <th class="fonte14 espaco-letra fw-bold">Finalidade</th>
            <th class="fonte14 espaco-letra fw-bold">Proprietário</th>
            <th class="fonte14 espaco-letra fw-bold">Contato</th>
            <th class="fonte14 espaco-letra fw-bold">Ativo</th>
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
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= str_pad($im->CODIGO ? $im->CODIGO : "", 6, "0", STR_PAD_LEFT); ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c">R$ <?= $formatter->monetaryFormatter($im->VALOR); ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $formatter->capitalizeTextFormatter($im->LOGRADOURO); ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $formatter->capitalizeTextFormatter($im->BAIRRO); ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $formatter->capitalizeTextFormatter($im->CIDADE); ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c">
                        <?php if (isset($tipoImovel)):
                            foreach ($tipoImovel as $ti):
                                if ($im->TIPOIMOVEL == $ti->ID): echo $formatter->capitalizeTextFormatter($ti->DESCRICAO);
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </td>
                    <td class="fonte14 espaco-letra fw-300 txt-c">
                        <?php if (isset($finalidade)):
                            foreach ($finalidade as $fin):
                                if ($im->FINALIDADE == $fin->ID): echo $formatter->capitalizeTextFormatter($fin->DESCRICAO);
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </td>
                    <?php if (isset($proprietario)):
                        foreach ($proprietario as $p):
                            if ($im->PROPRIETARIO == $p->ID):
                    ?>
                                <td class="fonte14 espaco-letra fw-300 txt-c"><?= $formatter->capitalizeTextFormatter($p->NOME); ?></td>
                                <td class="fonte14 espaco-letra fw-300 txt-c"><?= $p->CONTATO; ?></td>
                    <?php endif;
                        endforeach;
                    endif; ?>
                    </td>

                    <td class="txt-c">
                        <?php if ($im->ESTATUS == '1'): ?>
                            <span class="ativo" data-id="<?= $im->ID; ?>" data-status="0" data-imovel="true" data-url="index.php?controller=ImovelController&method=alterarStatus">
                                <i class="fa-solid fa-lock-open fnc-sucesso fonte14"></i>
                            </span>
                        <?php else: ?>
                            <span class="ativo" data-id="<?= $im->ID; ?>" data-status="1" data-imovel="true" data-url="index.php?controller=ImovelController&method=alterarStatus">
                                <i class="fa-solid fa-lock fnc-error fonte14"></i>
                            </span>
                        <?php endif; ?>

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