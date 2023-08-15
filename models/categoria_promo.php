<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/db/conexao.php';

class CategoriaPromo {
    public $id_categoria_promo;
    public $nome_categoria_promo;

    public function __construct($id_categoria_promo = false)
    {
        if ($id_categoria_promo) {
            $this->id_categoria_promo = $id_categoria_promo;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT * FROM categoria_promo WHERE id_categoria_promo = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id_categoria_promo);
        $stmt->execute();

        $categoria = $stmt->fetch();
        $this->nome_categoria_promo = $categoria['nome_categoria_promo'];
    }

    public function criar()
    {
        $query = "INSERT INTO categoria_promo (nome_categoria_promo) VALUES (:nome)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome_categoria_promo);
        $stmt->execute();
        $this->id_categoria_promo = $conexao->lastInsertId();
        return $this->id_categoria_promo;
    }

    public static function listar()
    {
        $query = "SELECT * FROM categoria_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE categoria_promo SET nome_categoria_promo = :nome WHERE id_categoria_promo = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome_categoria_promo);
        $stmt->bindValue(":id", $this->id_categoria_promo);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM categoria_promo WHERE id_categoria_promo = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id_categoria_promo);
        $stmt->execute();
    }
}