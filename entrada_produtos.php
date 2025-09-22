<?php
    session_start();
    include 'conexao.php';

    if ($_SESSION['funcao'] != 'repositor' && $_SESSION['funcao'] != 'gerente') {
        die("Acesso negado!");
    }

    if(!isset($_SESSION['idFunc'])) 
    {
        header("Location: login.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $idProduto = $_POST['idProduto'];
        $quantidade = $_POST['quantidade'];


        $sql = "UPDATE produtos SET quantidade = quantidade + ? WHERE idProduto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $quantidade, $idProduto);

        if ($stmt->execute([$quantidade, $idProduto])) {
            echo  "Entrada de produtos registrada com sucesso!";
            header("Location: homepage.php");
            exit();
        } else {
            echo "Erro ao registrar entrada: " . $conn->error;
        }
    }

    $produto = $conn->query("SELECT * FROM produtos ORDER BY nomeProduto")->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Entrada de Produtos</title>
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
            font-size: 50px;
        }

        label { 
            font-size: 25px;
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
        <h1>Entrada de Produtos</h1> 
        <form method="post">
            <div class="form-group">
                <label for="idProduto">Produto:</label>
                <select name="idProduto" id="idProduto" required>
                    <option value="">Selecione um produto</option>
                        <option value="<?= $produto['idProduto'] ?>">
                            <?= htmlspecialchars($produto['nomeProduto']) ?> 
                            (Estoque: <?= $produto['quantidade'] ?>)
                        </option>
                </select>
            </div><br>
            
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="1" required>
            </div><br>
            
            <button type="submit">Registrar Entrada</button>
        </form>
        
        <p><a href="homepage.php">Voltar Homepage</a></p>
    </div>
</body>

</html>

