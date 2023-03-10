<?php

    include("../conexao.php");

    //verificar e o id foi reconhecido
    if (!isset($_GET['id'])){
        die("ID do fornecedor não foi fornecido");
    }

    //vai receber o id da url
    $id = $_GET['id'];

    $sql = "DELETE FROM fornecedores WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    header("Location: fornecedorlistagem.php");
    exit;
