<!DOCTYPE html>
<html lang="en">

    .question-icon {
        cursor: pointer;
        position: absolute;
        top: 5px;
        right: 5px;
        font-size: 20px;
        color: #333;
    }

    .info-box {
        display: none;

    }

    /* CARDS */
    .contenCard {
        display: flex;
        width: 75%;
        flex-direction: row;
        flex-wrap: nowrap;
        border-radius: 10px;
        margin: 3% 0%;
        justify-content: space-around;
        padding: 15pt;
        border-radius: 10px;
    }



    .card_box button {
        display: flex;
        margin-top: -5%;
        width: 68%;
        height: 12%;
        margin-left: 12%;
        font-size: 5pt;
        --hover-shadows: 16px 16px 33px #121212, -16px -16px 33px #303030;
        --accent: fuchsia;
        font-weight: bold;
        letter-spacing: 0.1em;
        border: none;
        border-radius: 1.1em;
        background-color: #000000;
        color: white;
        padding: 1em 2em;
        transition: box-shadow ease-in-out 0.3s, background-color ease-in-out 0.1s, letter-spacing ease-in-out 0.1s, transform ease-in-out 0.1s;
        justify-content: center;
    }

    .card_box button:active {
        background-color: rgb(94, 88, 88);
        transform: scale(1.08);
        border: 2px solid rgb(0, 0, 0);
        box-shadow: 0px 0px 7px 0px rgb(175 107 5);
        transition: ease-in-out 0.3s,
    }

    .card_box a {
        color: white;
        font-size: 9pt;
        text-decoration: none;
        font-family: serif;
    }


    @media (max-width: 768px) {

        .contenBody {
            margin: 3% 5%;
        }

        .contenBody h1 {
            width: 100%;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        .conten {
            margin: 5% -3% 0% 15%;
            flex-direction: column;
            align-items: center;
        }


        .card_box {


            margin: 3% auto;
            height: 35vh;

        }

        .card_box:active {
            transform: none;
        }

        .card_body span {
            width: 128px;
            height: 116px;
            top: 0px;
            left: -15px;
        }


        .card-body span::before {
            font-size: 9pt;
            content: 'promoções';
            position: absolute;
            width: 149%;
            height: 34px;
            background-image: linear-gradient(45deg, #ff6547 0%, #ffb144 51%, #ff7053 100%);
            transform: rotate(-45deg) translateY(-20px);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.23);
        }

        .card-body span::after {
            content: '';
            position: absolute;
            width: 20px;
            bottom: 0;
            left: 0;
            height: 14px;
            z-index: -1;
            box-shadow: 140px -140px #cc3f47;
            background-image: linear-gradient(45deg, #FF512F 0%, #F09819 51%, #FF512F 100%);
        }

        .card_box p {
            font-size: 8pt;
            margin-top: 3%;
            margin-left: 5%;
        }

        .card_box a {
            color: white;
            font-size: 11pt;
            text-decoration: none;
            font-family: serif;
        }

        .card_box .question-icon {
            margin-top: 108%;
            width: 15%;
        }

        .info-box {
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            height: 70%;
        }

        .info-box p {
            font-size: 6pt;
        }

        .card_box button {
            margin-top: 39px;
            width: 68%;
            font-size: 4pt;
            padding: 0.5em 1em;
            align-items: center;
            border-radius: 10px;
        }

        .question-icon {
            margin-top: 3%;
        }

        .contenCard {
            width: 100%;
            margin: 0% 0% 10% 0%;
            padding: 10pt;
            display: flex;
            flex-wrap: nowrap;
            flex-direction: row;
            margin-left: 1%;
            border-radius: 5%;
            background-color: transparent;

        }

    }
</style>


<div class="contenBody">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projeto_47";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql_categorias = "SELECT * FROM categoria_evento";
    $result_categorias = $conn->query($sql_categorias);

    if ($result_categorias->num_rows > 0) {
        while ($row_categoria = $result_categorias->fetch_assoc()) {
            $categoria_id = $row_categoria["id_categoria_evento"];
            $categoria_nome = $row_categoria["nome_categoria_evento"];

            echo '<h1>' . $categoria_nome . '</h1>';
            echo '<div class="contenCard">';

            $sql_eventos = "SELECT * FROM eventos WHERE id_categoria = $categoria_id";
            $result_eventos = $conn->query($sql_eventos);

            if ($result_eventos->num_rows > 0) {
                while ($row_evento = $result_eventos->fetch_assoc()) {
                    echo '<div class="conten">';
                    echo '<div class="card" style="width: 14rem;">';
                    echo '<img src="/projeto_47/img/restaurante-sal.jpg" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row_evento['titulo'] . '</h5>';
                    echo '<p class="card-text">' . $row_evento['descricao_evento'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }

            echo '</div>';
        }
    }

    $conn->close();
    ?>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>