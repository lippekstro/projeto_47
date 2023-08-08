<?php $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php';

class Promocao{

    public $id_promo;
    public $nome_promo;  
    public $id_categoria_promo;
    public img_promo;
    public $descricao_promo;
    public $link_promo;

    public function carregaPromocaoRecentePaginaInicio(){

        try{
        $conexao = Conexao::conectar();
        $statement = $conexao->prepare('SELECT nome_promo, descricao_promo, img_promo, link_promo FROM promocoes ORDER BY id_promo DESC LIMIT 3');
        $statement->execute();
        $listaDePromocoes = $statement->fetchAll();
        return $listaDePromocoes;
    }
        catch(PDOException $erro){
            echo $erro->getMessage();
        }

    }
}
