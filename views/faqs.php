<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/models/faq.php';

try {
    $faqs = FAQ::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<?php if (count($faqs) > 0) : ?>
    <section class="m-3">
        <div class="accordion" id="accordionExample">
            <?php foreach ($faqs as $f) : ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $f['id_faq'] ?>" aria-expanded="true" aria-controls="collapse<?= $faq['id_faq'] ?>">
                            <?= $f['faq_pergunta'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $f['id_faq'] ?>" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?= $f['faq_resposta'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php else : ?>
    <section class="m-3">
        <div class="alert alert-info text-center" role="alert">
            Nenhuma faq cadastrada!
        </div>
    </section>
<?php endif; ?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>