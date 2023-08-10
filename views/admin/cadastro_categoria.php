<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<h1 class="text-center">Cadastro de Categoria</h1>
<div >
<form  class="row gy-2 gx-3 align-items-center" action="cadastro_categoria.php" method="post">
<div  class="col-md-6">
    <label class="form-label" for="nome_categoria">Nome da Categoria:</label>
    <input class="form-control" type="text" id="nome_categoria" name="nome_categoria" required>
    </div>
    <div  class="col-12">
    <input class="btn btn-primary" type="submit" value="Cadastrar">
    </div>
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
</div>

<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>