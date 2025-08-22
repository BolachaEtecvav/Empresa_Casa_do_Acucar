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
    <title>Cadastro Produtos</title>
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
            font-size: 60px;
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
    </style>
</head>
<body>
    <div class="container">
        <form method="POST">
            <input type="text" name="nomeProduto" placeholder="nomeProduto" required>
            <input type="number" name="quantidade" placeholder="quantidade" required>
            <input type="text" name="preco" placeholder="preco" required>
            <button type="submit">Cadastrar</button>
            <a href='homepage.php'>Voltar HomePage</a>
        </form>
    </div>
</body>
</html>

<?php

    include "conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // armazena todas as informacoes colocadas no formulario
        $nomeProduto = $_POST['nomeProduto'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];

        // prepara um statement juntamente com os seus placeholders (lemento usado em consultas SQL preparadas para indicar onde valores serão inseridos posteriormente)
        $stmt = $conn->prepare("INSERT INTO produtos (nomeProduto, quantidade, preco) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $nomeProduto, $quantidade, $preco); // indica que todos os campos sao strings e associa as variaveis aos placeholders

        // executa o statement (query preparada)
        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }
    }
?>