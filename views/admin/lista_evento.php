<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
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
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projeto_47";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $sql = "SELECT eventos.*, categoria_evento.nome_categoria_evento 
                FROM eventos 
                INNER JOIN categoria_evento ON eventos.id_categoria = categoria_evento.id_categoria_evento";

            $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["titulo"] . "</td>";
                echo "<td>" . $row["local_evento"] . "</td>";
                echo "<td>" . $row["data_evento"] . "</td>";
                echo "<td>" . $row["descricao_evento"] . "</td>";
                echo "<td>" . $row["preco"] . "</td>";
                echo "<td>" . $row["link_evento"] . "</td>";
                echo "<td>" . $row["nome_categoria_evento"] . "</td>";
                echo "<td><a href='editar_evento.php?id=" . $row["id_evento"] . "'>Editar</a></td>";
                echo "<td><a href='/projeto_47/controllers/excluir_evento_controller.php?id=" . $row["id_evento"] . "'>Excluir</a></td>";
                echo "</tr>";
            }
        }
            $conn->close();
            ?>
    </table>
    </thead>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>