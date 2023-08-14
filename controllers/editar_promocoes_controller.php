<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/promocoes.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_promo = $_POST['id_promo'];
        $nome_promo = $_POST['nome_promo'];
        $local_promo = $_POST['local_promo'];
        $prazo_promo = $_POST['prazo_promo'];
        $link_promo = $_POST['link_promo'];
        $descricao_promo = $_POST['descricao_promo'];
        $cupom = $_POST['cupom'];
        $categoria = $_POST['id_categoria'];

        $promocao = new Promocoes($id_promo);
        $promocao->nome_promo = $nome_promo;
        $promocao->local_promo = $local_promo;
        $promocao->prazo_promo = $prazo_promo;
        $promocao->link_promo = $link_promo;
        $promocao->descricao_promo = $descricao_promo;
        $promocao->cupom = $cupom;
        $promocao->id_categoria_promo = $categoria;

        if (isset($_FILES['img_promo']) && $_FILES['img_promo']['error'] === UPLOAD_ERR_OK) {
            $img_dir = $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/uploads/';
            $img_name = $_FILES['img_promo']['name'];
            $img_tmp_name = $_FILES['img_promo']['tmp_name'];
            $img_path = $img_dir . $img_name;

            if (move_uploaded_file($img_tmp_name, $img_path)) {
                $promocao->img_promo = $img_path;
            } else {
                echo "Erro ao mover o arquivo da imagem.";
            }
        }

        $promocao->editar();
        header("Location: /projeto_47/views/admin/listar_promocoes.php");
        exit();
    } else {
        echo "Requisição inválida.";
    }
} catch (PDOException $e) {
    echo "Erro ao editar promoção: " . $e->getMessage();
}
?>
