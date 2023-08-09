<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .event-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Estilo para o contêiner da imagem e do botão "like" */
        .image-container {
            position: relative;
            display: inline-block;
        }

        /* Estilo para a imagem dentro do contêiner */
        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            /* Adicione bordas arredondadas à imagem (opcional) */
        }

        /* Estilo para o contêiner dos ícones "like" e número de curtidas */
        .like-icons-container {
            position: absolute;
            bottom: 10px;
            right: 10px;
            z-index: 1;
            display: flex;
            background-color: white;
            border-radius: 50px;
            align-items: center;
            padding: 5px;
            /* Adicione um espaçamento interno para os ícones */
        }

        /* Estilo para o ícone de coração */
        .event-like,
        .like-icon {
            font-size: 2.4rem;
            color: red;
            cursor: pointer;
            margin-right: 5px;
        }

        /* Estilo para o número de curtidas */
        .like-count {
            font-size: 1.8rem;
            color: red;
            margin-right: 5px;
        }

        /* Estilo para o texto "likes" */
        .like-text {
            font-size: 1.8rem;
            color: red;
        }


        .event-content {
            /* Ajuste o espaço entre a imagem e o conteúdo */
            padding-left: 20px;
        }

        /*comentários */
        .comentarios-container {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            /*width: 100%;*/
            padding-top: 20px;
        }

        .comentario {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .comentario .card-title {
            font-weight: bold;
        }

        .comentario .card-text {
            color: #333;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /*maps*/
        #map {
            width: 100%;
            height: 400px;
            margin-top: 20px;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp9GsGyQ65nk3oa47waSygq2_3Znjvdsg&callback=initMap" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Função para mostrar os corações quando o botão "like" é clicado
        function showHearts(eventId) {
            const heartsContainer = document.createElement('div');
            heartsContainer.classList.add('heart-container');
            document.body.appendChild(heartsContainer);

            for (let i = 0; i < 10; i++) {
                const heart = document.createElement('i');
                heart.classList.add('fas', 'fa-heart', 'heart');
                heart.style.top = Math.random() * 90 + 'vh';
                heart.style.left = Math.random() * 90 + 'vw';
                heartsContainer.appendChild(heart);
            }

            setTimeout(() => {
                heartsContainer.remove();
            }, 3000);
        }

        // Adicionar um evento de clique para o botão "like"
        const likeButtons = document.querySelectorAll('.event-like');
        likeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.getAttribute('data-event-id');
                showHearts(eventId);

                // Adicione aqui o código para atualizar o contador de curtidas no banco de dados
                // e exibir o novo número de curtidas no elemento com ID "likeCount-eventId"
            });
        });

        $(document).ready(function() {
            // Função para atualizar o contador de curtidas
            function updateLikes(eventId, likes) {
                $.ajax({
                    type: "POST",
                    url: "update_likes.php",
                    data: {
                        event_id: eventId,
                        likes: likes
                    },
                    success: function(response) {
                        // Atualizar o contador de curtidas no front-end após a atualização no banco de dados
                        $("#likeCount-" + eventId).text(likes);
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro ao atualizar as curtidas: " + error);
                    }
                });
            }

            // botão "like"
            $(".material-icons.like-icon").on("click", function() {
                const eventId = $(this).data("event-id");
                let likes = parseInt($("#likeCount-" + eventId).text());
                likes++;

                // Atualizar o contador de curtidas no front-end
                $("#likeCount-" + eventId).text(likes);

                // Chamar a função para atualizar as curtidas no banco de dados
                updateLikes(eventId, likes);
            });
        });

        function initMap(latitude, longitude, mapDivId) {
            var eventLocation = {
                lat: latitude,
                lng: longitude
            };

            var mapOptions = {
                center: eventLocation,
                zoom: 15
            };

            var map = new google.maps.Map(document.getElementById(mapDivId), mapOptions);

            var marker = new google.maps.Marker({
                position: eventLocation,
                map: map,
                title: 'Local do Evento'
            });
        }
    </script>

</head>

<body>
    <div class="container mt-5">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projeto_47";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Processar o envio do formulário de comentário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome_autor = $_POST['nome_autor'];
            $conteudo = $_POST['conteudo'];
            $id_evento = $_POST['id_evento'];

            // Inserir o comentário na tabela "comentario"
            $sql = "INSERT INTO comentario (nome_autor, conteudo, id_evento) VALUES ('$nome_autor', '$conteudo', '$id_evento')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success">Comentário enviado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger">Erro ao enviar o comentário: ' . $conn->error . '</div>';
            }
        }

        // informações dos eventos
        $id_evento = isset($_GET['id_evento']) ? $_GET['id_evento'] : 17; // Valor padrão é 1
        $id_evento = intval($id_evento);
        
        $sql = "SELECT eventos.*, categoria_evento.nome_categoria_evento 
                FROM eventos 
                JOIN categoria_evento ON eventos.id_categoria = categoria_evento.id_categoria_evento 
                WHERE eventos.id_evento = $id_evento";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row event-card">';
                if ($row !== null && isset($row['img_evento']) && isset($row['id_evento']) && isset($row['curtidas'])) {
                    echo '<div class="col-md-4">';
                    echo '  <div class="image-container" style="position: relative; display: inline-block;">';
                    echo '    <img src="data:image/jpeg;base64,' . base64_encode($row['img_evento']) . '" alt="Imagem do Evento" class="img-fluid custom-image">';
                    echo '    <div class="like-icons-container" style="position: absolute; bottom: 5px; right: 5px; z-index: 1; display: flex; align-items: center;">';
                    echo '      <i class="far fa-heart event-like" style="font-size: 24px; color: red; cursor: pointer; margin-right: 5px;"></i>';
                    echo '      <i id="btnCurtir-' . $row['id_evento'] . '" class="material-icons like-icon" style="font-size: 24px; color: red; cursor: pointer; margin-right: 5px;" data-event-id="' . $row['id_evento'] . '">favorite</i>';
                    echo '      <span id="likeCount-' . $row['id_evento'] . '" class="like-count" style="font-size: 18px; color: red; margin: 0; padding: 0;">' . $row['curtidas'] . '</span>';
                    echo '      <span class="like-text" style="font-size: 18px; color: red; margin: 0; padding: 0;">' . ($row['curtidas'] !== 1 ? 'likes' : 'like') . '</span>';
                    echo '</div>';
                    echo '</div>';
                    // links
                    echo '<br>';
                    echo '<br>';
                    echo '<div class="share-icons-wrapper text-center">'; // Centraliza o texto e os ícones horizontalmente
                    echo '<h5 class="mb-3">Compartilhe com seus amigos</h5>';
                    echo '<div class="d-flex flex-row flex-wrap justify-content-center align-items-center">'; // Centraliza horizontalmente em telas menores e médias
                    echo '<a href="https://api.whatsapp.com/send?text=Confira%20este%20link%3A%20vamos%20para%20esse%20super%20evento%3F" class="mx-2">';
                    echo '  <img src="icons8-whatsapp.svg" alt="Compartilhar via WhatsApp" class="img-fluid col-12 col-md-auto" style="max-width: 62px; max-height: 62px;">'; // Os ícones ocupam apenas o espaço necessário em telas maiores
                    echo '</a>';

                    echo '<a href="https://www.facebook.com/sharer/sharer.php?u=www.exemplo.com" class="mx-2">';
                    echo '  <img src="icons8-facebook-144.svg" alt="Compartilhar via Facebook" class="img-fluid col-12 col-md-auto" style="max-width: 62px; max-height: 62px;">'; // Os ícones ocupam apenas o espaço necessário em telas maiores
                    echo '</a>';

                    echo '<a href="https://twitter.com/intent/tweet?url=www.exemplo.com" class="mx-2">';
                    echo '  <img src="icons8-twitter-144.svg" alt="Compartilhar via Twitter" class="img-fluid col-12 col-md-auto" style="max-width: 62px; max-height: 62px;">'; // Os ícones ocupam apenas o espaço necessário em telas maiores
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';

                echo '<div class="col-md-8">';
                echo '<h1 class="event-info">' . $row['titulo'] . '</h1>';
                echo '<p class="event-info">Categoria: ' . $row['nome_categoria_evento'] . '</p>';
                //echo '<p class="event-id">ID do Evento: ' . $row['id_evento'] . '</p>';
                echo '<p class="event-info">Local: ' . $row['local_evento'] . '</p>';
                $data_evento = date('d/m/Y', strtotime($row['data_evento']));
                echo '<p class="event-info">Data: ' . $data_evento . '</p>';
                echo '<p class="event-info">Descrição: ' . $row['descricao_evento'] . '</p>';
                echo '<p class="event-info">Preço: R$ ' . number_format($row['preco'], 2, ',', '.') . '</p>';
                echo '<p class="event-info">Link: <a href="' . $row['link_evento'] . '">' . $row['link_evento'] . '</a></p>';
                echo '<div id="map-' . $row['id_evento'] . '" style="height: 300px;"></div>';
                echo '<script>initMap(' . $row['latitude'] . ', ' . $row['longitude'] . ', "map-' . $row['id_evento'] . '");</script>';
                echo '<br>';
                //echo '<p class="event-info">Curtidas: ' . $row['curtidas'] . '</p>';
                echo '</div>';
                // Formulário comentário
                /*if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_autor']) && isset($_POST['conteudo'])) {
                    // Aqui você deve inserir o código para processar e armazenar os dados do formulário no banco de dados
                    // Por exemplo, inserir os dados no banco de dados usando uma consulta SQL
                
                    // Depois de armazenar os dados no banco de dados, redirecione o usuário para uma nova página para evitar o reenvio do formulário
                    echo '<script>window.location.href = "detalhesevento.php";</script>';
                    exit;
                }*/
                echo '<h5 class="mb-3 text-center">Deixe um comentário</h5>';
                echo '<form method="post" class="mt-3">';
                echo '<input type="hidden" name="id_evento" value="' . htmlspecialchars($row['id_evento']) . '">';
                echo '<div class="mb-3">';
                echo '<label for="nome_autor" class="form-label">Nome de Usuário:</label>';
                echo '<input type="text" class="form-control" id="nome_autor" name="nome_autor" required>';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label for="conteudo" class="form-label">Comentário:</label>';
                echo '<textarea class="form-control" id="conteudo" name="conteudo" required></textarea>';
                echo '</div>';
                echo '<button type="submit" class="btn btn-primary">Enviar Comentário</button>';
                echo '</form>';
                // Exibir os comentários relacionados a este evento
                $comentario_sql = "SELECT * FROM comentario WHERE id_evento = " . $row['id_evento'];
                $comentario_result = $conn->query($comentario_sql);
                echo '<div class="comentarios-container">';
                if ($comentario_result->num_rows > 0) {
                    echo '<h4 class="mt-4">Comentários</h4>';
                    while ($comentario_row = $comentario_result->fetch_assoc()) {
                        echo '<div class="card">';
                        echo '  <div class="card-header">';
                        echo '    ' . $comentario_row['nome_autor'];
                        echo '  </div>';
                        echo '  <div class="card-body">';
                        echo '    <p class="card-text">' . $comentario_row['conteudo'] . '</p>';
                        echo '  </div>';
                        echo '</div>';
                        echo '<br>';
                    }
                } else {
                    echo '<p class="mt-4">Sem comentários no momento.</p>';
                }
                echo '</div>';

                echo '</div>';
                echo '</div>';
            }
            
        } else {
            echo '<p>Nenhum evento encontrado.</p>';
        }

        $conn->close();
        ?>
    </div>
</body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>