<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/db/conexao.php';

class CategoriaEvento {
    public $id_categoria_evento;
    public $nome_categoria_evento;

    public function __construct($id_categoria_evento = false)
    {
        if ($id_categoria_evento) {
            $this->id_categoria_evento = $id_categoria_evento;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT * FROM categoria_evento WHERE id_categoria_evento = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id_categoria_evento);
        $stmt->execute();

        $categoria = $stmt->fetch();
        $this->nome_categoria_evento = $categoria['nome_categoria_evento'];
    }

    public function criar()
    {
        $query = "INSERT INTO categoria_evento (nome_categoria_evento) VALUES (:nome)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome_categoria_evento);
        $stmt->execute();
        $this->id_categoria_evento = $conexao->lastInsertId();
        return $this->id_categoria_evento;
    }

    public static function listar()
    {
        $query = "SELECT * FROM categoria_evento";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE categoria_evento SET nome_categoria_evento = :nome WHERE id_categoria_evento = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome_categoria_evento);
        $stmt->bindValue(":id", $this->id_categoria_evento);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM categoria_evento WHERE id_categoria_evento = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id_categoria_evento);
        $stmt->execute();
    }
}