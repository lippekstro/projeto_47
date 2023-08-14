<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/Promocoes.php';

try {
    if (isset($_GET['id_promo'])) {
        $id_promo = $_GET['id_promo'];

        $promocao = new Promocoes($id_promo);

        $promocao->deletar();

        header("Location: /projeto_47/views/admin/listar_promocoes.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao deletar promoção: " . $e->getMessage();
}
