<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/ondeacontece/models/categoria_promo.php';

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'perigo', time() + 3600, '/ondeacontece/');
    header('Location: /ondeacontece/index.php');
    exit();
}

try {
    $id_cat = $_GET['id'];

    $cat = new CategoriaPromo($id_cat);

    $cat->deletar();

    setcookie('msg', "A Categoria foi deletada com sucesso!", time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'sucesso', time() + 3600, '/ondeacontece/');
    header("Location: /ondeacontece/views/admin/listar_categoria_promo.php");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
}
