<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- css bootstrap -->
    <link rel="stylesheet" href="/ondeacontece/css/bootstrap.css">
    <!-- js bootstrap -->
    <script src="/ondeacontece/js/bootstrap.bundle.js"></script>

    <link rel="stylesheet" href="/ondeacontece/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: var(--cor3);">
            <div class="container-fluid">
                <div class="col-5 col-lg-2">
                    <img src="/ondeacontece/img/ondeacontece (1).png" alt="" class="w-100">
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link  text-white active" aria-current="page" href="/ondeacontece/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="/ondeacontece/views/eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="/ondeacontece/views/promocoes.php">Promoções</a>
                        </li>
                        <?php if (!isset($_SESSION['admin'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link  text-white" href="/ondeacontece/views/admin/login.php">Login</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Perfil
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/ondeacontece/views/admin/painel.php">Painel</a></li>
                                    <li><a class="dropdown-item" href="/ondeacontece/controllers/logout_controller.php">Sair</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>