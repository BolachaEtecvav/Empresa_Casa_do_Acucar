<?php
    session_start();
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nickname = $_POST['nickname'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM funcionarios WHERE nickname=?";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $nickname); 
        $stmt->execute(); 
        $result = $stmt->get_result(); 
        
    if ($result->num_rows === 1) { 
        $nickname = $result->fetch_assoc();
            if (password_verify($senha, $nickname['senha'])) { 
                $_SESSION['idFunc'] = $nickname['idFunc']; 
                $_SESSION['funcao'] = $nickname['funcao'];
                $_SESSION['nickname'] = $nickname['nickname'];
                header("Location: homepage.php");
                exit(); 
            } 
        } 
        
        echo "Login ou Senha Inválidos!";
    }
?>
