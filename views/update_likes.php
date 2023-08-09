<?php
// Arquivo curtir_evento.php

// Verificar se a solicitação é do tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projeto_47";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Obter o ID do evento e o número atualizado de curtidas
    $eventId = $_POST["event_id"];
    $likes = $_POST["likes"];

    // Atualizar as curtidas no banco de dados
    $sql = "UPDATE eventos SET curtidas = $likes WHERE id_evento = $eventId";

    if ($conn->query($sql) === TRUE) {
        echo "Curtidas atualizadas com sucesso!";
    } else {
        echo "Erro ao atualizar as curtidas: " . $conn->error;
    }

    $conn->close();
}
?>
