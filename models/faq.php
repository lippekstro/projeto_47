<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/projeto_47/db/conexao.php';

class Faq
{
    public $id_faq;
    public $faq_pergunta;
    public $faq_resposta;

    public function __construct($id_faq = false)
    {
        if ($id_faq) {
            $this->id_faq = $id_faq;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT * FROM faqs WHERE id_faq = :id_faq";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_faq', $this->id_faq);
        $stmt->execute();

        $faq = $stmt->fetch();
        $this->faq_pergunta = $faq['faq_pergunta'];
        $this->faq_resposta = $faq['faq_resposta'];
    }

    public function criar()
    {
        $query = "INSERT INTO faqs (faq_pergunta, faq_resposta) VALUES (:faq_pergunta, :faq_resposta)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':faq_pergunta', $this->faq_pergunta);
        $stmt->bindValue(':faq_resposta', $this->faq_resposta);
        $stmt->execute();
        $this->id_faq = $conexao->lastInsertId();
        return $this->id_faq;
    }

    public static function listar()
    {
        $query = "SELECT * FROM faqs";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE faqs SET faq_pergunta = :faq_pergunta, faq_resposta = :faq_resposta WHERE id_faq = :id_faq";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":faq_pergunta", $this->faq_pergunta);
        $stmt->bindValue(":faq_resposta", $this->faq_resposta);
        $stmt->bindValue(":id_faq", $this->id_faq);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM faqs WHERE id_faq = :id_faq";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_faq', $this->id_faq);
        $stmt->execute();
    }
}
