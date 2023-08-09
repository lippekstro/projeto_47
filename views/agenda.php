<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body
    {   background-color:white;
        color: black;
    }
 
    /* Estilos para centralizar e estilizar o h1 */
h1 {
    text-align: center; /* Centraliza horizontalmente */
    font-family: 'Arial', sans-serif; /* Fonte */
    font-size: 36px; /* Tamanho do texto */
    color: #006494; /* Cor do texto */
    text-transform: uppercase; /* Transforma o texto em maiúsculas */
    letter-spacing: 2px; /* Espaçamento entre as letras */
    margin-top: 50px; /* Margem superior para afastar do topo */
}

 /* Estilos para a tabela */
table {
    width: 80%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #f5faff;
    border: 1px solid #d0e3f0;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid #d0e3f0;
}

th {
    background-color:  #13293d;
    color: white;
}


    </style>
</head>
<!DOCTYPE html>
<html>
<head>
    <title>Eventos</title>
</head>
<!DOCTYPE html>
<html>
<head>
    <title>Eventos</title>
</head>
<body>
    <h1>Agenda</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Local</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Link</th>
            <!--<th>id_categoria</th>-->
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "projeto_47");
        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }

        $sql = "SELECT id_evento, data_evento, local_evento, descricao_evento, preco, link_evento, id_categoria FROM eventos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id_evento"] . '</td>';
        echo '<td>' . $row["data_evento"] . '</td>';
        echo '<td>' . $row["local_evento"] . '</td>';
        echo '<td>' . $row["descricao_evento"] . '</td>';
        echo '<td>' . $row["preco"] . '</td>';
       
        
        // Adicione um link para exibir os detalhes do evento usando o ID do evento
        echo '<td><a href="detalhesevento.php?id_evento=' . $row["id_evento"] . '">Ver Detalhes</a></td>';
        
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">Nenhum evento encontrado</td></tr>';
}

$conn->close();
?>

    </table>
    <footer>
        <div class="container">
            <footer class="py-3 my-4">
              <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
              </ul>
              <p class="text-center text-muted">© 2022 Company, Inc</p>
            </footer>
          </div>
    </footer>
</body>
</html>

<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>