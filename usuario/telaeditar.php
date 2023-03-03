<?php

    include("../config/cabecalho.php");
    include("../conexao.php");

    //verificar se o id foi passado
    if(!isset($_GET['id'])){
        die("ID do usuario inválido");
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt ->bindValue(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //VERIFICA SE RETORNOY ALGUMA COISA
    //(!) significa negçao
    if(!$row){
        die("Usuário não encontrado.");
    }
?>
<div class="container">
    <h1>Atualizar seus dados</h1>
    <form action="<?php echo "atualizar.php?id={$id}" ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="informe seu nome" required value="<?php echo $row['nome'] ?>">

        <label for="login">Nome</label>
        <input type="text" name="login" id="login" placeholder="informe seu login" required value="<?php echo $row['login'] ?>">

        <label for="email">Nome</label>
        <input type="email" name="email" id="email" placeholder="informe seu E-mail" required value="<?php echo $row['email'] ?>">

        <button type="submit">Atualizar</button>

    </form>
</div>

<?php
    include("../config/rodape.php");
?>