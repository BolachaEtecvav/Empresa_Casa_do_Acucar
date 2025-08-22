<?php
    session_start();
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nickname = $_POST['nickname'];
        $senha = $_POST['senha'];

        // consulta
        $sql = "SELECT * FROM funcionarios WHERE nickname=?"; // ? -> placeholder (texto temporario)
        // Declaração preparada - statement
        $stmt = $conn->prepare($sql); // prepara um statement
        $stmt->bind_param("s", $nickname); // associa os valores as placeholders e o "s" especifica que é tipo string
        $stmt->execute(); // executa a consulta preparada com os valores colocados
        $result = $stmt->get_result(); // traz o resultado dessa consulta preparada
        
    if ($result->num_rows === 1) { //m verifica se há aprenas um nickname e nao outros iguais
        $nickname = $result->fetch_assoc();
            if (password_verify($senha, $nickname['senha'])) { // compara a senha digitada com o hash criado
               // armazena os dados e direciona o usuario para a homepage.php
                $_SESSION['idFunc'] = $nickname['idFunc']; 
                $_SESSION['funcao'] = $nickname['funcao'];
                $_SESSION['nickname'] = $nickname['nickname'];
                header("Location: homepage.php");
                exit(); // encerra a execução
            } 
        } 
        
        echo "Login e Senha Inválidos!";
    }
?>
