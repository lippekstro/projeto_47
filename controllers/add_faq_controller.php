<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/ondeacontece/models/faq.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/ondeacontece/configs/utils.php";

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'perigo', time() + 3600, '/ondeacontece/');
    header('Location: /ondeacontece/index.php');
    exit();
}

try {
    $faq_pergunta = Utilidades::sanitizaString($_POST['faq_pergunta']);
    $faq_resposta = Utilidades::sanitizaString($_POST['faq_resposta']);

    $faq = new Faq();
    $faq->faq_pergunta = $faq_pergunta;
    $faq->faq_resposta = $faq_resposta;
    $faq->criar();

    setcookie('msg', "A FAQ foi adicionada com sucesso!", time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'sucesso', time() + 3600, '/ondeacontece/');
    header("Location: /ondeacontece/views/admin/listar_faqs.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}