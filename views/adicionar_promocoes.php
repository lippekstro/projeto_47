<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';

/*
session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['nivel_acesso'] < 2) {
    header("Location: acesso_negado.php");
    exit();
}
*/
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Promoção</title>
    <link rel="stylesheet" href="/projeto_47/style.css">
</head>
<body>
    <h1 class="text-center">Adicionar Promoção</h1>
    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
        <form action="/projeto_47/controllers/adicionar_promocoes_controller.php" method="post" class="row gy-2 gx-3 align-items-center">
            <div class="col-md-6">
                <label class="form-label" for="nome_promo">Nome:</label>
                <input  class="form-control" type="text" name="nome_promo" id="nome_promo" required>
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
            <label for="img_promo">Imagem da Promoção:</label>
    <input type="file" name="img_promo" accept="image/*" required>

            </div>
            <input class="btn btn-primary" type="submit" value="Adicionar">
        </form>
    </div>
</body>
</html>

    </div>

<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>

</html>
