<?php
    session_start();
    include 'conexao.php';

    // Verifica se é gerente
    if ($_SESSION['funcao'] != 'gerente') {
        header("Location: homepage.php");
        exit();
    }

    // Busca todos os produtos para referência
    $produto = $conn->query("SELECT idProduto, nomeProduto, preco FROM produtos ORDER BY idProduto")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selecionar Produto - Preço</title>
 <style>
        body { 
            background-color:rgb(130, 148, 243);
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

        th{
            color: black;
            text-decoration: none;
            font-size: 20px;
            border: 1px solid black;
        }

        label {
            font-size: 20px;
        }

        table {
            font-size: 20px;
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 2px 3px rgba(0,0,0,0.1);
            background-color: white;
            border: 1px solid black;
        }

        td{
            font-size: 20px;
            padding: 10px;
            border: 1px solid black;
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
            font-size: 25px;
        }
        
        a:hover{
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alterar Preço do Produto</h1>
        
        <h2>Selecione o Produto</h2>
        <form action="alterar_preco.php" method="get">
            <label for="idProduto">ID do Produto:</label>
            <input type="number" name="idProduto" id="idProduto" min="1" required>
            <button type="submit">Selecionar</button>
        </form>
        
        <h2>Lista de Produtos</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço Atual</th>
            </tr>
            <tr>
                <td><?= $produto['idProduto'] ?></td>
                <td><?= htmlspecialchars($produto['nomeProduto']) ?></td>
                <td>R$ <?= number_format($produto['preco'], 2) ?></td>
            </tr>
        </table>
        
        <p><a href="homepage.php">Voltar HomePage</a></p>
    </div>
</body>
</html>