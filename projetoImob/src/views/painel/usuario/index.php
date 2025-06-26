<section>
    <div class="box-8">
        <?php
            if(isset($id) && $id != ''):
        ?>
            <h2 class="fonte26"><i class="fa-solid fa-user fonte30 mg-r-1"></i>Atualizar Usuário</h2>
        <?php
            else:
        ?>
            <h2 class="fonte26"><i class="fa-solid fa-user fonte30 mg-r-1"></i>Cadastrar Usuário</h2>
        <?php endif;?>

    </div>
    <div class="limpar"></div>
    <form action="" method="POST" class="box-12 mg-t-8">
        <div class="box-12 mg-t-2">
            <!--Envio do id para evitar problema de valor nulo na hora do cadastro (mesmo sendo autoincremento)-->
            <input type="hidden"
             value=<?php if(isset($id) && $id != ''): echo $usuarios[0]->ID; endif;?>
             name="id">
        </div>
        <div class="box-8">
            <label for="" class="fnc-preto-azulado">Nome</label>
            <input type="text"
             name="nome"
             id=""
             value=<?php if(isset($id) && $id != ''): echo $usuarios[0]->NOME; endif;?>
              >
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Usuário</label>
            <input type="text"
             name="usuario"
             id="usuario"
             value="<?php if(isset($id) && $id != ''): echo $usuarios[0]->USUARIO; endif;?>"
              >
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Senha</label>
            <input type="password"
             name="senha"
             id="senha"
             value=""
              >
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Email</label>
            <input type="email"
             name="email"
             id="email"
             value="<?php if(isset($id) && $id != ''): echo $usuarios[0]->USUARIO; endif;?>"
              >
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Perfil</label>
            <select name="perfil" id="perfil">
                <option value="">Escolha o perfil...</option>
                <option value="1" <?php if(isset($id) && $id != '' && $usuarios[0]->PERFIL == '1'):?> selected="selected"<?php endif;?>>ADMINISTRADOR</option>
                <option value="0" <?php if(isset($id) && $id != '' && $usuarios[0]->PERFIL == '0'):?> selected="selected"<?php endif;?>>USUÁRIO</option>
            </select>
        </div>
        <div class="box-12 mg-t-2">
            <input type="submit" value="Cadastrar" class="btn bg-azul fnc-branco">
        </div>
    </form>
</section>