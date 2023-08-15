<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php';
?>

<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    <form action="/ondeacontece/controllers/cadastroadmin_controller.php" method="POST" style="width: 23rem;">
        <h2 class="fw-bold mb-5 text-center">Cadastre-se</h2>
        <div class="form-outline mb-4">
            <input type="text" id="form3Example1" name=nome class="form-control" />
            <label class="form-label" for="form3Example1">Nome/Username</label>
        </div>

        <div class="form-outline mb-4">
            <input type="email" id="form3Example3" name=email class="form-control" />
            <label class="form-label" for="form3Example3">Email</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="form3Example4" class="form-control" name="senha" />
            <label class="form-label" for="form3Example4">Senha</label>
        </div>

        <button type="reset" class="btn btn-info btn-lg btn-block">Limpar</button>
        <button type="submit" class="btn btn-info btn-lg btn-block">Cadastrar</button>
    </form>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>