<?php
    include 'sessao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
         <style>
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

        p {
            font-size: 25px;
        }
        ul{
            display: flex;
            align-items: left;
            justify-content: center;
            color: white;
            flex-direction: column;
        }

        li{
            padding: 5px;
        }

        li a {
            color: black;
            text-decoration: none;
            font-size: 25px;
        }
        
        a:hover{
            color:rgba(250, 199, 255, 1);
        }

        button { 
            padding: 10px 15px;
            background:rgba(255, 170, 121, 1);
            color: black;
            font-size: 15px;
            border-radius: 10px; 
            cursor: pointer; 
        }
    </style>
</head>
<body>
     
    <div class="container">
        <h1>Bem-vinda a Casa do Açúcar</h1>
        <p>Sua Função é: <?php echo $_SESSION['funcao']; ?></p><br>
        <ul>
                <li><a href="alterar_senha.php">Alterar Senha</a></li>
                <li><a href="cadastro.php">Cadastrar Funcionário</a></li>
                <li><a href="lista_funcionarios.php">Listas dos Funcionários</a></li>
                <li><a href="alterar_preco.php">Alterar Preço dos Produtos</a></li>
                <li><a href="cadastro_produtos.php">Cadastrar Produto</a></li>
                <li><a href="entrada_produtos.php">Entrada de Produtos</a></li>
                <li><a href="lista_produtos.php">Listas dos Produtos</a></li>
                <li><a href="logout.php">Sair</a></li>
        </ul>
    </div>
</body>
</html>

