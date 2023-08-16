<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/db/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/promocoes.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_promo = $_POST['nome_promo'];
    $local_promo = $_POST['local_promo'];
    $prazo_promo = $_POST['prazo_promo'];
    $link_promo = $_POST['link_promo'];
    $descricao_promo = $_POST['descricao_promo'];
    $cupom = $_POST['cupom'];
    $categoria = $_POST['id_categoria'];

    if (!empty($_FILES['img_promo']['tmp_name'])) {
        $imagem = file_get_contents($_FILES['img_promo']['tmp_name']);
    }


    $nova_promocao = new Promocoes();
    $nova_promocao->nome_promo = $nome_promo;
    $nova_promocao->local_promo = $local_promo;
    $nova_promocao->prazo_promo = $prazo_promo;
    $nova_promocao->link_promo = $link_promo;
    $nova_promocao->descricao_promo = $descricao_promo;
    $nova_promocao->cupom = $cupom;
    $nova_promocao->img_promo = $imagem;
    $nova_promocao->id_categoria_promo = $categoria;

    $nova_promocao->criar();

    header('Location: /ondeacontece/views/admin/listar_promocoes.php');
    exit();
}
?>
