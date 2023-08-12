<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/Promocoes.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_promo = $_POST['nome_promo'];
    $local_promo = $_POST['local_promo'];
    $prazo_promo = $_POST['prazo_promo'];
    $link_promo = $_POST['link_promo'];
    $descricao_promo = $_POST['descricao_promo'];
    $cupom = $_POST['cupom'];

    if (isset($_FILES['img_promo']) && $_FILES['img_promo']['error'] === UPLOAD_ERR_OK) {
        $img_promo_name = $_FILES['img_promo']['name'];
        $img_promo_tmp = $_FILES['img_promo']['tmp_name'];
        move_uploaded_file($img_promo_tmp, $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/uploads/' . $img_promo_name);
    } else {
        $img_promo_name = ''; 
    }

    $nova_promocao = new Promocoes();
    $nova_promocao->nome_promo = $nome_promo;
    $nova_promocao->local_promo = $local_promo;
    $nova_promocao->prazo_promo = $prazo_promo;
    $nova_promocao->link_promo = $link_promo;
    $nova_promocao->descricao_promo = $descricao_promo;
    $nova_promocao->cupom = $cupom;
    $nova_promocao->img_promo = $img_promo_name;

    $nova_promocao->criar();

    header('Location: /projeto_47/views/admin/listar_promocoes.php');
    exit();
}
?>
