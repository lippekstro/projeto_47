<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

    <h1>Cadastro de Evento</h1>
    <form action="/projeto_47/controllers/cadastro_evento_controller.php" method="post" enctype="multipart/form-data">
        <label for="nomeEvento">Nome do Evento:</label>
        <input type="text" id="nomeEvento" name="nomeEvento" required>
        <br>

        <label for="dataEvento">Data do Evento:</label>
        <input type="date" id="dataEvento" name="dataEvento" required>
        <br>

        <label for="localEvento">Local do Evento:</label>
        <input type="text" id="localEvento" name="localEvento" required>
        <br>

        <label for="descricaoEvento">Descrição do Evento:</label>
        <textarea id="descricaoEvento" name="descricaoEvento" rows="4" required></textarea>
        <br>

        <label for="precoEvento">Preço do Evento:</label>
        <input type="number" id="precoEvento" name="precoEvento" step="0.01">
        <br>

        <label for="linkEvento">Link do Evento:</label>
        <input type="url" id="linkEvento" name="linkEvento">
        <br>

        <label for="imagemEvento">Imagem do Evento:</label>
        <input type="file" id="imagemEvento" name="imagemEvento">
        <br>
        <label for="categoriaEvento">Categoria do Evento:</label>
<select id="categoriaEvento" name="categoriaEvento" required>
    <option value="">Selecione a categoria</option>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projeto_47";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    
    $sql = "SELECT id_categoria_evento, nome_categoria_evento FROM categoria_evento";
    $result = $conn->query($sql);

  
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_categoria = $row["id_categoria_evento"];
            $nome_categoria = $row["nome_categoria_evento"];
            echo "<option value='$id_categoria'>$nome_categoria</option>";
        }
    } else {
        echo "<option value=''>Nenhuma categoria encontrada</option>";
    }

    $conn->close();
    ?>
</select>


       
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>

<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>