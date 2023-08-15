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
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/evento.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/categoria_evento.php';

try {
    $evento = new Evento($_GET['id']);
    $categorias = CategoriaEvento::listar();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>


<h1 class="text-center">Editar Evento</h1>
<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    <form class="row gy-2 gx-3 align-items-center" action="/ondeacontece/controllers/editar_evento_controller.php" method="post">
        <input type="hidden" name="id_evento" value="<?= $evento->id_evento; ?>">

        <div class="col-md-6">
            <label class="form-label" for="tituloEvento">Título do Evento:</label>
            <input class="form-control" type="text" id="tituloEvento" name="tituloEvento" value="<?= $evento->titulo; ?>" required><br>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="latitudeEvento">Latitude:</label>
            <input class="form-control" type="text" id="latitudeEvento" name="latitudeEvento" value="<?= $evento->latitude; ?>" required><br>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="longitudeEvento">Longitude:</label>
            <input class="form-control" type="text" id="longitudeEvento" name="longitudeEvento" value="<?= $evento->longitude; ?>" required><br>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="localEvento">Local do Evento:</label>
            <input class="form-control" type="text" id="localEvento" name="localEvento" value="<?= $evento->local_evento; ?>" required>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="data_evento">Data do Evento:</label>
            <input class="form-control" type="date" id="data_evento" name="data_evento" value="<?= $evento->data_evento; ?>" required><br>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="descricao_evento">Descrição do Evento:</label><br>
            <textarea class="form-control" id="descricao_evento" name="descricao_evento" required><?= $evento->descricao_evento; ?></textarea><br>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="preco">Preço do Evento:</label>
            <input class="form-control" type="text" id="preco" name="preco" value="<?= $evento->preco; ?>"><br>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="link_evento">Link do Evento:</label>
            <input class="form-control" type="text" id="link_evento" name="link_evento" value="<?= $evento->link_evento; ?>"><br>
        </div>


        <div class="col-md-4">
            <label class="form-label" for="id_categoria">Categoria do Evento:</label>
            <select class="form-select" aria-label="Default select example" name="id_categoria">
                <?php $categoria_anterior = $evento->id_categoria ?>
                
                <?php foreach($categorias as $c) : ?>
                    <option value="<?= $c['id_categoria_evento'] ?>" <?= $c['id_categoria_evento'] == $categoria_anterior ? "selected" : "" ?>><?= $c['nome_categoria_evento'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12">
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>
</div>




<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>