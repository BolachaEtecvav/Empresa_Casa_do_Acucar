<?php
    include "conexao.php";
    include "sessao.php";

    if ($_SESSION['funcao'] != 'gerente') {
        die("Acesso negado!");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomeProduto = $_POST['nomeProduto'];
        $quantidade = $_POST['quantidade'];
        $categoria = $_POST['categoria'];
        $preco = $_POST['preco'];

        $stmt = $conn->prepare("INSERT INTO produtos (nomeProduto, quantidade, preco) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $nomeProduto, $quantidade, $preco); 

        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

        if ($extensao != "jpg") {
            $result_msg = "<p style='color:red;'>Erro: a imagem deve estar no formato JPG.</p>";
        } else {
           $pasta = "imagens/";
           if (!is_dir($pasta)) mkdir($pasta, 0777, true);

            $nomeArquivo = uniqid() . ".jpg";
            $caminho = $pasta . $nomeArquivo;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
                $stmt = $conn->prepare("INSERT INTO produtos (nome, categoria, preco, quantidade, fotos) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssdis", $nome, $categoria, $preco, $quantidade, $caminho);
                $stmt->execute();
                $result_msg = "<p style='color:green;'>Produto cadastrado com sucesso com imagem!</p>";
            } else {
                $result_msg = "<p style='color:red;'>Erro ao salvar a imagem.</p>";
            }
        }
        } else {
            $stmt = $conn->prepare("INSERT INTO produtos (nome, categoria, preco, quantidade, fotos) VALUES (?, ?, ?, ?, '')");
            $stmt->bind_param("ssdi", $nome, $categoria, $preco, $quantidade);
            $stmt->execute();
            $result_msg = "<p style='color:green;'>Produto cadastrado sem imagem.</p>";
         }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produtos</title>
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
        <h1>Cadastre o Produto</h1>
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



