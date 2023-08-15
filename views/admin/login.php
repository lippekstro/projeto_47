<?php

if (isset($_COOKIE['msg'])) {
  setcookie('msg', '', time() - 3600, '/ondeacontece/');
  setcookie('tipo', '', time() - 3600, '/ondeacontece/');
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/cabecalho.php';

?>

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

<section>
  <div class="container-fluid">
    <div class="row">
      <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
        <form action="/ondeacontece/controllers/login_controller.php" method="POST" style="width: 23rem;">
          <h3 class="fw-bold mb-5 text-center" style="letter-spacing: 1px;">Log in</h3>
          <div class="form-outline mb-4">
            <input type="email" id="form2Example18" class="form-control form-control-lg" name="email" required>
            <label class="form-label" for="form2Example18">Email:</label>
          </div>
          <div class="form-outline mb-4">
            <input type="password" id="form2Example28" class="form-control form-control-lg" name="senha" />
            <label class="form-label" for="form2Example28">Senha</label>
          </div>
          <div class="pt-1 mb-4">
            <button type="submit" class="btn btn-info btn-lg btn-block">Entrar</button>
          </div>

          <p>Novo por aqui? <a href="/ondeacontece/views/admin/cadastroadmin.php" class="link-info">Cadastre-se</a></p>
        </form>
      </div>
    </div>
  </div>
</section>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/templates/rodape.php';
?>