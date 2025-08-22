<?php

    include 'conexao.php';
    include 'sessao.php';

    $resultado = $conn->query("SELECT idProduto, nomeProduto, quantidade, preco FROM produtos");

    echo 
    "<style>
        body {
            margin: 20px;
            background-color: #f5f5f5;
        }
        h2 {
            font-size: 40px;
            color: #333;
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
            background-color:rgb(19, 10, 100);
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e9e9e9;
        }
        a {
            font-size: 20px;
            color:rgb(19, 10, 100);
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: red;
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
            background-color=rgb(19, 10, 100);
            color: white;
            border-radius: 5px;
        }
        .back-link:hover {
            background-color:rgb(19, 10, 100);
            text-decoration: none;
        }
    </style>";
    echo "<h2>Produtos Cadastrados</h2>";
    echo "<table border='3'>
    <tr><th >ID</th><th>Nome Produto</th><th>Quantidade</th><th>Preço</th><th>Ações</th></tr>";

    while ($linha = $resultado->fetch_assoc()) {
        echo "<tr>
            <td>{$linha['idProduto']}</td>
            <td>{$linha['nomeProduto']}</td>
            <td>{$linha['quantidade']}</td>
            <td>{$linha['preco']}</td>
            <td>
                <a href='atualizacao_produtos.php?id={$linha['idProduto']}'>Editar</a>
            </td>
        </tr>";
    }
    echo "</table>";
    echo "<br><a href='homepage.php'>Voltar a HomePage</a>";
?>