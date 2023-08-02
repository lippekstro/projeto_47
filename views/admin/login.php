<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/cabecalho.php';
?>
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
<?php if (isset ($_GET['erro'])):?>Email/Senha Incorretos <?php endif;?>
       
<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    <form action="/angelaphp/biblioteca/controllers/login_controller.php" method="POST" style="width: 23rem;">
    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
    <div class="form-outline mb-4">
    <input type="email" id="form2Example18" class="form-control form-control-lg" name="email" required>
    <label class="form-label" for="form2Example18">Email:</label>
    </div>
    <div class="form-outline mb-4">
    <input type="password" id="form2Example28" class="form-control form-control-lg" name="senha" />
    <label class="form-label" for="form2Example28">Senha</label>
    </div>
    <div class="pt-1 mb-4">
    <button type="submit" class="btn btn-info btn-lg btn-block" >Entrar</button>
    </div>

    <p>Novo por aqui? <a href="/projeto_47/views/admin/cadastroadmin.php" class="link-info">Cadastre-se</a></p>
    </form>
</div>
      </div>
    </div>
  </div>
</section>

<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/templates/rodape.php';
?>
