<?php
session_start();

if (isset($_COOKIE['msg'])) {
    setcookie('msg', '', time() - 3600, '/ondeacontece/');
    setcookie('tipo', '', time() - 3600, '/ondeacontece/');
}

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'perigo', time() + 3600, '/ondeacontece/');
    header('Location: /ondeacontece/index.php');
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php';
?>

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

<h1 class="text-center">Cadastro de Categoria</h1>
<div>
    <form class="row m-3 align-items-center" action="/ondeacontece/controllers/cadastro_cat_promo_controller.php" method="post">
        <div class="col-md-6">
            <label class="form-label" for="nome_categoria">Nome da Categoria:</label>
            <input class="form-control" type="text" id="nome_categoria" name="nome_categoria" required>
        </div>
        <div class="col-12 my-3">
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </div>
    </form>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>