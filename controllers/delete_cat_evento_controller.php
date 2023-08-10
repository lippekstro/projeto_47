<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/projeto_47/models/categoria_evento.php';

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/projeto_47/');
    setcookie('tipo', 'perigo', time() + 3600, '/projeto_47/');
    header('Location: /projeto_47/index.php');
    exit();
}

try {
    $id_cat = $_GET['id'];

    $cat = new CategoriaEvento($id_cat);

    $cat->deletar();

    setcookie('msg', "A Categoria foi deletada com sucesso!", time() + 3600, '/projeto_47/');
    setcookie('tipo', 'sucesso', time() + 3600, '/projeto_47/');
    header("Location: /projeto_47/views/admin/lista_categoria.php");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
}
