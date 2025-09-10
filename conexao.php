<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "doceria";

    // conectar com o banco de dados
    $conn = new mysqli($host, $user, $pass, $db);

    // mostra o erro, caso nao consiga conectar
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
?>