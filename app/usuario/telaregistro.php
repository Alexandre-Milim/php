<?php
    include("../config/cabecalho.php");
?>

<div class="container">
    <h1>Registro de usuário</h1>
    <form action="" method="POST">
        <label for="nome">nome</label>
        <input type="text" name="nome" required placeholder="Informe seu nome">

        <label for="login">Login</label>
        <input type="text" name="login" required placeholder="Informe seu login">

        <label for="email">E-mail</label>
        <input type="text" name="email" required placeholder="Informe seu E-mail">

        <label for="password">Senha</label>
        <input type="text" name="senha" required placeholder="Informe seu senha">

        <button type="submit">Registrar-se</button>
    </form>
    
    <?php
        //conectar com o banco
        include("../conexao.php");

        //formulario foi enviado?
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $login = $_POST["login"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $sql = "INSERT INTO usuario(nome,login,email,senha) VALUES (:nome, :login, :email, :senha)";
            $stmt = $conexao->prepare($sql);
            $stmt->execute([
                "nome" => $nome,
                "login" => $login,
                "email" => $email,
                "senha" => $senha
            ]);

            if($stmt->rowCount() > 0){
                echo "<div class='sucess'>Usúario cadastro com sucesso.</div>";
            }else {
                echo "<div class='error'>Erro ao cadastrar o usuario</div>";
            }
        }

        $conexao = null;
    ?>
</div>

<?php
    include("../config/rodape.php");
?>