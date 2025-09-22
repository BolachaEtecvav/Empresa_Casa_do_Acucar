<?php
    include "sessao.php";
    if ($_SESSION['funcao'] != 'gerente') {
        die("Acesso negado!");
    }

    include "conexao.php";

    function validarSenha($senha) {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/', $senha);
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nickname = $_POST['nickname'];
        $senha = $_POST['senha'];
        $nomeCompleto = $_POST['nomeCompleto'];
        $email = $_POST['email'];
        $funcao = $_POST['funcao'];

        if (!validarSenha($senha)) {
            die("Senha Inválida!");
        }

        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO funcionarios (nickname, senha, nomeCompleto, email, funcao) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nickname, $senha, $nomeCompleto, $email, $funcao);

        if ($stmt->execute()) {
            echo "Funcionário cadastrado com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: "Poppins", sans-serif;
        }
        
        body { 
            background-color: #ffd9a0ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw; 
        }

        h1{
            text-align: center;
            font-size: 40px;
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

        p {
            font-size: 20px;
            font-style: italic;
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
        <h1>Cadastro Funcionários</h1>
        <form method="POST">
            <input type="text" name="nickname" placeholder="nickname" required>
            <input type="password" name="senha" placeholder="senha" required>
            <input type="text" name="nomeCompleto" placeholder="nomeCompleto" required>
            <input type="email" name="email" placeholder="email" required>
            <select name="funcao">
                <option value="gerente">Gerente</option>
                <option value="funcionario">Funcionário</option>
                <option value="repositor">Repositor</option>
            </select><br><br>
            <button type="submit">Cadastrar</button>
            <p>A senha deve ter entre 8 e 16 caracteres, com letras maiúsculas, minúsculas e números.</p>
            <a href='homepage.php'>Voltar HomePage</a>
        </form>
    </div>
</body>
</html>


