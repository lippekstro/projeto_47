<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/admins.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/configs/utils.php';


session_start();

try {
    $nome= Utilidades::sanitizaString($_POST['nome']);
     if (Utilidades::validaEmail($_POST['email'])){
        $email = Utilidades::sanitizaEmail($_POST['email']);
     } else {
        setcookie ('msg', 'Email Inválido.', time() +3600, );
        setcookie('tipo', 'perigo',time () +3600);
        header("Location:/projeto_47/views/admin/cadastroadmin.php");
        exit(); 
    }

    $senha = $_POST['senha'];
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $admin = new Admin();
    $admin->criar($nome, $email,$senha);

    header("Location:/projeto_47/views/admin/login.php");
    exit();
} catch (PDOException $e) {
    $sqlStateCode =$e->getCode();
    $errorMessage = $e->getMessage();
    
    if ($sqlStateCode ==='2300' && strpos($errorMessage, 'Duplicate entry')!==false) {
        setcookie('msg', "O email já foi cadastrado.", time() +3600, );
        setcookie('tipo', 'info', time () +3600);
        header('Location:/projeto_47/views/admin/cadastroadmin.php'); }
        else { 
            echo "Erro no banco de dados:" . $errorMessage; }
        exit();
    }

    ?>
