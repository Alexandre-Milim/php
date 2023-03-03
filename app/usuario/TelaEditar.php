<?php

    include("../config/cabecalho.php");
    include("../conexao.php");

    if(!isset($_GET['id'])){
        die("ID do usuário inválido");
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindvalue(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row){
        die("usuario não encontrado.");
    }

    ?>
    <div class="container">
        <h1>Atualizar seus dados</h1>
        <form action="<?php echo "atualizar.php?id={$id}" ?>" METHOD="POST">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required value="<?php echo $row['nome'] ?>">

            <label for="login">Login</label>
            <input type="text" name="login" id="login" placeholder="Informe o seu login" required value="<?php echo $row['login'] ?>">

            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Informe o seu email" required value="<?php echo $row['email'] ?>">

            <button type="submit">Atualizar</button>
        </form>
    
    <?php
        include("../config/rodape.php");
    ?>