<?php

    include("../config/cabecalho.php");
    include("../conexao.php");

    $sql = "SELECT id, nome, login, email FROM usuario";

    $resultado = $conexao->query($sql);

    if($resultado->rowCount() > 0){
        echo "<table border=1>";
        echo "
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Login</th>
                <th>E-mail</th>
            </tr>
        ";
        foreach($resultado as $row){
            echo "<tr>";
            echo "<td>" .$row['id']. "</td>";
            echo "<td>" .$row['nome']. "</td>";
            echo "<td>" .$row['login']. "</td>";
            echo "<td>" .$row['email']. "</td>";
            echo '<td><a href="TelaEditar.php?id='.$row['id'].'">Editar</a></td>';
            echo '<td><a href="deletar.php?id='.$row['id'].'">Deletar</a></td>';
            echo "</tr>";
        }
        echo "</table>";
    }else {
        echo "Nenhum usúario encontrado!";
    }

    include("../config/rodape.php");
?> 