<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro-produto.css">
    <title>Cadastrar produto</title>
</head>
<body>
    <div class="container">
        <div class="formulario">
            <form action="#" method="post">
                <input type="text" name="nome" placeholder="Nome" required="true">
                <input type="text" name="marca" placeholder="Marca" required="true">
                <input type="text" name="preco" placeholder="Preço" required="true">
                <input type="text" name="descricao"  placeholder="descricao" required="true">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>
</html>

<?php

    include("conexao.php");

    $nomeDoProduto = $_POST['nome'] ?? null;
    $marca = $_POST['marca'] ?? null;
    $preco = $_POST['preco'] ?? null;
    $descricao = $_POST['descricao'] ?? null;

    if (!$nomeDoProduto || !$marca || !$preco || !$descricao) {
        echo "Preencha todos os campos";
        exit;
    }

    try {
        $varVerifica = $pdo->prepare("SELECT COUNT(*) FROM produtos WHERE nome = :nome");
        $varVerifica->bindParam(':nome', $nomeDoProduto);
        $varVerifica->execute();

        if ($varVerifica->fetchColumn() > 0) {
            echo "Produto já cadastrado";
            exit;
        }

        $pdo->beginTransaction();

        $varProduto = $pdo->prepare("INSERT INTO (nome, marca, preco, descricao) VALUES (:nome, :marca, :preco, :descricao)");
        $varProduto->bindParam(':nome', $nomeDoProduto);
        $varProduto->bindParam(':marca', $marca);
        $varProduto->bindParam(':preco', $preco);
        $varProduto->bindParam(':descricao', $descricao);
        $varProduto->execute();
        $pdo->commit();

        echo "Cadastro realizado com sucesso!";
        
    } catch (Exception $e) {
        $pdo->rollback();
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
?>