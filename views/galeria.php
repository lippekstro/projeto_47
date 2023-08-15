<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php';
?>

<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
  }

  .menu {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
  }

  .gallery {
    width: 100%;
    max-width: 1200px;
    margin: 20px auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 10px;
  }

  .gallery img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    transition: transform 0.3s;
  }

  .gallery img:hover {
    transform: scale(1.05);
  }
</style>

<section class="gallery">
  <?php for ($i = 0; $i < 10; $i++) : ?>
    <img src="/ondeacontece/img/dummy.png" alt="Imagem">
  <?php endfor; ?>
</section>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>