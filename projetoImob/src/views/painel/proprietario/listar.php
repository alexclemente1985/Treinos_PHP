<div class="wd-100">
    <div class="box-8">
        <h2><i class="fa-solid fa-user-tie fonte30 mg-r-1"></i>Proprietário</h2>
    </div>
    <div class="box-4 flex justify-center item-centro">
        <div class="radius-start wd-30 bg-azul-escuro pd-10 fnc-branco fonte16">
            <i class="fa-solid fa-plus"></i>
        </div>
        <div class="radius-end wd-60 bg-azul pd-10 fnc-branco fonte16">
            <a class="fnc-branco" href="index.php?controller=ProprietarioController&method=index">Novo Cadastro</a>
        </div>
    </div>
</div>
<div class="limpar"></div>
<table class="grid wd-100 mg-t-8">
    <thead>
        <tr>
            <th class="fonte14 espaco-letra fw-bold">Nome</th>
            <th class="fonte14 espaco-letra fw-bold">Contato</th>
            <th class="fonte14 espaco-letra fw-bold">Sexo</th>
            <th class="fonte14 espaco-letra fw-bold">Ativo</th>
            <th class="fonte14 espaco-letra fw-bold">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($proprietarios) && count($proprietarios) > 0):
            foreach ($proprietarios as $p):
        ?>
                <!--Chamar o atributo como o banco de dados está retornando-->
                <tr class="zebra">
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $p->ID; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $p->NOME; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $p->CONTATO; ?></td>
                    <td class="txt-c">
                        <?php if ($p->ATIVO == '1'): ?>
                            <i class="fa-solid fa-lock-open fnc-sucesso fonte14"></i>
                        <?php else: ?>
                            <i class="fa-solid fa-lock fnc-error fonte14"></i>
                        <?php endif; ?>

                    </td>
                    <td class="flex justify-center item-centro">
                        <a href="">
                            <i class="fa-solid fa-trash fonte14 mg-r-2 fnc-preto-azulado"></i>
                        </a>
                        <a href="index.php?controller=ProprietarioController&method=index&id=<?= $p->ID; ?>">
                            <i class="fa-solid fa-pen fonte14 fnc-azul"></i>
                        </a>


                    </td>
                </tr>
            <?php endforeach;
        else: ?>
            <h2>Nenhum registro no banco de dados.</h2>
        <?php endif; ?>
    </tbody>
    <tfoot></tfoot>
</table>