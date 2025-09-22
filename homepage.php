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
            font-size: 45px;
        }

        p {
            font-size: 20px;
        }
        ul{
            display: flex;
            align-items: left;
            justify-content: center;
            color: #ffd9a0ff;
            flex-direction: column;
        }

        li{
            padding: 5px;
        }

        li a {
            color: black;
            text-decoration: none;
            font-size: 15px;
        }
        
        a:hover{
            color: #c277a3;
        }

        button { 
            padding: 10px 15px;
            background: #c277a3;
            color: black;
            font-size: 10px;
            border-radius: 10px; 
            cursor: pointer; 
        }

        // 
        .buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-width: 300px;
        }

        .buttons a {
            display: inline-block;
            text-align: center;
            padding: 12px 15px;
            background-color: #c277a3;
            color: white;
            font-weight: 500;
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .buttons a:hover {
            background-color: #c74d94ff;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        //
    </style>
</head>
<body>
     
    <div class="container">
        <h1>Bem-vinda a Casa do Açúcar</h1>
        <p>Sua Função é: <?php echo $_SESSION['funcao']; ?></p>

        <div class="buttons">
        <?php if ($_SESSION['funcao'] == 'gerente'): ?>
            <ul>
                <li><a href='cadastro.php'>Cadastrar Funcionário</a></li>
                <li><a href='lista_funcionarios.php'>Gerenciar Funcionários</a></li>
                <li><a href="alterar_preco.php">Alterar Preço dos Produtos</a></li>
                <li><a href="cadastro_produtos.php">Cadastrar Produto</a></li>
                <li><a href="entrada_produtos.php">Entrada de Produtos</a></li>
            </ul>
        <?php endif; ?>

        <?php if ($_SESSION['funcao'] == 'gerente' || $_SESSION['funcao'] == 'repositor'): ?>
            <ul>
                <li><a href='lista_produtos.php'>Ver Lista de Produtos</a></li>
            </ul>
        <?php endif; ?>

        <ul>
            <li><a href='alterar_senha.php'>Alterar Minha Senha</a></li>
            <li><a href='logout.php'>Sair</a></li>
        </ul>
        </div>
    </div>
</body>
</html>

