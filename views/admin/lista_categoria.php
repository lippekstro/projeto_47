<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/categoria_evento.php';

try {
    $categorias = CategoriaEvento::listar();
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
                    <td><?= $c['nome_categoria_evento'] ?></td>
                    <td><a href="/ondeacontece/views/admin/editar_categoria_evento.php?id=<?= $c['id_categoria_evento'] ?>">Editar</a></td>
                    <td><a href="/ondeacontece/controllers/delete_cat_evento_controller.php?id=<?= $c['id_categoria_evento'] ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>