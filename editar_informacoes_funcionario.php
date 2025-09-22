<?php
    include 'conexao.php';
    include 'sessao.php';

    // verifica se a funcao do usuario é gerente
    if ($_SESSION['funcao'] !== 'gerente') {
        die("Acesso negado.");
    }

    // comando que serve para verificar se exsite mesmo esse id no banco de dados,
    // caso ele esteja vazio ou nao exista nao deixará editar, pois indicara que nao ha um funcionario com esse ID,
    $id = $_GET['id'] ?? null;

    if (!$id) {
        die("ID inválido.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nickname = $_POST['nickname'];
        $nomeCompleto = $_POST['nomeCompleto'];
        $email = $_POST['email'];
        $funcao = $_POST['funcao'];

        // comando que serve para alterar as informacoes no banco de dados MySQL
        $sql = "UPDATE funcionarios SET nickname=?, nomeCompleto=?, email=?, funcao=? WHERE idFunc=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nickname, $nomeCompleto, $email, $funcao, $id);

        if ($stmt->execute()) {
            echo "Funcionário atualizado com sucesso! <a href='lista_funcionarios.php'>Voltar</a>";
            exit;
        } else {
            echo "Erro ao atualizar: " . $conn->error;
        }
    }

    // mostra as atuais informacoes que há no banco de dados
    $sql = "SELECT * FROM funcionarios WHERE idFunc=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $func = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Informações</title>
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
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            Nickname: <input type="text" name="nickname" value="<?= $func['nickname'] ?>" required><br>
            Nome Completo: <input type="text" name="nomeCompleto" value="<?= $func['nomeCompleto'] ?>" required><br>
            Email: <input type="email" name="email" value="<?= $func['email'] ?>" required><br>
            Função:
            <select name="funcao">
                <option value="gerente" <?= $func['funcao'] == 'gerente' ? 'selected' : '' ?>>Gerente</option>
                <option value="funcionario" <?= $func['funcao'] == 'funcionario' ? 'selected' : '' ?>>Funcionário</option>
                <option value="repositor" <?= $func['funcao'] == 'repositor' ? 'selected' : '' ?>>Repositor</option>
            </select><br>
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>


