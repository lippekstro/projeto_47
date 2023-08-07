<?php
session_start();

if (isset($_COOKIE['msg'])){
    setcookie('msg', '', time() - 3600, '/projeto_47/');
    setcookie('tipo', '', time() - 3600, '/projeto_47/');
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/faq.php';

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/projeto_47/');
    setcookie('tipo', 'perigo', time() + 3600, '/projeto_47/');
    header('Location: /projeto_47/index.php');
    exit();
}

try {
    $faqs = Faq::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<section>
    <?php if (isset($_COOKIE['msg'])) : ?>
        <?php if ($_COOKIE['tipo'] === 'sucesso') : ?>
            <div class="alert alert-success text-center m-3" role="alert">
                <?= $_COOKIE['msg'] ?>
            </div>
        <?php elseif ($_COOKIE['tipo'] === 'perigo') : ?>
            <div class="alert alert-danger text-center m-3" role="alert">
                <?= $_COOKIE['msg'] ?>
            </div>
        <?php else : ?>
            <div class="alert alert-info text-center m-3" role="alert">
                <?= $_COOKIE['msg'] ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</section>

<section class="d-flex justify-content-center m-5">
    <table class="table table-hover col col-lg-12">
        <thead>
            <tr>
                <th scope="col">Pergunta</th>
                <th scope="col">Resposta</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($faqs as $f) : ?>
                <tr>
                    <td class="col-2"><?= $f['faq_pergunta'] ?></td>
                    <td class="col-2"><?= $f['faq_resposta'] ?></td>
                    <td class="col-2"><a href="/projeto_47/views/admin/editar_faq.php?id=<?= $f['id_faq'] ?>">Editar</a></td>
                    <td class="col-2"><a href="/projeto_47/controllers/delete_faq_controller.php?id=<?= $f['id_faq'] ?>">Deletar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>