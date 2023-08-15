<?php
session_start();

if (isset($_COOKIE['msg'])) {
    setcookie('msg', '', time() - 3600, '/ondeacontece/');
    setcookie('tipo', '', time() - 3600, '/ondeacontece/');
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/evento.php';

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'perigo', time() + 3600, '/ondeacontece/');
    header('Location: /ondeacontece/index.php');
    exit();
}

try {
    $eventos = Evento::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<h1 class="text-center">Lista de Eventos</h1>
<div class="table-responsive-xxl m-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Nome Evento</th>
                <th scope="col">Local</th>
                <th scope="col">Data</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Link</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $f) : ?>
                <tr>
                    <td class="col-2"><?= $f['titulo'] ?></td>
                    <td class="col-2"><?= $f['local_evento'] ?></td>
                    <td class="col-2"><?= date('d/m/Y', strtotime($f['data_evento'])) ?></td>
                    <td class="col-2"><?= $f['descricao_evento'] ?></td>
                    <td class="col-2"><?= $f['preco'] ?></td>
                    <td class="col-2"><?= $f['link_evento'] ?></td>
                    <td class="col-2"><?= $f['nome_categoria_evento'] ?></td>
                    <td class="col-2"><a href="/ondeacontece/views/admin/editar_evento.php?id=<?= $f['id_evento'] ?>">Editar</a></td>
                    <td class="col-2"><a href="/ondeacontece/controllers/excluir_evento_controller.php?id=<?= $f['id_evento'] ?>">Deletar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>