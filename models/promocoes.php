<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php';

class Promocoes {
    public $id_promo;
    public $nome_promo;
    public $local_promo;
    public $prazo_promo;
    public $link_promo;
    public $descricao_promo;
    public $cupom;
    public $img_promo;

    public function __construct($id_promo = false) {
        if ($id_promo) {
            $this->id_promo = $id_promo;
            $this->carregar();
        }
    }

    public function carregar() {
        $query = "SELECT nome_promo, prazo_promo, local_promo, link_promo, descricao_promo, cupom, img_promo FROM promocoes WHERE id_promo = :id_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_promo', $this->id_promo);
        $stmt->execute();
        $promocao = $stmt->fetch();
        $this->nome_promo = $promocao['nome_promo'];
        $this->prazo_promo = $promocao['prazo_promo'];
        $this->local_promo = $promocao['local_promo'];
        $this->link_promo = $promocao['link_promo'];
        $this->descricao_promo = $promocao['descricao_promo'];
        $this->cupom = $promocao['cupom'];
        $this->img_promo = $promocao['img_promo'];
    }

    public function criar() {
        $query = "INSERT INTO promocoes (nome_promo, prazo_promo, local_promo, link_promo, descricao_promo, cupom, img_promo) VALUES (:nome_promo, :prazo_promo, :local_promo, :link_promo, :descricao_promo, :cupom, :img_promo)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_promo', $this->nome_promo);
        $stmt->bindValue(':prazo_promo', $this->prazo_promo);
        $stmt->bindValue(':local_promo', $this->local_promo);
        $stmt->bindValue(':link_promo', $this->link_promo);
        $stmt->bindValue(':descricao_promo', $this->descricao_promo);
        $stmt->bindValue(':cupom', $this->cupom);
        $stmt->bindValue(':img_promo', $this->img_promo);
        $stmt->execute();
        $this->id_promo = $conexao->lastInsertId();
        return $this->id_promo;
    }

    public function editar() {
        $query = "UPDATE promocoes SET nome_promo = :nome_promo, prazo_promo = :prazo_promo, local_promo = :local_promo, link_promo = :link_promo, descricao_promo = :descricao_promo, cupom = :cupom, img_promo = :img_promo WHERE id_promo = :id_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_promo', $this->id_promo);
        $stmt->bindValue(':nome_promo', $this->nome_promo);
        $stmt->bindValue(':prazo_promo', $this->prazo_promo);
        $stmt->bindValue(':local_promo', $this->local_promo);
        $stmt->bindValue(':link_promo', $this->link_promo);
        $stmt->bindValue(':descricao_promo', $this->descricao_promo);
        $stmt->bindValue(':cupom', $this->cupom);
        $stmt->bindValue(':img_promo', $this->img_promo);
        $stmt->execute();
    }

    public function deletar() {
        $query = "DELETE FROM promocoes WHERE id_promo = :id_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_promo', $this->id_promo);
        $stmt->execute();
    }

    public static function listar() {
        $query = "SELECT * FROM promocoes";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }
}
?>
