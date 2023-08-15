<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/faq.php';

try {
    $faqs = FAQ::listar();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal text-body-emphasis">FAQs</h1>
</div>

<?php if (count($faqs) > 0) : ?>
    <section class="col col-lg-6 p-3 m-auto">
        <div class="accordion" id="accordionExample">
            <?php foreach ($faqs as $f) : ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $f['id_faq'] ?>" aria-expanded="true" aria-controls="collapse<?= $f['id_faq'] ?>">
                            <?= $f['faq_pergunta'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $f['id_faq'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
            Nenhuma FAQ cadastrada!
        </div>
    </section>
<?php endif; ?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>