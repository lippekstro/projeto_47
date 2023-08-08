<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/evento.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/promocao.php';
?>

<?php 
$eventos = new Evento();
$promocoes = new Promocao();
$listaEventos = $eventos->carregaEventosPaginaInicio();
$listaDePromocoes = $promocoes->carregaPromocaoRecentePaginaInicio();
?>


<h1 style="color:black" class="text-center mt-3 mb-3">Titulo aqui</h1>

<!--carrosel de eventos-->
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <?php $i = 0;foreach ($listaEventos as $evento) :?>
            <?php if($i == 0){$ativar = ' active';}else{$ativar = '';} ?>
        <a href="<?php echo $evento['link_evento'] ?>">
            <div class="carousel-item<?php echo $ativar ?>">            
                <img src="data:image/jpg;charset=utf9;base64,<?php echo base64_encode($evento['img_evento']) ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-warning fs-2"><?php echo $evento['nome_evento'] ?></h5>
                    <p class="text-warning fs-3">Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        </a>
        <?php $i++;endforeach ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<h2 style="color:black" class="text-center mt-3">Titulo aqui</h2>

<!--cards de promoções-->
<section id="cardsPromocoesRecentes" class="mt-4 mb-5 d-flex justify-content-around flex-wrap">
    <?php foreach ($listaDePromocoes as $promocao) : ?>
        <div class="card mb-4" style="width: 18rem;">
            <img src="data:image/jpg;charset=utf9;base64,<?php echo base64_encode($promocao['img_promo']) ?>" alt="..." style="max-height:11.944rem">
            <div class="card-body">
                <h5 class="card-title"><?php echo $promocao['nome_promo'] ?></h5>
                <p class="card-text"><?php echo $promocao['descricao_promo'] ?></p>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo $promocao['link_promo'] ?>" class="btn btn-primary">Acessar promoção</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</section>

<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>
