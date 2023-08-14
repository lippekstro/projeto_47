<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';

?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"> Painel de Administrador </h1>
            <p class="lead text-muted">Nesse painel admnistrativo você pode gerenciar todos os aspectos do sistema</p>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3 mb-3">
                    <div class="card shadow-sm">
                        <img class="card-img-top" style="height: 225px; width:100%; display:block" src="/projeto_47/img/dummy.png" data-holder-rendered="true">
                        <div class="card-body">
                            <h4>Categorias Eventos</h4>
                            <p class="card-text">Gerencie as categorias de Eventos.</p>
                        </div>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a href="/projeto_47/views/admin/lista_categoria.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Visualizar</button></a>
                            <a href="/projeto_47/views/admin/cadastro_categoria.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Adicionar</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-3">
                    <div class="card shadow-sm">
                        <img class="card-img-top" style="height: 225px; width:100%; display:block" src="/projeto_47/img/dummy.png" data-holder-rendered="true">
                        <div class="card-body">
                            <h4>Categorias Promoções</h4>
                            <p class="card-text">Gerencie as categorias de Promoções.</p>
                        </div>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a href="/projeto_47/views/admin/lista_categoria_promo.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Visualizar</button></a>
                            <a href="/projeto_47/views/admin/cadastro_categoria_promo.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Adicionar</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-3">
                    <div class="card shadow-sm">
                        <img class="card-img-top" style="height: 225px;width:100%; display:block" src="/projeto_47/img/dummy.png" data-holder-rendered="true">
                        <div class="card-body">
                            <h4>Eventos</h4>
                            <p class="card-text">Gerencie os Eventos.</p>
                        </div>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a href="/projeto_47/views/admin/lista_evento.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Visualizar</button></a>
                            <a href="/projeto_47/views/admin/cadastro_evento.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Adicionar</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-3">
                    <div class="card shadow-sm">
                        <img class="card-img-top" style="height: 225px;width:100%; display:block" src="/projeto_47/img/dummy.png" data-holder-rendered="true">
                        <div class="card-body">
                            <h4>Promoções</h4>
                            <p class="card-text">Gerencie as Promoções.</p>
                        </div>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a href="/projeto_47/views/listar_promocoes.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Visualizar</button></a>
                            <a href="/projeto_47/views/adicionar_promocoes.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Adicionar</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-3">
                    <div class="card shadow-sm">
                        <img class="card-img-top" style="height: 225px;width:100%; display:block" src="/projeto_47/img/dummy.png" data-holder-rendered="true">
                        <div class="card-body">
                            <h4>FAQs</h4>
                            <p class="card-text">Gerencie as FAQs.</p>
                        </div>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a href="/projeto_47/views/admin/listar_faqs.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Visualizar</button></a>
                            <a href="/projeto_47/views/admin/adicionar_faq.php"><button type="button" class="btn btn-sm btn-outline-secondary m-3">Adicionar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>