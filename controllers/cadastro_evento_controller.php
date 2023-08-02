<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    function limparDados($dados) {
        return htmlspecialchars(trim($dados));
    }

    $nomeEvento = limparDados($_POST["nomeEvento"]);
    $dataEvento = limparDados($_POST["dataEvento"]);
    $localEvento = limparDados($_POST["localEvento"]);
    $descricaoEvento = limparDados($_POST["descricaoEvento"]);
    $precoEvento = isset($_POST["precoEvento"]) ? floatval($_POST["precoEvento"]) : null;
    $linkEvento = isset($_POST["linkEvento"]) ? limparDados($_POST["linkEvento"]) : null;
    $imagemEvento = isset($_POST["imagemEvento"]) ? limparDados($_POST["imagemEvento"]) : null;
    $categoriaEvento = limparDados($_POST["categoriaEvento"]);

   
    if (empty($nomeEvento) || empty($dataEvento) || empty($localEvento) || empty($descricaoEvento) || empty($categoriaEvento)) {
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
        $sql = "INSERT INTO eventos (local_evento, data_evento, descricao_evento, preco, link_evento, img_evento, id_categoria) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        if (!$stmt) {
            echo "Erro na preparação da instrução SQL: " . $conexao->error;
            exit;
        }

        $stmt->bind_param("sssdssi", $localEvento, $dataEvento, $descricaoEvento, $precoEvento, $linkEvento, $imagemEvento, $categoriaEvento);

        if ($stmt->execute()) {
            echo "Evento cadastrado com sucesso!";
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
