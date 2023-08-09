<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/evento.php';

$id_evento = $_GET['id_evento'];

try {
    $evento = new Evento($id_evento);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp9GsGyQ65nk3oa47waSygq2_3Znjvdsg&callback=initMap"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

<script>
   /*  // Função para mostrar os corações quando o botão "like" é clicado
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
    }); */
</script>

<section class="">
    <div class="row event-card m-3">
        <div class="col-4 m-3">
            <img src="data:image;base64,<?= base64_encode($evento->img_evento) ?>" alt="" class="w-100">
        </div>
        <div class="col">
            <h1 class="event-info"><?= $evento->titulo ?></h1>
            <p class="event-info">Categoria: </p>
            <p class="event-info">Local: <?= $evento->local_evento ?></p>
            <?php $data_evento = date('d/m/Y', strtotime($evento->data_evento)) ?>
            <p class="event-info">Data: <?= $data_evento ?></p>
            <p class="event-info">Descrição: <?= $evento->descricao_evento ?></p>
            <p class="event-info">Preço: R$ <?= number_format($evento->preco, 2, ',', '.') ?></p>
            <p class="event-info">Link: <a href="<?= $evento->link_evento ?>"><?= $evento->link_evento ?></a></p>
            <div id="map-<?= $evento->id_evento ?>" style="height: 300px;"></div>
        </div>
    </div>
</section>


<script src="/projeto_47/js/geraMapa.js"></script>
<script>
    initMap(<?= $evento->latitude ?>, <?= $evento->longitude ?>, "map-<?= $evento->id_evento ?>");
</script>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>