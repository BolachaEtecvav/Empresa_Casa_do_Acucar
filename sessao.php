<?php
// verifica se o usuário está logado antes de ter permissao para acessar as outras paginas
    session_start();
    if (!isset($_SESSION['idFunc'])) {
        header("Location: index.php");
        exit();
    }
?>