<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/promocoes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/categoria_promo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php';

try {
    if (isset($_GET['id_promo'])) {
        $id_promo = $_GET['id_promo'];
        $promocao = new Promocoes($id_promo);
        $categorias = CategoriaPromo::listar();
    } else {
        echo "ID de promoção não especificado.";
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao carregar a promoção: " . $e->getMessage();
}
?>

<body>
    <h1 class="text-center">Editar Promoção</h1>
    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

        <form class="row gy-2 gx-3 align-items-center" action="\ondeacontece\controllers\editar_promocoes_controller.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_promo" value="<?= $promocao->id_promo ?>">

            <div class="col-md-6">
                <label class="form-label" for="nome_promo">Nome:</label>
                <input class="form-control" type="text" name="nome_promo" id="nome_promo" value="<?= $promocao->nome_promo ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="local_promo">Local:</label>
                <input class="form-control" type="text" name="local_promo" id="local_promo" value="<?= $promocao->local_promo ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="prazo_promo">Prazo:</label>
                <input class="form-control" type="date" name="prazo_promo" id="prazo_promo" value="<?= $promocao->prazo_promo ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="link_promo">Link:</label>
                <input class="form-control" type="text" name="link_promo" id="link_promo" value="<?= $promocao->link_promo ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="descricao_promo">Descrição:</label>
                <input class="form-control" type="text" name="descricao_promo" id="descricao_promo" value="<?= $promocao->descricao_promo ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="cupom">Cupom:</label>
                <input class="form-control" type="text" name="cupom" id="cupom" value="<?= $promocao->cupom ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="id_categoria">Categoria:</label>
                <select class="form-select" aria-label="Default select example" name="id_categoria">
                    <?php $categoria_anterior = $promocao->id_categoria_promo ?>

                    <?php foreach ($categorias as $c) : ?>
                        <option value="<?= $c['id_categoria_promo'] ?>" <?= $c['id_categoria_promo'] == $categoria_anterior ? "selected" : "" ?>><?= $c['nome_categoria_promo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-12">
                <input class="btn btn-primary" type="submit" value="Salvar">
            </div>
        </form>
    </div>
</body>

</html>