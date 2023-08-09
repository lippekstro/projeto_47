<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php';


class Evento {
    public $id_evento;
    public $titulo;
    public $local_evento;
    public $data_evento;
    public $descricao_evento;
    public $preco;
    public $link_evento;
    public $img_evento;
    public $longitude;
    public $latitude;
    public $curtidas;
    public $id_categoria;

    public function __construct($id_evento = false)
    {
        if ($id_evento) {
            $this->id_evento = $id_evento;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT * FROM eventos WHERE id_evento = :id_evento";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_evento', $this->id_evento);
        $stmt->execute();

        $evento = $stmt->fetch();
        $this->titulo = $evento['titulo'];
        $this->local_evento = $evento['local_evento'];
        $this->data_evento = $evento['data_evento'];
        $this->descricao_evento = $evento['descricao_evento'];
        $this->preco = $evento['preco'];
        $this->link_evento = $evento['link_evento'];
        $this->img_evento = $evento['img_evento'];
        $this->latitude = $evento['latitude'];
        $this->longitude = $evento['longitude'];
        $this->curtidas = $evento['curtidas'];
        $this->id_categoria = $evento['id_categoria'];
    }

    public static function listar()
    {
        $query = "SELECT * FROM eventos";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }
}