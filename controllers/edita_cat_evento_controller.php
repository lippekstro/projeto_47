<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/projeto_47/models/categoria_evento.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/projeto_47/configs/utils.php';


if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/projeto_47/');
    setcookie('tipo', 'perigo', time() + 3600, '/projeto_47/');
    header('Location: /projeto_47/index.php');
    exit();
}

try {
    $id_cat = htmlspecialchars($_POST['id_categoria_evento']);
    $nome = Utilidades::sanitizaString($_POST['nome_categoria']);

    $cat = new CategoriaEvento($id_cat);
    $cat->nome_categoria_evento = $nome;
    $cat->editar();

    setcookie('msg', "A Categoria foi atualizada com sucesso!", time() + 3600, '/projeto_47/');
    setcookie('tipo', 'sucesso', time() + 3600, '/projeto_47/');
    header("Location: /projeto_47/views/admin/lista_categoria.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
