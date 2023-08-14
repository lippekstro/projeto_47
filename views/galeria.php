<?php 

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeria de Fotos</title>
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
</head>
<body>
  
   
  </div>
  <div class="gallery">
    <img src="AAAA.jpg" alt="Imagem 1">
    <img src="AAAA.jpg" alt="Imagem 2">
    <img src="AAAA.jpg" alt="Imagem 3">
    <img src="AAAA.jpg" alt="Imagem 4">
    <img src="AAAA.jpg" alt="Imagem 1">
    <img src="AAAA.jpg" alt="Imagem 2">
    <img src="AAAA.jpg" alt="Imagem 3">
    <img src="AAAA.jpg" alt="Imagem 4">
    <img src="AAAA.jpg" alt="Imagem 1">
    <img src="AAAA.jpg" alt="Imagem 2">
    <img src="AAAA.jpg" alt="Imagem 3">
    <img src="AAAA.jpg" alt="Imagem 4">
    <img src="AAAA.jpg" alt="Imagem 1">
    <img src="AAAA.jpg" alt="Imagem 2">
    <img src="AAAA.jpg" alt="Imagem 3">
    <img src="AAAA.jpg" alt="Imagem 4">
    <img src="AAAA.jpg" alt="Imagem 1">
    <img src="AAAA.jpg" alt="Imagem 2">
    <img src="AAAA.jpg" alt="Imagem 3">
    <img src="AAAA.jpg" alt="Imagem 3">
  </div>
</body>
</html>
