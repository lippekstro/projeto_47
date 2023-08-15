<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/Promocoes.php';

try {
    if (isset($_GET['id_promo'])) {
        $id_promo = $_GET['id_promo'];

        $promocao = new Promocoes($id_promo);

        $promocao->deletar();

        header("Location: /ondeacontece/views/admin/listar_promocoes.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao deletar promoção: " . $e->getMessage();
}
