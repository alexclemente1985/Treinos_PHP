<?php
if ($_GET) {
    $controller = strtolower(str_replace("Controller", "", $_GET['controller']));
    $method = strtolower($_GET['method']);
}
if (!isset($_SESSION['logado'])) {
    header("location:index.php");
}
?>
<section class="painel">
    <div class="container-100">
        <?php require_once "Views/painel/components/menu.php"; ?>
        <section class="carregamento">
            <div class="box-10 bg-branco pb-b-4">
                <?php require_once "Views/painel/components/painelHeader.php"; ?>
                <?php if (isset($_SESSION)): ?>
                    <?= "Olá " . $_SESSION['nome'] . "! Você está autenticado!"; ?>
                    <div class="divider mg-t-1 mg-b-2"></div>
                    <p><?= $_SESSION['TESTE_ATUALIZAR_DAO'] ?></p>
                    <p><?= $_SESSION['DADOS_ATUALIZAR_CONTATO'] ?></p>
                <?php endif; ?>
                <?php if (isset($controller) && isset($method)) {

                    if ($controller == 'painel' && $method == 'index') {
                        if (isset($mensagens) && count($mensagens) > 0):
                            $totalMsg = count($mensagens);
                ?>
                            <div class="box-12 flex justify-end">
                                <div class="total-msg flex justify-center item-center">
                                    <span class="fnc-vermelho"><?= $totalMsg; ?></span>
                                </div>
                                <div class="icon-msg">
                                    <i class="fa-solid fa-envelope fonte28 fnc-vermelho" onclick="showMessage()"></i>
                                </div>
                            </div>
                            <div class="box-12 mod borda-light shadow-down mg-b-2 pd-20 radius" id="blocoMensagens">
                                <a
                                    href="index.php?controller=PainelController&method=index"
                                    class="block txt-c">
                                    <i class="fa-solid fa-circle-xmark fonte30 fnc-preto-azulado-claro"></i>
                                </a>
                                <?php foreach ($mensagens as $msg): ?>
                                    <div class="box-12 shadow-down mg-b-2 pd-20 radius bg-cinza-claro">
                                        <h1 class="mg-b-1 fonte12 poppins-medium fnc-preto-azulado-claro">
                                            <b>Data Mensagem:</b>
                                            <span class="fw-300"><?= $this->formatter->dateTimeFormatter($msg->DATAMENSAGEM); ?></span>
                                        </h1>
                                        <p class="mg-b-1 fonte12 poppins-medium fnc-preto-azulado-claro">
                                            <b>Nome completo:</b>
                                            <span class="fw-300">
                                                <?= $this->formatter->capitalizeTextFormatter($msg->NOME) . " " . $this->formatter->capitalizeTextFormatter($msg->SOBRENOME); ?>
                                            </span>
                                        </p>
                                        <p class="mg-b-1 fonte12 poppins-medium fnc-preto-azulado-claro">
                                            <b>Email:</b>
                                            <span class="fw-300">
                                                <?= $msg->EMAIL; ?>
                                            </span>
                                        </p>
                                        <p class="mg-b-1 fonte12 poppins-medium fnc-preto-azulado-claro">
                                            <b>Interesse:</b>
                                            <span class="fw-300">
                                                <?= $this->formatter->capitalizeTextFormatter($msg->INTERESSE); ?>
                                            </span>
                                        </p>
                                        <p class="msg-cli fonte12 poppins-medium fnc-preto-azulado-claro overflow-scroll pd-10">
                                            <b>Mensagem:</b><br>
                                            <span class="fw-300">
                                                <?= $msg->MENSAGEM; ?>
                                            </span>
                                        </p>
                                        <span class="ativo block mg-t-1" data-id="<?= $msg->ID; ?>" data-status="0" data-imovel="true" data-url="index.php?controller=PainelController&method=alterarStatus">
                                            <i class="fa-solid fa-circle-check fonte26 fnc-error"></i>
                                        </span>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                            </div>
                    <?php
                        require_once "views/painel/main/" . $method . ".php";
                    } else if (($method != 'deletar')
                        && ($method != strtolower('confirmarDeletar'))
                        #&& ($method != strtolower('cadastrarImagemImovel'))
                    ) {
                        require_once "views/painel/" . $controller . "/" . $method . ".php";
                    }
                } ?>
            </div>
        </section>
    </div>
</section>