<?php

require_once "conexao.php";

class livro {
    public $id_livro;
    public $nome_livro;
    public $descricao;
    public $preco;
    public $img_livro;

    public function __construct($id_livro = false)
    {
        if ($id_livro) {
            $this->id_livro = $id_livro;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome_livro, descricao, preco, img_livro FROM livro WHERE id_livro = :id_livro";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_livro', $this->id_livro);
        $stmt->execute();

        $livro = $stmt->fetch();
        $this->nome_livro = $livro['nome_livro'];
        $this->descricao = $livro['descricao'];
        $this->preco = $livro['preco'];
        $this->img_livro = $livro['img_livro'];
    }

    public function criar()
    {
        $query = "INSERT INTO livro (nome_livro, descricao, preco, img_livro) VALUES (:nome_livro, :descricao, :preco, :img_livro)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_livro', $this->nome_livro);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':img_livro', $this->img_livro);
        $stmt->execute();
        $this->id_livro = $conexao->lastInsertId();
        return $this->id_livro;
    }

    public static function listar()
    {
        $query = "SELECT * FROM livro";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE livro SET nome_livro = :nome_livro, descricao = :descricao, preco = :preco WHERE id_livro = :id_livro";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome_livro", $this->nome_livro);
        $stmt->bindValue(":descricao", $this->descricao);
        $stmt->bindValue(":preco", $this->preco);
        $stmt->bindValue(":id_livro", $this->id_livro);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM livro WHERE id_livro = :id_livro";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_livro', $this->id_livro);
        $stmt->execute();
    }
}