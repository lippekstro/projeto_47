<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>
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
            <h1 class="text-center">Editar Evento</h1>
            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
            <form class="row gy-2 gx-3 align-items-center" action="/projeto_47/controllers/editar_evento_controller.php" method="post">
                <input type="hidden" name="id_evento" value="<?php echo $row['id_evento']; ?>">

                <div  class="col-md-6">
                <label class="form-label" for="local_evento">Local do Evento:</label>
                <input class="form-control" type="text" id="local_evento" name="local_evento" value="<?php echo $row['local_evento']; ?>" required><br>
                </div>

                <div  class="col-md-6">
                <label class="form-label" for="data_evento">Data do Evento:</label>
                <input class="form-control" type="date" id="data_evento" name="data_evento" value="<?php echo $row['data_evento']; ?>" required><br>
                </div>

                <div  class="col-md-6">
                <label class="form-label" for="descricao_evento">Descrição do Evento:</label><br>
                <textarea class="form-control" id="descricao_evento" name="descricao_evento"><?php echo $row['descricao_evento']; ?></textarea><br>
                </div>

                <div  class="col-md-6">
                <label class="form-label" for="preco">Preço do Evento:</label>
                <input class="form-control" type="text" id="preco" name="preco" value="<?php echo $row['preco']; ?>"><br>
                </div>

                <div  class="col-md-6">
                <label class="form-label" for="link_evento">Link do Evento:</label>
                <input class="form-control" type="text" id="link_evento" name="link_evento" value="<?php echo $row['link_evento']; ?>"><br>
                </div>

                <div  class="col-md-4">
                <label class="form-label" for="id_categoria">Categoria do Evento:</label>
                <select class="form-select" id="id_categoria" name="id_categoria">
                    <?php
                    $sql_categoria = "SELECT * FROM categoria_evento";
                    $result_categoria = $conn->query($sql_categoria);
                    while ($row_categoria = $result_categoria->fetch_assoc()) {
                        $selected = ($row_categoria['id_categoria_evento'] == $row['id_categoria']) ? "selected" : "";
                        echo "<option value='" . $row_categoria['id_categoria_evento'] . "' $selected>" . $row_categoria['nome_categoria_evento'] . "</option>";
                    }
                    ?>
                </select><br>
                </div>
            
                <div  class="col-12">
                <input class="btn btn-primary" type="submit" value="Salvar">
                </div>
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
    </div>


<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>