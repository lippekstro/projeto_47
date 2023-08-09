<?php
// Página inicial (index.php)

// Verifica se foi feita uma seleção anterior
$selectedPage = $_COOKIE['selected_page'] ?? '';



// Verifica se uma página foi selecionada anteriormente
if ($selectedPage !== '') {
    // Filtra a lista de páginas disponíveis com base na seleção
    $filteredPages = array_intersect_key($pages, array_flip([$selectedPage]));
} else {
   
}

// Define o cookie para lembrar a seleção
if (isset($_GET['page'])) {
    $selectedPage = $_GET['page'];
    setcookie('selected_page', $selectedPage, time() + 3600, '/'); // O cookie expira em 1 hora
    header('Location: index.php'); // Redireciona para evitar o reenvio do formulário
    exit;
}
?>