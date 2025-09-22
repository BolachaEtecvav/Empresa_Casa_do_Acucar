<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            font-family: "Poppins", sans-serif;
        }
        body { 
            background-color: #ffd9a0ff;
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
            max-width: 600px; 
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
            background:#ffaa79ff;
            color: black;
            font-size: 15px;
            border-radius: 10px; 
            cursor: pointer; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema Doceria</h1>

        <form method="post" action="login.php">
            <br>
            NICKNAME: <input type="text" name="nickname" required><br><br>
            SENHA: <input type="password" name="senha" required><br><br>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>