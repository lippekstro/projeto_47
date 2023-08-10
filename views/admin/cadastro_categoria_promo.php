<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<h1 class="text-center">Cadastro de Categoria</h1>
<div>
    <form class="row m-3 align-items-center" action="/projeto_47/controllers/cadastro_cat_promo_controller.php" method="post">
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
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>