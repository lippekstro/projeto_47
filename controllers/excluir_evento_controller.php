<?php

$dsn = 'mysql:host=localhost;dbname=projeto_47;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
    exit();
}


if (isset($_GET['id'])) {
    $idEvento = $_GET['id'];

    $sql = "DELETE FROM eventos WHERE id_evento = :id_evento";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_evento', $idEvento, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: /projeto_47/views/admin/lista_evento.php");
    } catch (PDOException $e) {
        echo 'Erro ao excluir o evento: ' . $e->getMessage();
    }
} else {
    echo 'ID do evento não foi fornecido.';
}
?>