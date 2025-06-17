<section>
    <div class="box-8">
        <?php
            if(isset($id) && $id != ''):
        ?>
            <h2 class="fonte26"><i class="fa-solid fa-user-tie fonte30 mg-r-1"></i>Atualizar Proprietário</h2>
        <?php
            else:
        ?>
            <h2 class="fonte26"><i class="fa-solid fa-user-tie fonte30 mg-r-1"></i>Cadastrar Proprietário</h2>
        <?php endif;?>

    </div>
    <div class="limpar"></div>
    <form action="" method="POST" class="box-12 mg-t-8">
        <div class="box-12 mg-t-2">
            <!--Envio do id para evitar problema de valor nulo na hora do cadastro (mesmo sendo autoincremento)-->
            <input type="hidden"
             value=<?php if(isset($id) && $id != ''): echo $proprietarios[0]->ID; endif;?>
             name="id">
        </div>
        <div class="box-8">
            <label for="" class="fnc-preto-azulado">Nome</label>
            <input type="text"
             name="nome"
             id=""
             value=<?php if(isset($id) && $id != ''): echo $proprietarios[0]->NOME; endif;?>
              >
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Contato</label>
            <input type="text"
             name="contato"
             id="contato"
             value="<?php if(isset($id) && $id != ''): echo $proprietarios[0]->CONTATO; endif;?>"
              >
        </div>
        <div class="box-4">
            <label for="" class="fnc-preto-azulado">Sexo</label>
            <select name="sexo" id="sexo">
                <option value="">Escolha o sexo...</option>
                <option value="M" <?php if(isset($id) && $id != '' && $proprietarios[0]->SEXO == 'M'):?> selected="selected"<?php endif;?>>Masculino</option>
                <option value="F" <?php if(isset($id) && $id != '' && $proprietarios[0]->SEXO == 'F'):?> selected="selected"<?php endif;?>>Feminino</option>
            </select>
        </div>
        <div class="box-12 mg-t-2">
            <input type="submit" value="Cadastrar" class="btn bg-azul fnc-branco">
        </div>
    </form>
</section>