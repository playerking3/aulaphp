<?php
    include("../config/cabecalho.php");

?>

<div class="container">
    <h1>Registro de fornecedores.</h1>
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required placeholder="informe seu nome">

        <label for="razao">Razão social</label>
        <input type="text" name="razao" id="razao" required placeholder="insira a razão social">

        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" id="cnpj" required placeholder="Insira o CNPJ da empresa">

        <label for="tipo">Tipo da empresa</label>
        <input type="text" name="tipo" id="tipo" required placeholder="Insira o tipo da empresa">

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" required placeholder="Insira o CPF">

        <div class="registroevoltar">
            <button type="submit">Registrar</button>
            <a class="voltar" href="fornecedorlistagem.php">Voltar</a>    
        </div>
    </form>

    <?php
        include("../conexao.php");

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST ["nome"];
            $razao = $_POST ["razao"];
            $cnpj = $_POST ["cnpj"];
            $tipo = $_POST ["tipo"];
            $cpf = $_POST ["cpf"];

            //Para validar o registro
            $query = "SELECT * FROM fornecedores WHERE cpf = :cpf AND cnpj = :cnpj";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(":cpf",$cpf);
            $stmt->bindValue(":cnpj",$cnpj);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


            if($row){
                die("Fornecedor já cadastrado");
            }else{
                $sql = "INSERT INTO fornecedores(nome,razao,cnpj,tipo,cpf) VALUES (:nome, :razao, :cnpj, :tipo, :cpf)";
                $stmt = $conexao->prepare($sql);
                $stmt -> execute([
                    "nome" => $nome,
                    "razao" => $razao,
                    "cnpj" => $cnpj,
                    "tipo" => $tipo,
                    "cpf" => $cpf
                ]);

                if($stmt ->rowCount() > 0){
                    echo "<div class='sucess'>Fornecedor cadastrado com sucesso</div>";
                    header("Location: fornecedorlistagem.php");

                }else{
                    echo "<div class='error'>Erro ao cadastrar o fornecedor </div>";
                }
            }
            $conexao = null;

        }
    
    
    ?>
</div>


<?php
    include("../config/rodape.php");

?>