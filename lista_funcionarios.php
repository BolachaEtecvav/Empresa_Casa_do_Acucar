<?php

    include 'conexao.php';
    include 'sessao.php';

    if ($_SESSION['funcao'] !== 'gerente') {
        die("Você não tem acesso! Apenas gerentes podem acessar estas páginas!");
    }

    $resultado = $conn->query("SELECT idFunc, nickname, nomeCompleto, email, funcao FROM funcionarios WHERE funcao <> 'gerente'");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: "Poppins", sans-serif;
        }
        body {
            margin: 20px;
            background-color: #ffd9a0ff;
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
    <a href='dashboard.php' class="voltar">Voltar</a>

    <h2>Funcionários</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nickname</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Função</th>
            <th>Ações</th>
        </tr>

    <?php while ($linha = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php $linha['idFunc']?></td>
            <td><?php $linha['nickname']?></td>
            <td><?php $linha['nomeCompleto']?></td>
            <td><?php $linha['email']?></td>
            <td><?php $linha['funcao']?></td>
            <td>
                <a href='editar_informacoes_funcionario.php?id=<?php $linha['idFunc']?>'>Editar</a> 
                <a href='excluir_funcionario.php?id=<?php $linha['idFunc']?>' onclick='return confirm("Tem certeza que deseja excluir?")'>Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>;
    <br><a href='homepage.php'>Voltar a HomePage</a>;

?>
