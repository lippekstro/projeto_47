<?php 

session_start();

// Destruir a sessão (apagar todas as variáveis de sessão)
session_destroy();

// Redirecionar para a página principal (home)
header('Location: /projeto_47/index.php');
exit();
?>