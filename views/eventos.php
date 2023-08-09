<?php 
require_once'seguranca.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <title>Document</title>
    <style>
.cards-container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin: 20px auto;
  max-width: 1200px;
}
.left-card {
  flex: 2;
  margin-right: 10px;
}
.right-cards {
  flex: 1;
  display: flex;
  flex-direction: column;
}
.card {
  background-color: #f5f5f5;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin: 10px;
  text-align: center;
  flex: 1;
}
.card img {
  max-width: 100%;
  height: auto;
  border-radius: 5px;
}
.card h3 {
  margin-top: 10px;
  font-size: 1.2rem;
}
.card p {
  margin-top: 10px;
  font-size: 1rem;
}
.btn-acesse-aqui {
  display: inline-block;
  margin-top: 15px;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  text-decoration: none;
  transition: background-color 0.3s ease;
}
.btn-acesse-aqui:hover {
  background-color: #0056b3;
}
/* Responsividade */
@media (max-width: 768px) {
  .cards-container {
    flex-direction: column;
    align-items: stretch;
  }
  .card {
    width: 100%;
  }
}
</style>
</head>
<body> 
    <main>        <!-- Ícones flutuantes -->
<div class="floating-icons">
  <a href="https://www.facebook.com/seu_perfil" target="_blank" class="icon facebook"></a>
  <a href="https://www.instagram.com" target="_blank" class="icon instagram"></a>
  <a href="https://api.whatsapp.com/send?phone=seu_numero" target="_blank" class="icon whatsapp"></a>
</div>
<div class="cards-container">
  <div class="card left-card">
    <a href="agenda.php" target="_blank">
      <img src="img/17-imagens-de-destaque_guia-de-planejamento-de-eventos.png" alt="Imagem do Card 1">
      <h3>Agenda 2023</h3>
    </a>
    <p></p>
    <a class="btn-acesse-aqui" href="agenda.php" target="_blank">
      Acesse aqui
    </a>
  </div>
  <div class="card right-card">
    <a href="img/52-imagens-de-destaque_local-para-eventos.png" target="_blank">
      <img src="img/52-imagens-de-destaque_local-para-eventos.png" alt="Imagem do Card 1">
      <h3>localizacao</h3>
    </a>
    <p></p>
    <a class="btn-acesse-aqui" href="kkk.php" target="_blank">
      Acesse aqui
    </a>
  </div>
  <div class="card right-card">
    <a href="" target="_blank">
      <img src="img/23-imagens-de-destaque_anuncio-para-eventos.png" alt="Imagem do Card 1">
      <h3>Galeria de fotos e Videos</h3>
    </a>
    <p></p>
    <a class="btn-acesse-aqui" href="galeria.php" target="_blank">
      Acesse aqui
    </a>
  </div>
</div>
 </main>
    <footer>  
        <div class="container">
            <footer class="py-3 my-4">
              <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
              </ul>
              <p class="text-center text-muted">© 2022 Company, Inc</p>
            </footer>
          </div>
    </footer>   
</body>
</html>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';?>