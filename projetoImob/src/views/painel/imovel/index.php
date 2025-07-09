<section>
    <div class="box-8">
        <?php
        if (isset($id) && $id != ''):
        ?>
            <h2 class="fonte26"><i class="fa-solid fa-user-tie fonte30 mg-r-1"></i>Atualizar Imóvel</h2>
        <?php
        else:
        ?>
            <h2 class="fonte26"><i class="fa-solid fa-user-tie fonte30 mg-r-1"></i>Cadastrar Imóvel</h2>
        <?php endif; ?>

    </div>
    <div class="limpar"></div>
    <form action="" method="POST" class="box-12 mg-t-8" enctype="multipart/form-data">
        <div class="box-12 mg-t-2">
            <!--Envio do id para evitar problema de valor nulo na hora do cadastro (mesmo sendo autoincremento)-->
            <input type="hidden"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->ID;
                        endif; ?>"
                name="id">
            <input type="hidden" name="codigo">
            <?php
            $estatus = (isset($id) && $id != '' && isset($imoveis)) ? $imoveis[0]->ESTATUS : "1";
            ?>

        </div>
        <div class="box-3 mg-b-2">
            <label for="cep" class="fnc-preto-azulado">CEP</label>
            <input type="text"
                name="cep"
                id="cep"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->CEP;
                        endif; ?>">
        </div>
        <div class="box-8 mg-b-2">
            <label for="logradouro" class="fnc-preto-azulado">Endereço</label>
            <input type="text"
                name="logradouro"
                id="logradouro"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->LOGRADOURO;
                        endif; ?>">
        </div>
        <div class="box-6 mg-b-2">
            <label for="bairro" class="fnc-preto-azulado">Bairro</label>
            <input type="text"
                name="bairro"
                id="bairro"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->BAIRRO;
                        endif; ?>">
        </div>
        <div class="box-6 mg-b-2">
            <label for="cidade" class="fnc-preto-azulado">Cidade</label>
            <input type="text"
                name="cidade"
                id="cidade"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->CIDADE;
                        endif; ?>">
        </div>
        <div class="box-2 mg-b-2">
            <label for="quartos" class="fnc-preto-azulado">Quantidade de quartos</label>
            <input type="number"
                name="quartos"
                id="quartos"
                min="0"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->QUARTOS;
                        endif; ?>">
        </div>
        <div class="box-2 mg-b-2">
            <label for="banheiros" class="fnc-preto-azulado">Quantidade de banheiros</label>
            <input type="number"
                name="banheiros"
                id="banheiros"
                min="0"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->BANHEIROS;
                        endif; ?>">
        </div>
        <div class="box-2 mg-b-2">
            <label for="garagem" class="fnc-preto-azulado">Carros na garagem</label>
            <input type="number"
                name="garagem"
                id="garagem"
                min="0"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->GARAGEM;
                        endif; ?>">
        </div>
        <div class="box-2 mg-b-2">
            <label for="areatotal" class="fnc-preto-azulado">Área total</label>
            <input type="number"
                name="areatotal"
                id="areatotal"
                min="0"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->AREATOTAL;
                        endif; ?>">
        </div>
        <div class="box-2 mg-b-2">
            <label for="areaconstruida" class="fnc-preto-azulado">Área construída</label>
            <input type="number"
                name="areaconstruida"
                id="areaconstruida"
                min="0"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->AREACONSTRUIDA;
                        endif; ?>">
        </div>
        <div class="box-2 mg-b-2">
            <label for="valor" class="fnc-preto-azulado">Valor do imóvel</label>
            <input type="number"
                name="valor"
                id="valor"
                min="0"
                value="<?php if (isset($id) && $id != '' && isset($imoveis)): echo $imoveis[0]->VALOR;
                        endif; ?>">
        </div>
        <div class="box-4 mg-b-2">
            <label for="tipoimovel" class="fnc-preto-azulado">Tipo imóvel</label>
            <select name="tipoimovel" id="tipoimovel">
                <option value="">Escolha o tipo de imóvel...</option>
                <?php if (isset($tipoImovel) && count($tipoImovel) > 0):
                    foreach ($tipoImovel as $ti):
                        $selected = (isset($id) && $id != '' && isset($imoveis) && $imoveis[0]->TIPOIMOVEL == $ti->ID) ? "selected" : "";
                        $descricao =  $ti->DESCRICAO;
                        $id = $ti->ID
                ?>
                        <option
                            value="<?= $id; ?>"
                            <?= $selected; ?>><?= $descricao; ?>
                        </option>
                <?php endforeach;
                endif; ?>

            </select>
        </div>
        <div class="box-4 mg-b-2">
            <label for="finalidade" class="fnc-preto-azulado">Finalidade</label>
            <select name="finalidade" id="finalidade">
                <option value="">Escolha a finalidade do imóvel...</option>
                <?php if (isset($finalidade)):
                    foreach ($finalidade as $fin):
                        $selected = (isset($id) && $id != '' && isset($imoveis) && $imoveis[0]->FINALIDADE == $fin->ID) ? "selected" : "";
                        $descricao =  $fin->DESCRICAO;
                        $id = $fin->ID
                ?>
                        <option
                            value="<?= $id; ?>"
                            <?= $selected; ?>><?= $descricao; ?>
                        </option>
                <?php endforeach;
                endif; ?>
            </select>
        </div>
        <div class="box-4 mg-b-2">
            <label for="proprietario" class="fnc-preto-azulado">Proprietário</label>
            <select name="proprietario" id="proprietario">
                <option value="">Informe o proprietário...</option>
                <?php if (isset($proprietario)):
                    foreach ($proprietario as $prop):
                        $selected = (isset($id) && $id != '' && isset($imoveis) && $imoveis[0]->PROPRIETARIO == $prop->ID) ? "selected" : "";
                        $nome =  $prop->NOME;
                        $id = $prop->ID
                ?>
                        <option
                            value="<?= $id; ?>"
                            <?= $selected; ?>><?= $nome; ?>
                        </option>
                <?php endforeach;
                endif; ?>
            </select>
        </div>
        <div class="box-6">
            <?php
            $imagem = (isset($id) && $id != '' && isset($imoveis)) ? $imoveis[0]->IMAGEMCAPA : "casa-padrao.png";
            $dirImagem = 'lib/img/upload/' . $imagem;
            $imagemAlt = $imagem === "casa-padrao.png" ? "Escolha uma imagem" : "Imagem do imóvel";
            ?>
            <label for="img" class="fonte16 fnc-preto-azulado mg-t-3 mg-b-3">
                <i class="fa-solid fa-file-image fonte20 fnc-cinza"></i>
                <?= $imagemAlt; ?>
            </label>
            <input type="file" name="imagemcapa" id="img" onchange="showImage(this)" value="<?= $imagem; ?>">
            <img id="foto" src="<?= $dirImagem; ?>" alt="<?= $imagemAlt ?>" class="logo-150">
        </div>
        <div class="box-12 mg-t-2">
            <input type="submit" value="Cadastrar" class="btn bg-azul fnc-branco">
        </div>
    </form>
</section>