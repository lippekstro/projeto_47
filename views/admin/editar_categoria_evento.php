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
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/categoria_evento.php';

try {
    $cat = new CategoriaEvento($_GET['id']);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<h1 class="text-center">Cadastro de Categoria</h1>
<div>
    <form class="row m-3 align-items-center" action="/ondeacontece/controllers/edita_cat_evento_controller.php" method="post">
        <input type="hidden" name="id_categoria_evento" value="<?= $cat->id_categoria_evento ?>">
        <div class="col-md-6">
            <label class="form-label" for="nome_categoria">Nome da Categoria:</label>
            <input class="form-control" type="text" id="nome_categoria" name="nome_categoria" value="<?= $cat->nome_categoria_evento ?>" required>
        </div>
        <div class="col-12 my-3">
            <input class="btn btn-primary" type="submit" value="Atualizar">
        </div>
    </form>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>