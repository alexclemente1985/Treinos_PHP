<div class="wd-100">
    <div class="box-8">
        <h2><i class="fa-solid fa-user fonte18 mg-r-1"></i>Usuário</h2>
    </div>
    <div class="box-4 flex justify-center item-centro">
        <div class="radius-start wd-30 bg-azul-escuro pd-10 fnc-branco fonte16">
            <i class="fa-solid fa-plus"></i>
        </div>
        <div class="radius-end wd-60 bg-azul pd-10 fnc-branco fonte16">
            <a class="fnc-branco" href="index.php?controller=UsuarioController&method=index">Novo Cadastro</a>
        </div>
    </div>
</div>
<div class="limpar"></div>
<table class="grid wd-100 mg-t-8">
    <thead>
        <tr>
            <th class="fonte14 espaco-letra fw-bold">Data Cadastro</th>
            <th class="fonte14 espaco-letra fw-bold">Nome</th>
            <th class="fonte14 espaco-letra fw-bold">Usuário</th>
            <th class="fonte14 espaco-letra fw-bold">Email</th>
            <th class="fonte14 espaco-letra fw-bold">Perfil</th>
            <th class="fonte14 espaco-letra fw-bold">Status</th>
            <th class="fonte14 espaco-letra fw-bold">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($usuarios) && count($usuarios) > 0):
            foreach ($usuarios as $u):
        ?>
                <!--Chamar o atributo como o banco de dados está retornando-->
                <tr class="zebra">
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $u->DATACADASTRO; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $u->NOME; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $u->USUARIO; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c"><?= $u->EMAIL; ?></td>
                    <td class="fonte14 espaco-letra fw-300 txt-c">
                        <?php
                        if ($u->PERFIL == '1'): echo "ADMINISTRADOR";
                        else: echo "USUÁRIO";
                        endif;
                        ?>
                    </td>
                    <td class="txt-c">
                        <?php if ($u->ATIVO == '1'): ?>
                            <span class="ativo" data-id="<?= $u->ID; ?>" data-status="0">
                                <i class="fa-solid fa-lock-open fnc-sucesso fonte14"></i>
                            </span>
                        <?php else: ?>
                            <span class="ativo" data-id="<?= $u->ID; ?>" data-status="1">
                                <i class="fa-solid fa-lock fnc-error fonte14"></i>
                            </span>
                        <?php endif; ?>

                    </td>
                    <td class="flex justify-center item-centro">
                        <a href="index.php?controller=UsuarioController&method=deletar&id=<?= $u->ID; ?>">
                            <i class="fa-solid fa-trash fonte14 mg-r-2 fnc-preto-azulado"></i>
                        </a>
                        <a href="index.php?controller=UsuarioController&method=index&id=<?= $u->ID; ?>">
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