<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<link rel="stylesheet" href="../css/promoções.css">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/promoções.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <!-- Certifique-se de ter o caminho correto para o seu arquivo CSS -->
</head>

<body>
    <div class="containerBody">
        <h1>Restaurantes</h1>

        <div class="containerCard">

            <div class="container">
                <div class="card" style="width: 18rem;">
                    <span></span>
                    <img src="/projeto_47/img/restaurante-sal.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="card" style="width: 18rem;">
                    <span></span>
                    <img src="/projeto_47/img/restaurante-sal.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
            </div>

        </div>

        <h1>Shows</h1>

        <div class="containerCard">

            <div class="container">

                <div class="card" style="width: 18rem;">
                    <span></span>
                    <img src="/projeto_47/img/restaurante-sal.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="card" style="width: 18rem;">
                    <span></span>
                    <img src="/projeto_47/img/restaurante-sal.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>



            </div>
        </div>

        <h1>Eventos sociais</h1>

        <div class="containerCard">

            <div class="container">
                <div class="card" style="width: 18rem;">
                    <span></span>
                    <img src="/projeto_47/img/restaurante-sal.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>


            </div>

            <div class="container">

                <div class="card" style="width: 18rem;">
                    <span></span>
                    <img src="/projeto_47/img/restaurante-sal.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>



            </div>
        </div>



    </div>


    <script>
        const questionIcon = document.querySelector('.question-icon');
        const infoBox = document.querySelector('.info-box');

        questionIcon.addEventListener('click', () => {
            infoBox.style.display = infoBox.style.display === 'block' ? 'none' : 'block';
        });
    </script>
</body>

</html>



<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>