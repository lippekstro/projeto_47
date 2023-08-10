<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    function limparDados($dados) {
        return htmlspecialchars(trim($dados));
    }

    $titulo = limparDados($_POST["tituloEvento"]);
    $latitude = limparDados($_POST["latitudeEvento"]);
    $longitude = limparDados($_POST["longitudeEvento"]);
    $dataEvento = limparDados($_POST["dataEvento"]);
    $localEvento = limparDados($_POST["localEvento"]);
    $descricaoEvento = limparDados($_POST["descricaoEvento"]);
    $precoEvento = isset($_POST["precoEvento"]) ? floatval($_POST["precoEvento"]) : null;
    $linkEvento = isset($_POST["linkEvento"]) ? limparDados($_POST["linkEvento"]) : null;
    $categoriaEvento = limparDados($_POST["categoriaEvento"]);
    
   
    if (empty($titulo) || empty($latitude) || empty($longitude) || empty($dataEvento) || empty($localEvento) || empty($descricaoEvento) || empty($categoriaEvento)) {
        echo "Erro: Todos os campos obrigatórios devem ser preenchidos.";
        exit;
    }

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "projeto_47";

    $conexao = new mysqli($hostname, $username, $password, $database);

    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    $consulta_categoria = "SELECT id_categoria_evento FROM categoria_evento WHERE id_categoria_evento = ?";
    $stmt_categoria = $conexao->prepare($consulta_categoria);
    $stmt_categoria->bind_param("i", $categoriaEvento);
    $stmt_categoria->execute();
    $result_categoria = $stmt_categoria->get_result();

    if ($result_categoria->num_rows > 0) {
        
        /* $targetDirectory = "path/to/your/image/directory/";
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0755, true); 
        } */

        $uploadedFileName = file_get_contents($_FILES["imagemEvento"]["tmp_name"]);
        /* $uploadedFileName = preg_replace("/[^a-zA-Z0-9._-]/", "", $uploadedFileName); 
        $targetFilePath = $targetDirectory . $uploadedFileName; */

        if ($_FILES["imagemEvento"]["error"] !== UPLOAD_ERR_OK) {
            echo "Erro no upload do arquivo: " . $_FILES["imagemEvento"]["error"];
            exit;
        }

        /* if (move_uploaded_file($_FILES["imagemEvento"]["tmp_name"], $targetFilePath)) {
           
            $imagemEvento = $targetFilePath;
        } else {
           
            $imagemEvento = null;
        } */

        $sql = "INSERT INTO eventos (titulo, latitude, longitude, local_evento, data_evento, descricao_evento, preco, link_evento, img_evento, id_categoria) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        if (!$stmt) {
            echo "Erro na preparação da instrução SQL: " . $conexao->error;
            exit;
        }

        $stmt->bind_param("ssssssdssi", $titulo, $latitude, $longitude, $localEvento, $dataEvento, $descricaoEvento, $precoEvento, $linkEvento, $uploadedFileName, $categoriaEvento);

        if ($stmt->execute()) {
            header("Location: /projeto_47/views/admin/lista_evento.php");
        } else {
            echo "Erro ao cadastrar o evento: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro: A categoria desejada não existe na tabela categoria_evento.";
    }

    $stmt_categoria->close();
    $conexao->close();
}
?>
