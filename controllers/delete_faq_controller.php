<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/projeto_47/models/categoria.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_47/configs/sessoes.php";

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nv_acesso'] < 2) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/projeto_47/');
    setcookie('tipo', 'perigo', time() + 3600, '/projeto_47/');
    header('Location: /projeto_47/index.php');
    exit();
}

try {
    $id_faq = $_GET['id'];

    $faq = new Faq($id_faq);

    $faq->deletar();

    setcookie('msg', "A FAQ foi deletada com sucesso!", time() + 3600, '/projeto_47/');
    setcookie('tipo', 'sucesso', time() + 3600, '/projeto_47/');
    header("Location: /projeto_47/views/admin/listar_faq.php");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
}