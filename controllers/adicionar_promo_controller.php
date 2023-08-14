

<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $pdo = Conexao::conectar(); 

    function limparDados($dados) {
        return htmlspecialchars(trim($dados));
    }

    $id_evento = limparDados($_POST["id_evento"]);
    $titulo = limparDados($_POST["tituloEvento"]);
    $descricao = limparDados($_POST["descricao_evento"]);
    $preco = limparDados($_POST["preco"]);
    $link = limparDados($_POST["link_evento"]);
    $id_categoria = limparDados($_POST["id_categoria"]);
  

    if (empty($titulo) || empty($descricao) || empty($preco) || empty($link) || empty($id_categoria)) {
        echo "Erro: Todos os campos obrigatórios devem ser preenchidos.";
        exit;
    }

    $sql = "UPDATE eventos SET local_evento = ?, titulo = ?, data_evento = ?, descricao_evento = ?, preco = ?, link_evento = ?, id_categoria = ?, latitude = ?, longitude = ? WHERE id_evento = ?";
    $stmt = $pdo->prepare($sql);

    if (!$stmt) {
        echo "Erro na preparação da instrução SQL: " . $pdo->errorInfo();
        exit;
    }

    $stmt->bindParam(1, $id_evento);
    $stmt->bindParam(2, $titulo);
    $stmt->bindParam(3, $descricao);
    $stmt->bindParam(4, $preco);
    $stmt->bindParam(5, $link);
    $stmt->bindParam(6, $id_categoria);

    if ($stmt->execute()) {
        // Redirecionamento para a página que exibe os produtos de acordo com a categoria
        header("Location: /projeto_47/views/admin/lista_promo.php?categoria=$id_categoria");
    } else {
        echo "Erro ao atualizar o evento: " . $stmt->errorInfo();
    }

    $stmt = null;
}
?>
