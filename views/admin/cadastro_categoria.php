<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<h1>Cadastro de Categoria</h1>
<form action="cadastro_categoria.php" method="post">
    <label for="nome_categoria">Nome da Categoria:</label>
    <input type="text" id="nome_categoria" name="nome_categoria" required>
    <input type="submit" value="Cadastrar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projeto_47";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }


    $nome_categoria = $_POST['nome_categoria'];


    $sql = "INSERT INTO categoria_evento (nome_categoria_evento) VALUES ('$nome_categoria')";
    if ($conn->query($sql) === TRUE) {
        $message = "Categoria cadastrada com sucesso!";
    } else {
        $message = "Erro ao cadastrar categoria: " . $conn->error;
    }


    $conn->close();

    echo '<p>' . $message . '</p>';
}
?>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>