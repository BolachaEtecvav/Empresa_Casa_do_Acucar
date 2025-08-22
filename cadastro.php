<?php

    include "sessao.php";
    // verifica se o usuario é um gerente para deixar que entre nessa pagina
    if ($_SESSION['funcao'] != 'gerente') {
        die("Acesso negado!");
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
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

<?php

    include "conexao.php";
    // verifica se a senha possui todos os parametros pedidos
    function validarSenha($senha) {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/', $senha);
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // armazena todas as informacoes colocadas no formulario
        $nickname = $_POST['nickname'];
        $senha = $_POST['senha'];
        $nomeCompleto = $_POST['nomeCompleto'];
        $email = $_POST['email'];
        $funcao = $_POST['funcao'];
        // caso a senha nao possua todos os parametos ira aparecer que a senha está inválida e nao deixará que seja cadastrado
        if (!validarSenha($senha)) {
            die("Senha Inválida!");
        }

        // cria um hash para a senha
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        // prepara um statement juntamente com os seus placeholders (lemento usado em consultas SQL preparadas para indicar onde valores serão inseridos posteriormente)
        $stmt = $conn->prepare("INSERT INTO funcionarios (nickname, senha, nomeCompleto, email, funcao) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nickname, $senha, $nomeCompleto, $email, $funcao); // indica que todos os campos sao strings e associa as variaveis aos placeholders

        // executa o statement (query preparada)
        if ($stmt->execute()) {
            echo "Funcionário cadastrado com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }
    }
?>