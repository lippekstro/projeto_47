<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Galeria de Eventos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 10px;
            flex: 1;
            max-width: calc(33.33% - 40px);
            box-sizing: border-box;
            text-align: center;
        }

        .card img {
            max-width: 100%;
            height: auto;
        }

        @media screen and (max-width: 768px) {
            .card {
                max-width: calc(50% - 20px);
            }
        }
    </style>
</head>

<body>


    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projeto_47";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        $cards_sql = "SELECT id_evento, id_comentario FROM cards";
        $cards_result = $conn->query($cards_sql);

        if ($cards_result->num_rows > 0) {
            while ($cards_row = $cards_result->fetch_assoc()) {
                $id_evento = $cards_row["id_evento"];
                $id_comentario = $cards_row["id_comentario"];

                $event_comment_sql = "SELECT e.img_evento, e.local_evento, e.data_evento, e.curtidas, c.conteudo
                                      FROM eventos AS e
                                      LEFT JOIN comentario AS c ON e.id_evento = c.id_evento
                                      WHERE e.id_evento = '$id_evento' AND c.id_comentario = '$id_comentario'";

                $event_comment_result = $conn->query($event_comment_sql);

                if ($event_comment_result && $event_comment_result->num_rows > 0) {
                    $row = $event_comment_result->fetch_assoc();
                    $img_evento = $row["img_evento"];
                    $local_evento = $row["local_evento"];
                    $data_evento = date("d/m/Y", strtotime($row["data_evento"]));
                    $curtidas = $row["curtidas"];
                    $conteudo_comentario = $row["conteudo"];
                    ?>

                    <div class="card">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($img_evento); ?>" alt="Imagem do Evento">
                        <p>Local do Evento: <?php echo $local_evento; ?></p>
                        <p>Data do Evento: <?php echo $data_evento; ?></p>
                        <p>Curtidas: <?php echo $curtidas; ?></p>
                        <p>Comentário: <?php echo $conteudo_comentario; ?></p>
                    </div>

                    <?php
                }
            }
        } else {
            echo "Nenhum evento encontrado.";
        }

        $conn->close();
        ?>
    </div>
    </div>
</body>

</html>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>
