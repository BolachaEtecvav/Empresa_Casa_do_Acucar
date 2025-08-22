<?php
    include 'conexao.php';
    include 'sessao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nova_senha = $_POST['nova_senha']; // troca de senha

        // verifica se a senha está de acrodo com os parametros pedidos
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/', $nova_senha)) {
            die("Senha inválida! Deve conter letras maiúsculas, minúsculas e números.");
        }

        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT); // cria um novo hash para essa senha
        $idFunc = $_SESSION['idFunc']; // busca pelo usuario dessa senha e atualiza apenas no campo desse usuario, garantindo que nao mude a senha de outro usuario.

        $sql = "UPDATE funcionarios SET senha=? WHERE idFunc=?"; // altera a senha no banco de dados
        $stmt = $conn->prepare($sql); // prepara a query (é uma solicitação enviada a um banco de dados para realizar operações com os dados armazenados)
        $stmt->bind_param("si", $senha_hash, $idFunc); // s - 'string' e i - 'integer' (para o idFunc)

        // executa o statement (query preparada)
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
        body { 
            background-image: url("img/funco.jpg");
            background-position: center center;
            background-size: cover;
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
            background:rgb(19, 10, 100);
            color: white; 
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
            color: blue;
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
