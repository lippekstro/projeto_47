<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/ondeacontece/models/evento.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/ondeacontece/configs/utils.php";

if (!isset($_SESSION['admin'])) {
    setcookie('msg', 'Você não tem permissão para acessar este conteúdo', time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'perigo', time() + 3600, '/ondeacontece/');
    header('Location: /ondeacontece/index.php');
    exit();
}

try {
    
    function limparDados($dados) {
        return htmlspecialchars(trim($dados));
    }

    $titulo = limparDados($_POST["tituloEvento"]);
    $latitude = limparDados($_POST["latitudeEvento"]);
    $longitude = limparDados($_POST["longitudeEvento"]);
    $dataEvento = limparDados($_POST["dataEvento"]);
    $localEvento = limparDados($_POST["localEvento"]);
    $descricaoEvento = limparDados($_POST["descricaoEvento"]);
    $precoEvento = isset($_POST["precoEvento"]) ? floatval($_POST["precoEvento"]) : null;
    $linkEvento = isset($_POST["linkEvento"]) ? limparDados($_POST["linkEvento"]) : null;
    $categoriaEvento = limparDados($_POST["categoriaEvento"]);
    if (!empty($_FILES['imagemEvento']['tmp_name'])) {
        $imagem = file_get_contents($_FILES['imagemEvento']['tmp_name']);
    }

    $evento = new Evento();
    $evento->titulo = $titulo;
    $evento->latitude = $latitude;
    $evento->longitude = $longitude;
    $evento->data_evento = $dataEvento;
    $evento->local_evento = $localEvento;
    $evento->descricao_evento = $descricaoEvento;
    $evento->preco = $precoEvento;
    $evento->link_evento = $linkEvento;
    $evento->id_categoria = $categoriaEvento;
    $evento->img_evento = $imagem;

    $evento->criar();

    setcookie('msg', "O Evento foi adicionado com sucesso!", time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'sucesso', time() + 3600, '/ondeacontece/');
    header("Location: /ondeacontece/views/admin/lista_evento.php");
    exit();
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
