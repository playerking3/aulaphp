<?php
    include("../conexao.php");

    if(!isset($_GET['id'])){
        die("ID do usuario não fornecido");
    }

    if(isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['email'])){

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $login = $_POST['login'];
        $email = $_POST['email'];

        $sql = "UPDATE usuario SET nome = :nome, login = :login, email = :email WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":email", $email);
        $stmt->execute();

        header("location: telalistagem.php");
        exit();
    }else{
        die("Dados do formulario não fornecidos");
    }
