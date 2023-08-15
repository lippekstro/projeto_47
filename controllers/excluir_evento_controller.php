<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/ondeacontece/models/evento.php';

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'perigo', time() + 3600, '/ondeacontece/');
    header('Location: /ondeacontece/index.php');
    exit();
}

try {
    $id = $_GET['id'];

    $evento = new Evento($id);

    $evento->deletar();

    setcookie('msg', "O Evento foi deletada com sucesso!", time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'sucesso', time() + 3600, '/ondeacontece/');
    header("Location: /ondeacontece/views/admin/lista_evento.php");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
}
