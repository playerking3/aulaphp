<?php
    include("../config/cabecalho.php")
?>

<div class="container">
    <h1>Faça seu login</h1>
    <form action="" method="POST">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" required placeholder="informe seu login">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required placeholder="informe sua senha">

        <button type="submit">Logar</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            require("../conexao.php");

            $login =$_POST["login"];
            $senha = $_POST["senha"];

            $query = "SELECT * FROM usuario WHERE login = :login and senha = :senha";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(":login", $login);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();       
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result){
                header("location: ../escolha.php");
                exit();
            }else{
                echo "<div class='error'>Uusuário ou senha inválidos</div>";
            }
        }
    ?>






<?php
    include("../config/rodape.php")
?>