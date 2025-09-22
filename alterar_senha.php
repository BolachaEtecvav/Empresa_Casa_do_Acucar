<?php
    include 'conexao.php';
    include 'sessao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nova_senha = $_POST['nova_senha']; 

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/', $nova_senha)) {
            die("Senha inválida! Deve conter letras maiúsculas, minúsculas e números.");
        }

        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $idFunc = $_SESSION['idFunc']; 

        $sql = "UPDATE funcionarios SET senha=? WHERE idFunc=?"; 
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("si", $senha_hash, $idFunc); 

        if ($stmt->execute()) {
            echo "Senha atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar senha!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Senhas</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: "Poppins", sans-serif;
        }
        body { 
            background-color:rgba(255, 254, 186, 1);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw; 
        }

        h1{
            text-align: center;
            font-size: 50px;
        }

        .container {
            font-size: 20px;
            max-width: 500px; 
            margin: 0 auto;
        }

        label { 
            
            display: block; 
            margin-bottom: 5px; 
            font-weight: bold; 
        }

        input { 
            padding: 8px;
            width: 100%;
        }
        
        button { 
            padding: 10px 15px;
            background-color:rgba(255, 170, 121, 1);
            color: black; 
            font-size: 15px;
            border-radius: 10px; 
            cursor: pointer; 
        }

        a {
            color: black;
            text-decoration: none;
            font-size: 20px;
        }
        
        a:hover{
            color: rgba(250, 199, 255, 1);
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Alterar Senha</h1>
        <form method="post">
            Nova senha: <input type="password" name="nova_senha" required><br><br>
            <button type="submit">Alterar Senha</button><br>
            <br><a href='homepage.php'>Voltar HomePage</a>
        </form>
    </div>

</body>
</html>


