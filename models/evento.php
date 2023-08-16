<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/db/conexao.php';

class Evento
{
    public $id_evento;
    public $titulo;
    public $local_evento;
    public $data_evento;
    public $descricao_evento;
    public $preco;
    public $link_evento;
    public $img_evento;
    public $id_categoria;
    public $longitude;
    public $latitude;
    public $curtidas;

    public function __construct($id_evento = false)
    {
        if ($id_evento) {
            $this->id_evento = $id_evento;
            $this->carregar();
        }
    }

    public function carregaEventosPaginaInicio()
    {
        try {
            $conexao = Conexao::conectar();
            $statement = $conexao->prepare('SELECT * FROM eventos ORDER BY data_evento ASC LIMIT 3');
            $statement->execute();
            $listaDeEventos = $statement->fetchAll();
            return $listaDeEventos;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
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
        $query = "SELECT e.*, ce.nome_categoria_evento FROM eventos e JOIN categoria_evento ce ON e.id_categoria = ce.id_categoria_evento ORDER BY data_evento ASC";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function getCategoria()
    {
        $query = "SELECT e.*, ce.nome_categoria_evento FROM eventos e JOIN categoria_evento ce ON e.id_categoria = ce.id_categoria_evento";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetch();
        return $lista['nome_categoria_evento'];
    }

    public function criar()
    {
        $query = "INSERT INTO eventos (titulo, local_evento, data_evento, descricao_evento, preco, link_evento, img_evento, longitude, latitude, id_categoria) VALUES (:nome, :local_evento, :data_evento, :descricao, :preco, :link, :imagem, :long, :lat, :categoria)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->titulo);
        $stmt->bindValue(':local_evento', $this->local_evento);
        $stmt->bindValue(':data_evento', $this->data_evento);
        $stmt->bindValue(':descricao', $this->descricao_evento);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':link', $this->link_evento);
        $stmt->bindValue(':imagem', $this->img_evento);
        $stmt->bindValue(':long', $this->longitude);
        $stmt->bindValue(':lat', $this->latitude);
        $stmt->bindValue(':categoria', $this->id_categoria);

        $stmt->execute();
        $this->id_evento = $conexao->lastInsertId();
        return $this->id_evento;
    }

    public function editar()
    {
        $query = "UPDATE eventos SET titulo = :titulo, local_evento = :local_evento, data_evento = :data_evento, descricao_evento = :descricao, preco = :preco, link_evento = :link, longitude = :long, latitude = :lat, id_categoria = :categoria WHERE id_evento = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':titulo', $this->titulo);
        $stmt->bindValue(':local_evento', $this->local_evento);
        $stmt->bindValue(':data_evento', $this->data_evento);
        $stmt->bindValue(':descricao', $this->descricao_evento);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':link', $this->link_evento);
        $stmt->bindValue(':categoria', $this->id_categoria);
        $stmt->bindValue(':long', $this->longitude);
        $stmt->bindValue(':lat', $this->latitude);
        $stmt->bindValue(':id', $this->id_evento);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM eventos WHERE id_evento = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id_evento);
        $stmt->execute();
    }
}
