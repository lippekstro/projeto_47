<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';

?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"> Painel de Administrador </h1>
            <p class="lead text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" style="height: 225px; width:100%; display:block" src="/projeto_47/img/dummy.png" data-holder-rendered="true">
                        <div class="card-body">
                            <h4>Categorias</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a href="#"><button type="button" class="btn btn-sm btn-outline-secondary m-1">Visualizar</button></a>
                            <a href="#"><button type="button" class="btn btn-sm btn-outline-secondary m-1">Adicionar</button></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" style="height: 225px;width:100%; display:block" src="/projeto_47/img/dummy.png" data-holder-rendered="true">
                        <div class="card-body">
                            <h4>Eventos</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        </div>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a href="/projeto_47/views/admin/lista_evento.php"><button type="button" class="btn btn-sm btn-outline-secondary m-1">Visualizar</button></a>
                            <a href="/projeto_47/views/admin/cadastro_evento.php"><button type="button" class="btn btn-sm btn-outline-secondary m-1">Adicionar</button></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" style="height: 225px;width:100%; display:block" src="/projeto_47/img/dummy.png" data-holder-rendered="true">
                        <div class="card-body">
                            <h4>Promoções</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a href="#"><button type="button" class="btn btn-sm btn-outline-secondary m-1">Visualizar</button></a>
                            <a href="#"><button type="button" class="btn btn-sm btn-outline-secondary m-1">Adicionar</button></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" style="height: 225px;width:100%; display:block" src="/projeto_47/img/dummy.png" data-holder-rendered="true">
                        <div class="card-body">
                            <h4>FAQs</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        </div>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a href="/projeto_47/views/admin/listar_faqs.php"><button type="button" class="btn btn-sm btn-outline-secondary m-1">Visualizar</button></a>
                            <a href="/projeto_47/views/admin/adicionar_faq.php"><button type="button" class="btn btn-sm btn-outline-secondary m-1">Adicionar</button></a>
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