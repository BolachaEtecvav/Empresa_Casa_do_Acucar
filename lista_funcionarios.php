<?php

    include 'conexao.php';
    include 'sessao.php';

    if ($_SESSION['funcao'] !== 'gerente') {
        die("Você não tem acesso! Apenas gerentes podem acessar estas páginas!");
    }

    $resultado = $conn->query("SELECT idFunc, nickname, nomeCompleto, email, funcao FROM funcionarios");

        echo 
    "<style>
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
    </style>";
    echo "<h2>Funcionários Cadastrados</h2>";
    echo "<table border='1'>
    <tr><th>ID</th><th>Nickname</th><th>Nome</th><th>Email</th><th>Função</th><th>Ações</th></tr>";

    while ($linha = $resultado->fetch_assoc()) {
        echo "<tr>
            <td>{$linha['idFunc']}</td>
            <td>{$linha['nickname']}</td>
            <td>{$linha['nomeCompleto']}</td>
            <td>{$linha['email']}</td>
            <td>{$linha['funcao']}</td>
            <td>
                <a href='editar_informacoes_funcionario.php?id={$linha['idFunc']}'>Editar</a> |
                <a href='excluir_funcionario.php?id={$linha['idFunc']}' onclick=\"return confirm('Tem certeza que deseja excluir?');\">Excluir</a>
            </td>
        </tr>";
    }
    echo "</table>";
    echo "<br><a href='homepage.php'>Voltar a HomePage</a>";

?>
