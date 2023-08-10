<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/categoria_promo.php';

try {
    $categorias = CategoriaPromo::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<h1 class="text-center">Lista Categorias</h1>
<div class="table-responsive-xxl m-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $c) : ?>
                <tr>
                    <td><?= $c['nome_categoria_promo'] ?></td>
                    <td><a href="/projeto_47/views/admin/editar_categoria_promo.php?id=<?= $c['id_categoria_promo'] ?>">Editar</a></td>
                    <td><a href="/projeto_47/controllers/delete_cat_promo_controller.php?id=<?= $c['id_categoria_promo'] ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>