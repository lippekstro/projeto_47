<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/promocoes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';

try {
    if (isset($_GET['id_promo'])) {
        $id_promo = $_GET['id_promo'];
        $promocao = new Promocoes($id_promo);
    } else {
        echo "ID de promoção não especificado.";
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao carregar a promoção: " . $e->getMessage();
}
?>

<body>
    <h1 class="text-center">Editar Promoção</h1>
<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    
        <form class="row gy-2 gx-3 align-items-center" action="\projeto_47\controllers\editar_promocoes_controller.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_promo" value="<?= $promocao->id_promo ?>">
    
            <div class="col-md-6">
                <label class="form-label" for="nome_promo">Nome:</label>
                <input class="form-control" type="text" name="nome_promo" id="nome_promo" value="<?= $promocao->nome_promo ?>" required>
            </div>
    
            <div class="col-md-6">
                <label class="form-label" for="local_promo">Local:</label>
                <input class="form-control" type="text" name="local_promo" id="local_promo" value="<?= $promocao->local_promo ?>" required>
            </div>
    
            <div class="col-md-6">
                <label class="form-label" for="prazo_promo">Prazo:</label>
                <input class="form-control" type="date" name="prazo_promo" id="prazo_promo" value="<?= $promocao->prazo_promo ?>" required>
            </div>
    
            <div class="col-md-6">
                <label class="form-label" for="link_promo">Link:</label>
                <input class="form-control" type="text" name="link_promo" id="link_promo" value="<?= $promocao->link_promo ?>" required>
            </div>
    
            <div class="col-md-6">
                <label class="form-label" for="descricao_promo">Descrição:</label>
                <input class="form-control" type="text" name="descricao_promo" id="descricao_promo" value="<?= $promocao->descricao_promo ?>" required>
            </div>
    
            <div class="col-md-6">
                <label class="form-label" for="cupom">Cupom:</label>
                <input class="form-control" type="text" name="cupom" id="cupom" value="<?= $promocao->cupom ?>" required>
            </div>
    
            <div class="col-md-6">
                <label class="form-label" for="img_promo">Imagem da Promoção:</label>
                <input class="form-control" type="file" name="img_promo" id="img_promo">
                <p>Imagem atual: <img src="<?= $promocao->img_promo ?>" alt="Imagem da Promoção" width="200"></p>
            </div>
    
            <div class="col-12">
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
        </form>
</div>
</body>

</html>
