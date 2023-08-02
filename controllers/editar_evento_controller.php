<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projeto_47";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    function limparDados($dados) {
        return htmlspecialchars(trim($dados));
    }

   
    $id_evento = limparDados($_POST["id_evento"]);
    $local_evento = limparDados($_POST["local_evento"]);
    $data_evento = limparDados($_POST["data_evento"]);
    $descricao_evento = limparDados($_POST["descricao_evento"]);
    $preco = isset($_POST["preco"]) ? floatval($_POST["preco"]) : null;
    $link_evento = isset($_POST["link_evento"]) ? limparDados($_POST["link_evento"]) : null;
    $id_categoria = limparDados($_POST["id_categoria"]);

    
    if (empty($local_evento) || empty($data_evento) || empty($descricao_evento) || empty($id_categoria)) {
        echo "Erro: Todos os campos obrigatórios devem ser preenchidos.";
        exit;
    }

   
    $sql = "UPDATE eventos SET local_evento = ?, data_evento = ?, descricao_evento = ?, preco = ?, link_evento = ?, id_categoria = ? WHERE id_evento = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Erro na preparação da instrução SQL: " . $conn->error;
        exit;
    }

   
    $stmt->bind_param("sssdssi", $local_evento, $data_evento, $descricao_evento, $preco, $link_evento, $id_categoria, $id_evento);

   
    if ($stmt->execute()) {
        echo "Evento atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o evento: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
