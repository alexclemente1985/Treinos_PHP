<section>
    <div class="box-8">
        <?php
        if (isset($id) && $id != ''):
        ?>
            <h2 class="fonte26"><i class="fa-solid fa-user fonte30 mg-r-1"></i>Atualizar Usuário</h2>
        <?php
        else:
        ?>
            <h2 class="fonte26"><i class="fa-solid fa-user fonte30 mg-r-1"></i>Cadastrar Usuário</h2>
        <?php endif; ?>

    </div>
    <div class="limpar"></div>
    <form action="" method="POST" enctype="multipart/form-data" class="box-12 mg-t-8">
        <div class="box-12 mg-t-2">
            <!--Envio do id para evitar problema de valor nulo na hora do cadastro (mesmo sendo autoincremento)-->
            <input type="hidden"
                value=<?php if (isset($id) && $id != ''): echo $usuarios[0]->ID;
                        endif; ?>
                name="id">
        </div>
        <div class="box-8">
            <label for="" class="fnc-preto-azulado">Nome</label>
            <input type="text"
                name="nome"
                id=""
                value=<?php if (isset($id) && $id != ''): echo $usuarios[0]->NOME;
                        endif; ?>>
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Usuário</label>
            <input type="text"
                name="usuario"
                id="usuario"
                value="<?php if (isset($id) && $id != ''): echo $usuarios[0]->USUARIO;
                        endif; ?>">
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Senha</label>
            <input type="password"
                name="senha"
                id="senha"
                value="">
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Email</label>
            <input type="email"
                name="email"
                id="email"
                value="<?php if (isset($id) && $id != ''): echo $usuarios[0]->USUARIO;
                        endif; ?>">
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Perfil</label>
            <select name="perfil" id="perfil">
                <option value="">Escolha o perfil...</option>
                <?php if (isset($perfil) && count($perfil) > 0):
                    foreach ($perfil as $p):
                        $selected = (isset($id) && $id != '' && $usuarios[0]->PERFIL == $p->ID) ? 'selected' : '';
                        $descricao = $p->DESCRICAO;
                ?>
                        <option value="<?= $p->ID; ?>" <?= $selected; ?>><?= $descricao; ?></option>
                <?php endforeach;
                endif; ?>
            </select>
        </div>
        <div class="box-6">
            <?php
            $imagem = isset($id) && $id != '' ? $usuarios[0]->IMAGEM :  'user-padrao.png';
            $dirImagem = 'lib/img/users-images/' . $imagem;
            $imagemAlt = $imagem === 'user-padrao.png' ? 'Escolha uma imagem' : 'Imagem do usuário';
            ?>
            <label for="img" class="fonte16 fnc-preto-azulado mg-t-3 mg-b-3">
                <i class="fa-solid fa-file-image fonte20 fnc-cinza"></i>
                <?= $imagemAlt; ?>
            </label>
            <input type="file" name="imagem" id="img" value="<?= $imagem; ?>" onchange="showImage(this)">
            <img id="foto" src="<?= $dirImagem; ?>" alt="<?= $imagemAlt; ?>" class="logo-150">
        </div>
        <div class="box-12 mg-t-2">
            <input type="submit" value="Cadastrar" class="btn bg-azul fnc-branco">
        </div>
    </form>
</section>