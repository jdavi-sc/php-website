<?php
session_start(); // Inicia a sessão

if (isset($_SESSION['usuario'])) {
    echo "Bem-vindo, " . $_SESSION['usuario'] . "!";
} else {
    echo "Usuário não autenticado.";
}
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/homephp.css">
        <title>Home</title>
    </head>
    <body>

        <div class="container">

            <div class="produto">
                <img class="imagemProduto" src="../img/img1.png" alt="icone produto">
                <a href="../php/cadastro-produto.php"><p>Cadastrar produto</p></a>
            </div>

            <div class="clientes">
                <img src="../img/img2.png" alt="icone clientes">
                <p>Clientes</p>
            </div>

            <div class="pedidos">
                <img src="../img/img3.png" alt="icone pedidos">
                <p>Pedidos</p>
            </div>

            <div class="dashboard">
                <img src="../img/img4.png" alt="icone dashboard">
                <p>Dashboard</p>
            </div>

        </div>
        
    </body>
</html>