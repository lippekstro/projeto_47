<?php 
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';

?>

<!-- <div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Perfil do Usuário
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Seu Perfil</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="/projeto_47/controllers/logout_controller.php">Sair</a></li>
  </ul> 
</div>  -->
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
                    <img class="card-img-top" style="height: 225px; width:100%; display:block" src="" data-holder-rendered="true">
                    <div class="card-body">
                        <h4>Categorias</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="/views/admin/adicionar_promocao.php"><button type="button" class="btn btn-sm btn-outline-secondary">Visualizar</button></a>
                    <a href="/views/admin/adicionar_promocao.php"><button type="button" class="btn btn-sm btn-outline-secondary">Adicionar</button></a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col"> 
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" style="height: 225px;width:100%; display:block" src="" data-holder-rendered="true">
                    <div class="card-body">
                    <h4>Eventos</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="/views/admin/adicionar_promocao.php"><button type="button" class="btn btn-sm btn-outline-secondary">Visualizar</button></a>
                    <a href="/views/admin/adicionar_promocao.php"><button type="button" class="btn btn-sm btn-outline-secondary">Adicionar</button></a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col"> 
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" style="height: 225px;width:100%; display:block" src="" data-holder-rendered="true">
                    <div class="card-body">
                    <h4>Promoções</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="/views/admin/adicionar_promocao.php"><button type="button" class="btn btn-sm btn-outline-secondary">Visualizar</button></a>
                    <a href="/views/admin/adicionar_promocao.php"><button type="button" class="btn btn-sm btn-outline-secondary">Adicionar</button></a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col"> 
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" style="height: 225px;width:100%; display:block" src="" data-holder-rendered="true">
                    <div class="card-body">
                    <h4>FAQs</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="/views/admin/adicionar_faq.php"><button type="button" class="btn btn-sm btn-outline-secondary">Visualizar</button></a>
                    <a href="/views/admin/listar_faq.php"><button type="button" class="btn btn-sm btn-outline-secondary">Adicionar</button></a>
                    </div>
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