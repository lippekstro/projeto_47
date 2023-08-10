<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/evento.php';

try {
    $eventos = Evento::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<style>
    body {
        background-color: white;
        color: black;
    }

    /* Estilos para centralizar e estilizar o h1 */
    h1 {
        text-align: center;
        /* Centraliza horizontalmente */
        font-family: 'Arial', sans-serif;
        /* Fonte */
        font-size: 36px;
        /* Tamanho do texto */
        color: #006494;
        /* Cor do texto */
        text-transform: uppercase;
        /* Transforma o texto em maiúsculas */
        letter-spacing: 2px;
        /* Espaçamento entre as letras */
        margin-top: 50px;
        /* Margem superior para afastar do topo */
    }

    /* Estilos para a tabela */
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        background-color: #f5faff;
        border: 1px solid #d0e3f0;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border: 1px solid #d0e3f0;
    }

    th {
        background-color: #13293d;
        color: white;
    }
</style>

<h1>Agenda</h1>
<table>
    <tr>
        <th>Nome</th>
        <th>Data</th>
        <th>Local</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Link</th>
        <th>Detalhes</th>
        <!--<th>id_categoria</th>-->
    </tr>
    <?php foreach ($eventos as $e) : ?>
        <tr>
            <td><?= $e['titulo'] ?></td>
            <td><?= $e['data_evento'] ?></td>
            <td><?= $e['local_evento'] ?></td>
            <td><?= $e['descricao_evento'] ?></td>
            <td><?= $e['preco'] ?></td>
            <td><?= $e['link_evento'] ?></td>
            <td><a href="detalhesevento.php?id_evento=<?= $e["id_evento"] ?>">Ver Detalhes</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>