<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/categoria_promo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/promocao.php';

try {
    $categoria = CategoriaPromo::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&display=swap'); */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }


    .contenBody {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        align-content: center;
        justify-content: space-around;
        align-items: flex-start;
        margin: 3% 0%;
    }

    .contenBody h1 {
        margin: 5px 0px;
        color: black;
        border-bottom: 1.5px solid rgb(0, 0, 0);
        width: 60%;
        font-weight: bolder;
    }

    ::-webkit-scrollbar {
        width: 10px;
        height: 6px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }


    .conten {
        display: flex;
        margin: 0% 2%;
    }

    .card_box {
        width: 200px;
        height: 250px;
        border-radius: 20px;
        background: linear-gradient(170deg, rgba(206, 221, 226, 0.623) 0%, #ffffff 100%);
        position: relative;
        box-shadow: 17px 14px 33px -1px rgba(0, 0, 0, 0.55);
        cursor: pointer;
        transition: all .3s;
        margin: 3%;
    }

    .card_box:hover {
        transform: scale(0.9);
    }

    .card span {
        position: absolute;
        overflow: hidden;
        width: 150px;
        height: 150px;
        top: -10px;
        left: -10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card span::before {
        content: 'promoções';
        position: absolute;
        width: 150%;
        height: 40px;
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

    .card span::after {
        content: '';
        position: absolute;
        width: 10px;
        bottom: 0;
        left: 0;
        height: 10px;
        z-index: -1;
        box-shadow: 140px -140px #cc3f47;
        background-image: linear-gradient(45deg, #FF512F 0%, #F09819 51%, #FF512F 100%);
    }

    .card_box p {
        color: black;
        font-family: emoji;
        font-size: 9pt;
        text-align: left;
        margin-top: 4%;
        margin-left: 7%;
    }

    .card_box .question-icon {
        color: black;
        display: flex;
        font-family: emoji;
        font-size: 9pt;
        text-align: left;
        margin-top: 108%;
        width: 11%;
    }

    .info-box {
        display: none;
        position: absolute;
        top: 7%;
        left: 16%;
        background-color: rgba(0, 0, 0, 0.8);
        padding: 10px;
        width: 75%;
        height: 80%;
        z-index: 1;
        border-radius: 10px;

    }

    .info-box p {
        font-size: 7pt;
        color: #fff;
    }

    .card_box .question-icon:active+.info-box {
        display: block;
    }

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
    <?php foreach ($categoria as $c) : ?>
        <h1><?= $c['nome_categoria_promo'] ?></h1>
        <?php $conjunto = Promocao::listarPorCategoria($c['id_categoria_promo']); ?>
        <?php foreach ($conjunto as $p) : ?>
            <div class="contenCard">
                <div class="conten">
                    <div class="card" style="width: 14rem;">
                        <img src="data:image/jpg;charset=utf9;base64,<?= base64_encode($p['img_promo']) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $p['nome_promo'] ?></h5>
                            <p class="card-text"><?= $p['descricao_promo'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>