<?php

    include("../config/cabecalho.php");
    include("../conexao.php");
    
    $sql = "SELECT id, nome, razao, cnpj, tipo FROM fornecedores";

    $result = $conexao->query($sql);

    if($result->rowCount() > 0){
        echo "<table border=1>";
        echo "
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Razao</th>
                <th>CNPJ</th>
                <th>Tipo</th>
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
            echo '<td><a href="forntelaeditar.php?id='.$row['id'].'">Editar</a></td>';
            echo '<td><a href="forndeletar.php?id='.$row['id'].'">Deletar</a></td>';
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "Nenhum usuário encontrado.";
    }

    include ("../config/rodape.php");