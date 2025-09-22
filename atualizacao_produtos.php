<?php
    include 'conexao.php';
    include 'sessao.php';

    // comando que serve para verificar se exsite mesmo esse id no banco de dados,
    // caso ele esteja vazio ou nao exista nao deixará editar, pois indicara que nao ha um funcionario com esse ID,
    $id = $_GET['id'] ?? null;

    if (!$id) {
        die("ID inválido.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomeProduto = $_POST['nomeProduto'];
        $quantidade = $_POST['quantidade'];

        // comando que serve para alterar as informacoes no banco de dados MySQL
        $sql = "UPDATE produtos SET nomeProduto=?, quantidade=? WHERE idProduto=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nomeProduto, $quantidade, $id);

        if ($stmt->execute()) {
            echo "Produto atualizado com sucesso! <a href='lista_produtos.php'>Voltar</a>";
            exit();
        } else {
            echo "Erro ao atualizar: " . $conn->error;
        }
    }

    // mostra as atuais informacoes que há no banco de dados
    $sql = "SELECT * FROM produtos WHERE idProduto=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $produto = $stmt->get_result()->fetch_assoc();
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
            Nome Produto: <input type="text" name="nomeProduto" value="<?= $produto['nomeProduto'] ?>" required><br>
            Quantidade: <input type="number" name="quantidade" value="<?= $produto['quantidade'] ?>" required><br>
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>


