<?php

    include("../config/cabecalho.php");
    include("../conexao.php");

    if(!isset($_GET['id'])) {
        die("ID do fornecedor invalido");
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM fornecedores WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row) {
        die("fornecedor não encontrado");
    }
?>

<div class="container">
    <h1>Atualizar seus dados</h1>
    <form action="<?php echo "fornecedoratualizar.php?id={$id}" ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="informe seu nome" required value="<?php echo $row['nome'] ?>">

        <label for="razao">Razão social</label>
        <input type="text" name="razao" id="razao" placeholder="informe a razão social" required value="<?php echo $row['razao'] ?>">

        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" id="cnpj" placeholder="informe o CNPJ" required value="<?php echo $row['cnpj'] ?>">

        <label for="tipo">Tipo da empresa</label>
        <input type="text" name="tipo" id="tipo" placeholder="informe o tipo da empresa" required value="<?php echo $row['tipo'] ?>">

        <button type="submit">Atualizar</button>
    </form>
</div>

<?php
    include("../config/rodape.php");
?>  
