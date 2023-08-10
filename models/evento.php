<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php';

class Evento{

    public $id_evento;
    public $nome_evento;
    public $local_evento;
    public $data_evento;
    public $descricao_evento;
    public $preco;
    public $link_evento;
    public $img_evento;
    public $id_categoria;

    public function carregaEventosPaginaInicio(){
        try{
            $conexao = Conexao::conectar();
            $statement = $conexao->prepare('SELECT titulo, descricao_evento, img_evento, link_evento FROM eventos ORDER BY ID_EVENTO DESC LIMIT 3');
            $statement->execute();
            $listaDeEventos = $statement->fetchAll();
            return $listaDeEventos;

        }
        catch(PDOException $erro){
            echo $erro->getMessage();
        }
    }
}
