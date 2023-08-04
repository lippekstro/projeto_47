<?php
session_start();

if (isset($_COOKIE['msg'])) {
    setcookie('msg', '', time() - 3600, '/projeto_47/');
    setcookie('tipo', '', time() - 3600, '/projeto_47/');
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';

?>

<section>
    <?php if (isset($_COOKIE['msg'])) : ?>
        <?php if ($_COOKIE['tipo'] === 'sucesso') : ?>
            <div class="alert alert-success text-center m-3" role="alert">
                <?= $_COOKIE['msg'] ?>
            </div>
        <?php elseif ($_COOKIE['tipo'] === 'perigo') : ?>
            <div class="alert alert-danger text-center m-3" role="alert">
                <?= $_COOKIE['msg'] ?>
            </div>
        <?php else : ?>
            <div class="alert alert-info text-center m-3" role="alert">
                <?= $_COOKIE['msg'] ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>