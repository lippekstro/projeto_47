<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- css bootstrap -->
    <link rel="stylesheet" href="/projeto_47/css/bootstrap.css">
    <!-- js bootstrap -->
    <script src="/projeto_47/js/bootstrap.bundle.js"></script>

    <link rel="stylesheet" href="/projeto_47/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: var(--cor3);">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link  text-white active" aria-current="page" href="/projeto_47/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="/projeto_47/views/eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="/projeto_47/views/promocoes.php">Promoções</a>
                        </li>
                        <?php if (!isset ($_SESSION['admin'])): ?>
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="/projeto_47/views/admin/login.php">Login</a>
                        </li>
                       <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Perfil
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/projeto_47/views/admin/painel.php">Painel</a></li>
                                <li><a class="dropdown-item" href="/projeto_47/controllers/logout_controller.php">Sair</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>