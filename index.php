<?php
session_start();

if (isset($_COOKIE['msg'])) {
    setcookie('msg', '', time() - 3600, '/ondeacontece/');
    setcookie('tipo', '', time() - 3600, '/ondeacontece/');
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/evento.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/promocao.php';
?>

<?php
$eventos = new Evento();
$promocoes = new Promocao();
$listaEventos = $eventos->carregaEventosPaginaInicio();
$listaDePromocoes = $promocoes->carregaPromocaoRecentePaginaInicio();
?>

<section>
    <?php if (isset($_COOKIE['msg'])) : ?>
        <?php if ($_COOKIE['tipo'] === 'sucesso') : ?>
            <div class="alert alert-success text-center m-3" role="alert">
                <?= $_COOKIE['msg'] ?>
            </div>
        <?php elseif ($_COOKIE['tipo'] === 'perigo') : ?>
            <div class="alert alert-danger text-center m-3" role="alert">
                <?= $_COOKIE['msg'] ?>
            </div>
        <?php else : ?>
            <div class="alert alert-info text-center m-3" role="alert">
                <?= $_COOKIE['msg'] ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</section>

<?php if (count($listaEventos) > 0) : ?>
<h1 style="color:black" class="text-center mt-3 mb-3">Próximos Eventos</h1>

<!--carrosel de eventos-->
<section class="d-flex justify-content-center">
    <div id="carouselExampleCaptions" class="carousel slide col-lg-6 col-sm-12">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php $i = 0;
            foreach ($listaEventos as $evento) : ?>
                <?php if ($i == 0) {
                    $ativar = ' active';
                } else {
                    $ativar = '';
                } ?>
                <a href="<?php echo $evento['link_evento'] ?>">
                    <div class="carousel-item<?php echo $ativar ?>">
                        <img src="data:image/jpg;charset=utf9;base64,<?php echo base64_encode($evento['img_evento']) ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50">
                            <h5 class="text-warning fs-2"><?php echo $evento['titulo'] ?></h5>
                            <p class="text-warning fs-3"><?php echo date('d/m/Y', strtotime($evento['data_evento'])) ?></p>
                        </div>
                    </div>
                </a>
            <?php $i++;
            endforeach ?>
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
</section>
<?php else : ?>
    <section class="m-3">
        <div class="alert alert-info text-center m-3" role="alert">
            Nenhum Evento Disponível
        </div>
    </section>
<?php endif; ?>

<?php if (count($listaDePromocoes) > 0) : ?>
    <h2 style="color:black" class="text-center mt-3">Promoções em Alta</h2>

    <!--cards de promoções-->
    <section id="cardsPromocoesRecentes" class="mt-4 mb-5 d-flex justify-content-center justify-content-lg-evenly flex-wrap">
        <?php foreach ($listaDePromocoes as $promocao) : ?>
            <div class="card mb-4" style="width: 18rem;">
                <img src="data:image/jpg;charset=utf9;base64,<?php echo base64_encode($promocao['img_promo']) ?>" alt="..." style="max-height:10.078rem">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $promocao['nome_promo'] ?></h5>
                    <p class="card-text"><?php echo $promocao['descricao_promo'] ?></p>
                    <p class="card-text">Cupom: <?php echo $promocao['cupom'] ?></p>
                    <div class="d-flex justify-content-center">
                        <a href="<?php echo $promocao['link_promo'] ?>" target="_blank" class="btn btn-primary">Acessar promoção</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </section>
<?php else : ?>
    <section class="m-3">
        <div class="alert alert-info text-center m-3" role="alert">
            Nenhuma Promoção Disponível
        </div>
    </section>
<?php endif; ?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>