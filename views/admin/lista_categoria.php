<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/categoria_evento.php';

try {
    $categorias = CategoriaEvento::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<h1 class="text-center">Lista Categorias</h1>
<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $c) : ?>
                <tr>
                    <td><?= $c['nome_categoria_evento'] ?></td>
                    <td><a href="/projeto_47/views/admin/editar_categoria_evento.php?id=<?= $c['id_categoria_evento'] ?>">Editar</a></td>
                    <td><a href="/projeto_47/controllers/delete_cat_evento_controller.php?id=<?= $c['id_categoria_evento'] ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>