<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/db/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ondeacontece/models/admins.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $email_admin = $_POST['email'];
    $senha_admin = $_POST['senha'];

    $admin = new Admin();
    $admin->logar($email_admin, $senha_admin);
}
