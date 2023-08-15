<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/ondeacontece/models/faq.php';

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'perigo', time() + 3600, '/ondeacontece/');
    header('Location: /ondeacontece/index.php');
    exit();
}

try {
    $id_faq = $_GET['id'];

    $faq = new Faq($id_faq);

    $faq->deletar();

    setcookie('msg', "A FAQ foi deletada com sucesso!", time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'sucesso', time() + 3600, '/ondeacontece/');
    header("Location: /ondeacontece/views/admin/listar_faqs.php");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
}
