<?php
    include 'conexao.php';
    include 'sessao.php';

    if ($_SESSION['funcao'] != 'gerente') {
        die("Acesso negado!");
    }

    $idProduto = $_GET['idProduto'] ?? null;

    $stmt = $conn->prepare("SELECT idProduto, nomeProduto, preco FROM produtos WHERE idProduto = ?");
    $stmt->bind_param("i", $idProduto);
    $stmt->execute();
    $produto = $stmt->get_result()->fetch_assoc();

    if (!$produto) {
        echo "Produto não encontrado!";
        header("Location: selecionar_produto_preco.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $novo_preco = $_POST['preco']; 
        
        $sql = "UPDATE produtos SET preco=? WHERE idProduto=?"; 
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("di", $novo_preco, $idProduto); 

        if ($stmt->execute()) {
            echo "Produto atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar preço: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alteração de Preços</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: "Poppins", sans-serif;
        }
        body { 
            background-color: #ffd9a0ff;
            margin: 20px; 
        }
        h1{
            font-size: 50px;
            text-align: center;
        }
        .container { 
            max-width: 500px; 
            margin: 0 auto;
        }
        .info-produto { 
            background: #f9f9f9; 
            padding: 15px; 
            margin-bottom: 20px; 
        }
        .form-group { 
            margin-bottom: 15px; 
        }
        label { 
            font-size: 20px;
            display: block; 
            margin-bottom: 5px; 
            font-weight: bold; 
        }
        input[type="text"], input[type="number"] { 
            font-size: 20px;
            padding: 8px; 
            width: 100%;
        }
        p{
            font-size: 20px;
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
        <h1>Alteração de Preços</h1>
        
        <div class="info-produto">
            <h2>Produto Selecionado</h2>
            <p>ID:<?= $produto['idProduto'] ?></p>
            <p>Nome:<?= htmlspecialchars($produto['nomeProduto']) ?></p>
            <p>Preço Atual:R$ <?= number_format($produto['preco'], 2) ?></p>
        </div><br>
        
        <form method="post">
            <div class="form-group">
                <label for="preco">Novo Preço:</label><br>
                <input type="text" name="preco" id="preco" 
                       placeholder="Ex: 12.99" required
                       value="<?= isset($_POST['preco']) ? htmlspecialchars($_POST['preco']) : '' ?>">
            </div>
            
            <button type="submit">Atualizar Preço</button>
            <a href="selecionar_produto_preco.php" style="margin-left: 10px;">Voltar</a>
        </form>
    </div>
</body>
</html>



