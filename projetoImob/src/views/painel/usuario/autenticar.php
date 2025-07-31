<?php
require_once "views/shared/header.php";
?>

<section class="login">
    <div class="container">
        <div class="box-12 mg-t-6 flex justify-center">
            <div class="box-8 shadow-down">
                <div class="box-4 radius-start pd-40 esq flex justify-center item-centro flex-colum bg-preto-azulado-claro">
                    <h2 class="fw-300 espaco-letra fonte20 fnc-branco">Acesse o sistema com o seu usuário e senha:</h2>
                    <h1 class="txt-center mg-t-6 fonte28 fnc-vermelho-claro fw-bold roboto-condensed">CasaWeb <span class="font22 fw-300"><br> Imobiliária</span></h1>
                </div>
                <div class="box-8 dir">
                    <form class="pd-t-4" action="" method="post">
                        <label class="fnc-preto-azulado" for="usuario">Usuário</label>
                        <input class="mg-b-20" type="text" name="usuario" required>

                        <label class="fnc-preto-azulado" for="senha">Senha</label>
                        <input class="mg-b-20" type="password" name="senha" required>

                        <input type="submit" value="Acessar" class="btn bg-vermelho fnc-branco">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>