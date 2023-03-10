<?php
    include("../config/cabecalho.php");

?>

<div class="container">
    <h1>Registro de usuário</h1>
    <form action="" method="POST">
        <label for="nome">nome</label>
        <input type="text" name="nome" id="nome" required placeholder="informe seu nome">

        <label for="login">login</label>
        <input type="text" name="login" id="login" required placeholder="informe seu login">

        <label for="email">email</label>
        <input type="email" name="email" id="email" required placeholder="informe seu email">

        <label for="senha">senha</label>
        <input type="password" name="senha" id="senha" required placeholder="informe sua senha">
        <div class="registroevoltar">
            <button type="submit">Registrar</button>
            <a class="voltar" href="telalistagem.php">Voltar</a>    
        </div>
        
    </form>

    <?php
        //conectar com o banco:
        include("../conexao.php");

        //formulario foi enviado?
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $login = $_POST["login"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            

            $query = "SELECT * FROM usuario WHERE login = :login AND email = :email";
            $stmt  = $conexao->prepare($query);
            $stmt->bindValue(":login",$login);
            $stmt->bindValue(":email",$email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row){
                die("Usuario já existe");
            }else{
                $sql = "INSERT INTO usuario(nome,login,email,senha) VALUES (:nome, :login, :email, :senha)";
                $stmt = $conexao->prepare($sql);
                $stmt -> execute([
                    "nome" => $nome, 
                    "login" => $login,
                    "email"=> $email,
                    "senha" => $senha
                    
                ]); 

                if($stmt ->rowCount() > 0){
                    echo "<div class='sucess'>Usuário cadastrado com sucesso</div>";
                    header("Location: telalogin.php");
                }else{
                    echo "<div class='error'>Erro ao cadastrar o usuário </div>";
                }   
            }

            //fechar a conexão
            $conexao = null;
        }
    ?>

</div>

<?php
    include("../config/rodape.php");

?>