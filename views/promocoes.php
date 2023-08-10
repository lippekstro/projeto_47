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
                    <button> <a href="#">Saiba mais</a></button>
                </div>
            </div>


            
            <div class="container">

                <div class="card_box">
                    <span></span>
                    <img class="card-img-top"
                        src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_189c1d9ae84%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_189c1d9ae84%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22105.5%22%20y%3D%2296.6%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                        alt="Imagem de capa do card">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero reiciendis, quia ullam sint modi
                        suscipit.</p>
                    <img src="https://cdn-icons-png.flaticon.com/128/4192/4192747.png" alt="" class="question-icon">
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