<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/Promocoes.php';
/* require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php'; */
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';

try {
    $promocoes = Promocoes::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>


    <h1  class="text-center">Lista de Promoções</h1>
    <div  class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    <table  class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Local</th>
                <th>Prazo</th>
                <th>Descrição</th>
                <th>Cupom</th>
                <th>Imagem</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promocoes as $promocao) : ?>
                <tr>
                    <td><?= $promocao['id_promo'] ?></td>
                    <td><?= $promocao['nome_promo'] ?></td>
                    <td><?= $promocao['local_promo'] ?></td>
                    <td><?= $promocao['prazo_promo'] ?></td>
                    <td><?= $promocao['descricao_promo'] ?></td>
                    <td><?= $promocao['cupom'] ?></td>
                    <td>
                        <?php if ($promocao['img_promo']) : ?>
                            <img src="data:image/jpg;charset=utf9;base64,<?php echo base64_encode($promocao['img_promo']) ?>" alt="Imagem Promoção" class="img-fluid">
                        <?php else : ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td><a href="\projeto_47\views\admin\editar_promocoes.php?id_promo=<?= $promocao['id_promo'] ?>">Editar</a></td>
                    <td><a href="/projeto_47/controllers/deletar_promocoes_controller.php?id_promo=<?= $promocao['id_promo'] ?>">Deletar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php'; ?>
