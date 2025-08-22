<?php
    include 'conexao.php';
    include 'sessao.php';

    // se nao for gerente, proibi que acesse essa pagina
    if ($_SESSION['funcao'] !== 'gerente') {
        die("Acesso negado!");
    }

    // confere se o id nao existe ou é o id do proprio usuario
    $id = $_GET['id'] ?? null;
    if (!$id || $id == $_SESSION['idFunc']) {
        die("ID inválido ou tentativa de autoexclusão.");
    }

    $sql = "DELETE FROM funcionarios WHERE idFunc=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idFunc);

    if ($stmt->execute()) {
        echo "Funcionário excluído com sucesso! <a href='lista_funcionarios.php'>Voltar</a>";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
?>