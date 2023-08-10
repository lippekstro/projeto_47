<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>promoções</title>
    <link rel="stylesheet" href="/projeto_47/css/promocoes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Link Swiper's CSS -->
    <!--      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
 -->
    <link rel="stylesheet" href="/projeto_47/js/promocoes.js">
    <script src="/js/promocoes.js" defer></script>
</head>

<body>
    <div class="conteiner-grade">
        <h1 class="categoria-promo">Restaurantes</h1>
        <hr>
    </div>
    <div class="carousel-container">
        <div class="carousel">
            <div class="card">
                <div class="card_box">
                    <span></span>
                    <div class="question-icon">
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>
                    <div class="card-img">
                        <img src="\projeto_47\img\restaurant-interior.jpg" alt="">
                    </div>
                    <div class="card-info">
                        <p class="text-title"> SAL E BRASA</p>
                        <p class="text-body">Promoção para Anivessariantes</p>
                    </div>
                    <div class="info-box">
                        <p>• Destaque do mês: Prato exclusivo a preço especial</p>
                        <p>• Família reunida: Refeições infantis ao preço de criança, toda quarta-feira.</p>
                        <p>• Noite romântica: Jantar para dois com entrada, prato principal e sobremesa por preço especial.</p>
                    </div>
                    <!-- <a href="#"><button class="button">SAIBA MAIS</button></a> -->
                </div>
            </div>
            <div class="card">
                <div class="card_box">
                    <span></span>
                    <div class="question-icon">
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>
                    <div class="card-img">
                    </div>
                    <div class="card-info">
                        <p class="text-title"> SAL E BRASA</p>
                        <p class="text-body">Promoção para Anivessariantes</p>
                    </div>
                    <div class="info-box">
                        <p>• Destaque do mês: Prato exclusivo a preço especial</p>
                        <p>• Família reunida: Refeições infantis ao preço de criança, toda quarta-feira.</p>
                        <p>• Noite romântica: Jantar para dois com entrada, prato principal e sobremesa por preço especial.</p>
                    </div>
                    <!-- <a href="#"><button class="button">SAIBA MAIS</button></a> -->
                </div>
            </div>
            <div class="card">
                <div class="card_box">
                    <span></span>
                    <div class="question-icon">
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>
                    <div class="card-img">
                    </div>
                    <div class="card-info">
                        <p class="text-title"> SAL E BRASA</p>
                        <p class="text-body">Promoção para Anivessariantes</p>
                    </div>
                    <div class="info-box">
                        <p>• Destaque do mês: Prato exclusivo a preço especial</p>
                        <p>• Família reunida: Refeições infantis ao preço de criança, toda quarta-feira.</p>
                        <p>• Noite romântica: Jantar para dois com entrada, prato principal e sobremesa por preço especial.</p>
                    </div>
                    <!-- <a href="#"><button class="button">SAIBA MAIS</button></a> -->
                </div>
            </div>
    
        </div>
        <button class="prev-btn">&lt;</button>
        <button class="next-btn">&gt;</button>
    </div>

    <!--  <div class="container-card">
    </div> -->




    <script>
        const questionIcon = document.querySelector('.question-icon');
        const infoBox = document.querySelector('.info-box');

        questionIcon.addEventListener('click', () => {
            infoBox.style.display = infoBox.style.display === 'block' ? 'none' : 'block';
        });

        const carousel = document.querySelector('.carousel');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const cardWidth = document.querySelector('.card').clientWidth;

        let position = 0;

        nextBtn.addEventListener('click', () => {
            position -= cardWidth;
            if (position < -cardWidth * (carousel.children.length - 1)) {
                position = 0;
            }
            carousel.style.transform = `translateX(${position}px)`;
        });

        prevBtn.addEventListener('click', () => {
            position += cardWidth;
            if (position > 0) {
                position = -cardWidth * (carousel.children.length - 1);
            }
            carousel.style.transform = `translateX(${position}px)`;
        });
    </script>

</body>

</html>