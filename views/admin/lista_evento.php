<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

    <h1>Lista de Eventos</h1>
    <table>
        <tr>
            <th>Local</th>
            <th>Data</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Link</th>
            <th>Categoria</th>
            <th>Editar</th>
            <th>Excluir</th>
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
                echo "<td>" . $row["local_evento"] . "</td>";
                echo "<td>" . $row["data_evento"] . "</td>";
                echo "<td>" . $row["descricao_evento"] . "</td>";
                echo "<td>" . $row["preco"] . "</td>";
                echo "<td>" . $row["link_evento"] . "</td>";
                echo "<td>" . $row["nome_categoria_evento"] . "</td>";
                echo "<td><a href='editar_evento.php?id=" . $row["id_evento"] . "'>Editar</a></td>";
                echo "<td><a href='javascript:void(0);' onclick='excluirEvento(" . $row["id_evento"] . ");'>Excluir</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Nenhum evento encontrado.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <script>
    function excluirEvento(id) {
        if (confirm("Tem certeza que deseja excluir o evento?")) {
        
            var row = document.getElementById("evento-" + id);
            if (row) {
                row.style.display = "none";
            }
        }
    }
    </script>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>
