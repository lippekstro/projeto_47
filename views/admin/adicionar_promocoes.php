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
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/categoria_promo.php';



try {
    $categorias = CategoriaPromo::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<h1 class="text-center">Adicionar Promoção</h1>
<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    <form action="/ondeacontece/controllers/adicionar_promocoes_controller.php" method="post" class="row gy-2 gx-3 align-items-center" enctype="multipart/form-data">
        <div class="col-md-6">
            <label class="form-label" for="nome_promo">Nome:</label>
            <input class="form-control" type="text" name="nome_promo" id="nome_promo" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="local_promo">Local:</label>
            <input class="form-control" type="text" name="local_promo" id="local_promo" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="prazo_promo">Prazo:</label>
            <input class="form-control" type="date" name="prazo_promo" id="prazo_promo" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="link_promo">Link:</label>
            <input class="form-control" type="text" name="link_promo" id="link_promo" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="descricao_promo">Descrição:</label>
            <input class="form-control" type="text" name="descricao_promo" id="descricao_promo" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="cupom">Cupom:</label>
            <input class="form-control" type="text" name="cupom" id="cupom" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="id_categoria">Categoria:</label>
            <select class="form-select" id="id_categoria" name="id_categoria">
                <?php foreach ($categorias as $c) : ?>
                    <option value="<?= $c['id_categoria_promo'] ?>"><?= $c['nome_categoria_promo'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="img_promo">Imagem da Promoção:</label>
            <input type="file" name="img_promo" accept="image/*" required>
        </div>
        <input class="btn btn-primary" type="submit" value="Adicionar">
    </form>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>