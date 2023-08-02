<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Evento</title>
</head>
<body>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "projeto_47";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    if (isset($_GET["id"])) {
        $id_evento = $_GET["id"];

        $sql = "SELECT * FROM eventos WHERE id_evento = $id_evento";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            ?>
            <h1>Editar Evento</h1>
            <form action="/projeto_47/controllers/editar_evento_controller.php" method="post">
                <input type="hidden" name="id_evento" value="<?php echo $row['id_evento']; ?>">
                <label for="local_evento">Local:</label>
                <input type="text" id="local_evento" name="local_evento" value="<?php echo $row['local_evento']; ?>" required><br>
                <label for="data_evento">Data:</label>
                <input type="date" id="data_evento" name="data_evento" value="<?php echo $row['data_evento']; ?>" required><br>
                <label for="descricao_evento">Descrição:</label><br>
                <textarea id="descricao_evento" name="descricao_evento"><?php echo $row['descricao_evento']; ?></textarea><br>
                <label for="preco">Preço:</label>
                <input type="text" id="preco" name="preco" value="<?php echo $row['preco']; ?>"><br>
                <label for="link_evento">Link:</label>
                <input type="text" id="link_evento" name="link_evento" value="<?php echo $row['link_evento']; ?>"><br>
                <label for="id_categoria">Categoria:</label>
                <select id="id_categoria" name="id_categoria">
                    <?php
                    $sql_categoria = "SELECT * FROM categoria_evento";
                    $result_categoria = $conn->query($sql_categoria);
                    while ($row_categoria = $result_categoria->fetch_assoc()) {
                        $selected = ($row_categoria['id_categoria_evento'] == $row['id_categoria']) ? "selected" : "";
                        echo "<option value='" . $row_categoria['id_categoria_evento'] . "' $selected>" . $row_categoria['nome_categoria_evento'] . "</option>";
                    }
                    ?>
                </select><br>
                <input type="submit" value="Salvar">
            </form>
            <?php
        } else {
            echo "Evento não encontrado.";
        }
    } else {
        echo "ID do evento não fornecido.";
    }

    $conn->close();
    ?>
</body>
</html>




<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>