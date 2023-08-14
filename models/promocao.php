<?php 
$_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php';

class Promocao{

    public $id_promo;
    public $nome_promo;  
    public $img_promo;
    public $descricao_promo;
    public $link_promo;
    public $id_categoria_promo;
  
   public function __construct($id_promo = false)
    {
        if ($id_promo) {
            $this->id_promo = $id_promo;
            $this->carregar();
        }
    }

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
   

    public function carregar()
    {
        $query = "SELECT * FROM promocoes WHERE id_promo = :id_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_promo', $this->id_promo);
        $stmt->execute();

        $promo = $stmt->fetch();
        $this->nome_promo = $promo['nome_promo'];
        $this->img_promo = $promo['img_promo'];
        $this->descricao_promo = $promo['descricao_promo'];
        $this->link_promo = $promo['link_promo'];
        $this->id_categoria_promo = $promo['id_categoria_promo'];
    }

    public function criar()
    {
        $query = "INSERT INTO promocoes (nome_promo, img_promo, descricao_promo, link_promo, id_categoria_promo) VALUES (:nome, :img, :descricao, :link, :id_cat)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome_promo);
        $stmt->bindValue(':img', $this->img_promo);
        $stmt->bindValue(':descricao', $this->descricao_promo);
        $stmt->bindValue(':link', $this->link_promo);
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

    public static function listarPorCategoria($id_categoria)
    {
        $query = "SELECT p.*, c.nome_categoria_promo FROM promocoes p JOIN categoria_promo c ON p.id_categoria_promo = c.id_categoria_promo WHERE p.id_categoria_promo = :id_cat";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_cat', $id_categoria);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE promocoes SET nome_promo = :nome, descricao_promo = :descricao, link_promo = :link, id_categoria_promo = :id_cat WHERE id_promo = :id_promo";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome_promo);
        $stmt->bindValue(':descricao', $this->descricao_promo);
        $stmt->bindValue(':link', $this->link_promo);
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
