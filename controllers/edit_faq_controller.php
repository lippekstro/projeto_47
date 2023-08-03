<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/projeto_47/models/faq.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto_47/configs/sessoes.php";

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nv_acesso'] < 2) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/projeto_47/');
    setcookie('tipo', 'perigo', time() + 3600, '/projeto_47/');
    header('Location: /projeto_47/index.php');
    exit();
}

try {
    $id_faq = htmlspecialchars($_POST['id']);
    $faq_pergunta = Utilidades::sanitizaString($_POST['faq_pergunta']);
    $faq_resposta = Utilidades::sanitizaString($_POST['faq_resposta']);

    $faq = new Faq($id_faq);
    $faq->faq_pergunta = $faq_pergunta;
    $faq->faq_resposta = $faq_resposta;
    $faq->editar();

    setcookie('msg', "A FAQ foi atualizada com sucesso!", time() + 3600, '/projeto_47/');
    setcookie('tipo', 'sucesso', time() + 3600, '/projeto_47/');
    header("Location: /projeto_47/views/admin/listar_faq.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}