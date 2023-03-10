<?php
    include("../conexao.php");

    if(!isset($_GET['id'])){
        die("ID do fornecedor não fornecido");
    }

    if(isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['razao']) && isset($_POST['cnpj']) && isset($_POST['tipo'])){

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $razao = $_POST['razao'];
        $cnpj = $_POST['cnpj'];
        $tipo = $_POST['tipo'];

        $sql = "UPDATE fornecedores SET nome = :nome,razao = :razao,cnpj = :cnpj,tipo = :tipo WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->bindValue(":nome",$nome);
        $stmt->bindValue(":razao",$razao);
        $stmt->bindValue(":cnpj",$cnpj);
        $stmt->bindValue(":tipo",$tipo);
        $stmt->execute();

        header("Location: fornecedorlistagem.php");
        exit();
    }else{
        die("Dados do fornecedor não fornecidos");
    }
