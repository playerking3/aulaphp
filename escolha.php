<?php
    include ("config/cabecalhoprincipal.php");
    include ("conexao.php");
?>

<div class="escolha">
    <div class="usuario">
        <a href="usuario/telalistagem.php">Listagem de usuários</a>
        <?php
            $sql = "SELECT count(id) as quantidade FROM usuario";
            $result = $conexao->query($sql);
            $result->execute();       
            
            $r = $result->fetch(PDO::FETCH_ASSOC);
            echo "<h1> Quantidade de usuários: " .$r['quantidade']. "</h1>";
        ?> 
    </div>
    <div class="fornecedores">
        <a href="fornecedor/fornecedorlistagem.php">Listagem de fornecedores</a>
        <?php
            $sql = "SELECT count(id) as quantidade FROM fornecedores";
            $result = $conexao->query($sql);
            $result->execute();

            $r = $result->fetch(PDO::FETCH_ASSOC);
            echo "<h1> Quantidade de fornecedores: " .$r['quantidade']. "</h1>";
            
        ?> 
    </div>
</div>

<div class="botao">
    <a href="usuario/telalogin.php">Voltar</a>
</div>
