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
    $categorias = CategoriaEvento::listar();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>


<h1 class="text-center">Cadastro de Evento</h1>
<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    <form class="row gy-2 gx-3 align-items-center" action="/ondeacontece/controllers/cadastro_evento_controller.php" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <label class="form-label" for="tituloEvento">Título do Evento:</label>
            <input class="form-control" type="text" id="tituloEvento" name="tituloEvento" required><br>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="latitudeEvento">Latitude:</label>
            <input class="form-control" type="text" id="latitudeEvento" name="latitudeEvento" required><br>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="longitudeEvento">Longitude:</label>
            <input class="form-control" type="text" id="longitudeEvento" name="longitudeEvento" required><br>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="dataEvento">Data do Evento:</label>
            <input class="form-control" type="date" id="dataEvento" name="dataEvento" required>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="localEvento">Local do Evento:</label>
            <input class="form-control" type="text" id="localEvento" name="localEvento" required>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="descricaoEvento">Descrição do Evento:</label>
            <textarea class="form-control" id="descricaoEvento" name="descricaoEvento" rows="4" required></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="precoEvento">Preço do Evento:</label>
            <input class="form-control" type="number" id="precoEvento" name="precoEvento" step="0.01">
        </div>

        <div class="col-md-6">
            <label class="form-label" for="linkEvento">Link do Evento:</label>
            <input class="form-control" type="url" id="linkEvento" name="linkEvento">
        </div>

        <div class="col-md-6">
            <label class="form-label" for="imagemEvento">Imagem do Evento:</label>
            <input class="form-control" type="file" id="imagemEvento" name="imagemEvento">
        </div>

        <div class="col-md-4">
            <label class="form-label" for="categoriaEvento">Categoria do Evento:</label>
            <select class="form-select" id="categoriaEvento" name="categoriaEvento" required>
                <?php foreach ($categorias as $c) : ?>
                    <option value="<?= $c['id_categoria_evento'] ?>"><?= $c['nome_categoria_evento'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12">
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </div>
</div>
<br>




</form>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>