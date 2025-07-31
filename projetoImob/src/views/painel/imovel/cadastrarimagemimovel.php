<div class="box-12">
    <h1 class="fonte28 mg-b-4"><i class="fa-solid fa-camera mg-r-4"></i>Cadastrar Imagem Imóvel</h1>
    <?php
        if(isset($imovel)):
    ?>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="imovel" value="<?= $imovel[0]->ID;?>">

             <div class="box-6">
                <?php
                    $imagem = "casa-padrao.png";
                    $dirImagem = 'lib/img/upload/' . $imagem;
                ?>
                    <label for="img" class="file-image fonte16 fnc-preto-azulado mg-t-3 mg-b-3">
                        <i class="fa-solid fa-file-image fonte20 fnc-cinza"></i>
                        Escolha uma imagem:
                    </label>
                    <input type="file" multiple name="imagens[]" id="img" onchange="showImage(this)" value="<?= $imagem; ?>">
                    <img id="foto" src="<?= $dirImagem; ?>" class="logo-150">
            </div>
            <div class="box-12 mg-t-2">
                <input type="submit" value="Cadastrar" class="btn bg-azul fnc-branco"/>
            </div>
        </form>
    <?php endif;?>
</div>