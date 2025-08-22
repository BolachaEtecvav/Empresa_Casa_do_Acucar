<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <style>
        body { 
            background-image: url("img/funco.jpg");
            background-position: center center;
            background-size: cover;
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
            background:rgba(255, 170, 121, 1);
            color: black;
            font-size: 15px;
            border-radius: 10px; 
            cursor: pointer; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema Papelaria</h1>

        <form method="post" action="login.php">
            <br>
            NICKNAME: <input type="text" name="nickname" required><br><br>
            SENHA: <input type="password" name="senha" required><br><br>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>

</html>
