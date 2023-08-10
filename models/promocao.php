<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/projeto_47/db/conexao.php';

class Promocao
{
    public $id_promo;
    public $nome_promo;
    public $cupom;
    public $id_categoria_promo;

    public function __construct($id_promo = false)
    {
        if ($id_promo) {
            $this->id_promo = $id_promo;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT * FROM promocoes WHERE id_promo = :id_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_promo', $this->id_promo);
        $stmt->execute();

        $promo = $stmt->fetch();
        $this->nome_promo = $promo['nome_promo'];
        $this->cupom = $promo['cupom'];
        $this->id_categoria_promo = $promo['id_categoria_promo'];
    }

    public function criar()
    {
        $query = "INSERT INTO promocoes (nome_promo, cupom, id_categoria_promo) VALUES (:nome, :cupom, :id_cat)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome_promo);
        $stmt->bindValue(':cupom', $this->cupom);
        $stmt->bindValue(':id_cat', $this->id_categoria_promo);
        $stmt->execute();
        $this->id_promo = $conexao->lastInsertId();
        return $this->id_promo;
    }

    public static function listar()
    {
        $query = "SELECT p.*, c.nome_categoria_promo FROM promocoes p JOIN categoria_promo c ON p.id_categoria_promo = c.id_categoria_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE promocoes SET nome_promo = :nome, cupom = :cupom, id_categoria_promo = :id_cat WHERE id_promo = :id_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome_promo);
        $stmt->bindValue(":cupom", $this->cupom);
        $stmt->bindValue(":id_cat", $this->id_categoria_promo);
        $stmt->bindValue(":id_promo", $this->id_promo);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM promocoes WHERE id_promo = :id_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_promo', $this->id_promo);
        $stmt->execute();
    }
}
