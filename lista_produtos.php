<?php

    include 'conexao.php';
    include 'sessao.php';

    if ($_SESSION['funcao'] != 'repositor' && $_SESSION['funcao'] != 'gerente') {
    exit("Acesso negado.");
    }

    $resultado = $conn->query("SELECT idProduto, nomeProduto, quantidade, preco FROM produtos");
 ?>
 <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: "Poppins", sans-serif;
        }
        body {
            margin: 20px;
            background-color:rgba(255, 254, 186, 1);
        }
        h2 {
            font-size: 40px;
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            font-size: 20px;
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 2px 3px rgba(0,0,0,0.1);
            background-color: white;
        }
        th {
            background-color:rgba(255, 170, 121, 1);
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid black;
        }
        tr:nth-child(even) {
            background-color:rgba(255, 254, 186, 1);
        }
        tr:hover {
            background-color:rgba(250, 199, 255, 1);
        }
        a {
            font-size: 20px;
            color: black;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color:rgba(250, 199, 255, 1);
        }
        .actions {
            text-align: center;
        }
        .back-link {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color:rgba(255, 254, 186, 1);
            color: white;
            border-radius: 5px;
        }
        .back-link:hover {
            background-color:rgba(250, 199, 255, 1);
            text-decoration: none;
        }
    </style>
</head>
<body>

    <a href='dashboard.php'>Voltar</a><br>

    <h2>Lista de Produtos</h2>

    <div class="links">
        <a href='registrar_entrada.php'>Registrar Entrada de Produtos</a>
        <?php if ($_SESSION['funcao'] == 'gerente'): ?>
            <a href='cadastrar_produto.php'>Cadastrar Produtos</a>
            <a href='atualizar_preco.php'>Atualizar Preços</a>
        <?php endif; ?>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
        </tr>
        <?php while ($linha = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $linha['idProduto'] ?></td>
            <td>
            <div class="produto-info">
                <span><?= $linha['nomeProduto'] ?></span>
            </div>
            </td>
            <td>R$ <?= number_format($linha['preco'], 2, ',', '.') ?></td>
            <td><?= $linha['quantidade'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>