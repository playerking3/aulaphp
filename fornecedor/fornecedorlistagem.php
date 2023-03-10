<?php

    include("../config/cabecalho.php");
    include("../conexao.php");
    
    $sql = "SELECT id, nome, razao, cnpj, tipo, cpf FROM fornecedores";

    $result = $conexao->query($sql);

    if($result->rowCount() > 0){
        echo "<table border=1>";
        echo "
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>Tipo da empresa</th>
                <th>CPF</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        ";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['razao']."</td>";
            echo "<td>".$row['cnpj']."</td>";
            echo "<td>".$row['tipo']."</td>";
            echo "<td>".$row['cpf']."</td>";
            echo '<td><a href="forntelaeditar.php?id='.$row['id'].'">Editar</a></td>';
            echo '<td><a href="forndeletar.php?id='.$row['id'].'">Deletar</a></td>';
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "Nenhum fornecedor encontrado.";
    }
?>

<div class="botao">
    <a href="cadastro.php">Registrar fornecedor</a>
</div>

<?php
    include ("../config/rodape.php");