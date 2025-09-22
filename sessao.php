<?php
// verifica se o usuário está logado antes de ter permissao para acessar as outras paginas
    session_start();
    if (!isset($_SESSION['idFunc']) ) {
        header("Location: index.php");
        exit();
    }

    $funcoes_permitidas = ['gerente', 'funcionario', 'repositor'];

if (!in_array(strtolower($_SESSION['funcao']), $funcoes_permitidas)) {
    echo "Função de usuário inválida.";
    session_destroy();
    exit();
}
?>
