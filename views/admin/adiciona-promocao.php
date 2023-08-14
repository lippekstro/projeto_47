<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<h1 class="text-center">Adicionar Promoção</h1>
<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="" scope="col">Local</th>
                <th scope="col">Data</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Link</th>
                <th scope="col">Categoria</th>
                <th scope="col">Adicionar Promoção</th>
            </tr>
            <tr>
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
                        echo "<td>";
                        echo "<a href='editar-promocao.php?id_evento=" . $row["id_evento"] . "' class='btn btn-primary'>Adicionar Promoção</a>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Nenhum evento encontrado.</td></tr>";
                }
                $conn->close();
                ?>
            </tr>
        </thead>
    </table>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>
