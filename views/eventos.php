<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php'; ?>

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
    }
</style>

<div class="cards-container">
    <div class="card left-card">
        <a href="/ondeacontece/views/agenda.php">
            <img src="/ondeacontece/img/agenda.png" alt="">
            <h3>Agenda</h3>
        </a>
    </div>

    <div class="card right-card">
        <a href="/ondeacontece/views/galeria.php">
            <img src="/ondeacontece/img/galeria.png" alt="">
            <h3>Galeria de fotos e Videos</h3>
        </a>
    </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>
