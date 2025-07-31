<?php
require_once("models/Imovel.php");
require_once("models/ImagemImovel.php");
require_once("models/DAO/ImovelDAO.php");

class ImovelService{
    private $imovelDAO;
    private $imovel;

    public function __construct(ImovelDAO $imovelDAO)
    {
        $this->imovelDAO = $imovelDAO;
    }

    public function cadastrarImovel($dados, $imagem)
    {
        $codigo = $this->imovelDAO->listarMaxValue('CODIGO');
        $this->imovel = new Imovel();

        $dados['imagemcapa'] = $imagem;
        $dados['codigo'] = $codigo[0]->ULTIMOVALOR + 1;
        $dados['datacadastro'] = date('Y-m-d H:i:s', time());

        foreach($dados as $key=>$value){
           $this->imovel->$key = $value;
        }

        return $this->imovelDAO->adicionar($this->imovel);
    }

    #método responsável pelo cadastro de imagens do imóvel
    public function cadastrarImagemImovel($dados, $imagens){
        if(!is_array($imagens)){
            $imagens = [$imagens];
        }

        foreach($imagens as $imagem){
            $imovelImagem = new ImagemImovel(id: '', imagemImovel: $imagem, imovel: $dados['imovel']);
            $this->imovelDAO->adicionarImagem($imovelImagem);
        }
    }

    public function atualizarImovel($dados, $imagem = '')
    {
        $this->imovel = new Imovel();
        if (strlen($imagem) > 0) {
            $dados['imagemcapa'] = $imagem;
        }


        foreach ($dados as $key => $value) {
            if ($key == 'senha') {
                #criptografia da senha
                $value = password_hash($value, PASSWORD_BCRYPT);
            }
            $this->imovel->$key = $value;
        }

        return $this->imovelDAO->atualizarImovel($this->imovel);
    }
}
?>