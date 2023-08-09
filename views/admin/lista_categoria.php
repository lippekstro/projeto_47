<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<h1 class="text-center">Lista Categorias</h1>
<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "projeto_47";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM categoria_evento";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nome_categoria_evento"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='1'>Nenhuma categoria encontrada.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>
