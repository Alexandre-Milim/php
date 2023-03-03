<?php

    //conectar com o banco usando PDO
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "app";
    $dns = "mysql:host=$host;dbname=$banco;";

    try {
        $conexao = new PDO($dns, $usuario, $senha);
    } catch (\PDOException $e) {
        throw new PDOException($e->getMessage());
    }
?>