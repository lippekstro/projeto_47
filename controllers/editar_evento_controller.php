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

    $id = $_POST['id_evento'];
    $titulo = limparDados($_POST["tituloEvento"]);
    $latitude = limparDados($_POST["latitudeEvento"]);
    $longitude = limparDados($_POST["longitudeEvento"]);
    $dataEvento = limparDados($_POST["data_evento"]);
    $localEvento = limparDados($_POST["localEvento"]);
    $descricaoEvento = limparDados($_POST["descricao_evento"]);
    $precoEvento = $_POST["preco"];
    $linkEvento = $_POST["link_evento"];
    $categoriaEvento = limparDados($_POST["id_categoria"]);

    $evento = new Evento($id);
    $evento->titulo = $titulo;
    $evento->latitude = $latitude;
    $evento->longitude = $longitude;
    $evento->data_evento = $dataEvento;
    $evento->local_evento = $localEvento;
    $evento->descricao_evento = $descricaoEvento;
    $evento->preco = $precoEvento;
    $evento->link_evento = $linkEvento;
    $evento->id_categoria = $categoriaEvento;

    $evento->editar();

    setcookie('msg', "O Evento foi editado com sucesso!", time() + 3600, '/ondeacontece/');
    setcookie('tipo', 'sucesso', time() + 3600, '/ondeacontece/');
    header("Location: /ondeacontece/views/admin/lista_evento.php");
    exit();
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
