<?php 

session_start();

session_unset();
// Destruir a sessão (apagar todas as variáveis de sessão)
session_destroy();

// Redirecionar para a página principal (home)
header('Location: /ondeacontece/index.php');
exit();
?>