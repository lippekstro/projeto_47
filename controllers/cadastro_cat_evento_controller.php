<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/ondeacontece/models/categoria_evento.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/ondeacontece/configs/utils.php";

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'perigo', time() + 3600, '/ondeacontece/');
    header('Location: /ondeacontece/index.php');
    exit();
}

try {
    $nome = Utilidades::sanitizaString($_POST['nome_categoria']);

    $cat = new CategoriaEvento();
    $cat->nome_categoria_evento = $nome;
    $cat->criar();

    setcookie('msg', "A Categoria foi adicionada com sucesso!", time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'sucesso', time() + 3600, '/ondeacontece/');
    header("Location: /ondeacontece/views/admin/lista_categoria.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}