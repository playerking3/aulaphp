<?php

    include("../config/cabecalho.php");
    include("../conexao.php");

    $sql = "SELECT id, nome ,login ,email FROM usuario";

    $result = $conexao->query($sql);

    if($result->rowCount() > 0){
        echo "<table border=1>";
        echo "
            <tr>
                <th>ID</th>
                <th>nome</th>
                <th>login</th>
                <th>E-mail</th>
                <th>editar</th>
                <th>Deletar</th>
            </tr>
        ";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" .$row['id']. "</td>";
            echo "<td>" .$row['nome']. "</td>";
            echo "<td>" .$row['login']. "</td>";
            echo "<td>" .$row['email']. "</td>";
            echo '<td><a href="telaeditar.php?id='.$row["id"].'">Editar</a></td>';
            echo '<td><a href="deletar.php?id='.$row['id'].'">Deletar</a></td>';
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "nenhum usuário encontrado";
    }

    include("../config/rodape.php");