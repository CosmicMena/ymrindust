<?php
    session_start();
    include "config.php";

    if (isset($_POST['cadastrar-usuario'])) {

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $canal = $_POST["canal"];
        $pais = $_POST["pais"];
        $empresa = $_POST["company"];
        $cargo = "Gestoir de RH";
        $senha = $_POST["pass"];
        $user_rule = 1; 

        try {
            $sql_cadastrar_usuario = "INSERT INTO tb_users (nome, email, canal, pais, empresa, cargo, senha, user_rule) VALUES (:nome, :email, :canal, :pais, :empresa, :cargo, :senha, :user_rule)";
            $stmt_cadastrar_usuario = $conn->prepare($sql_cadastrar_usuario);
        
            // Associa os parâmetros da consulta SQL aos valores recebidos do formulário
            $stmt_cadastrar_usuario->bindParam(':nome', $nome);
            $stmt_cadastrar_usuario->bindParam(':email', $email);
            $stmt_cadastrar_usuario->bindParam(':canal', $canal);
            $stmt_cadastrar_usuario->bindParam(':pais', $pais);
            $stmt_cadastrar_usuario->bindParam(':empresa', $empresa);
            $stmt_cadastrar_usuario->bindParam(':cargo', $cargo);
            $stmt_cadastrar_usuario->bindParam(':senha', $senha);
            $stmt_cadastrar_usuario->bindParam(':user_rule', $user_rule);
            
            // Executa a declaração preparada
            $stmt_cadastrar_usuario->execute();
            
            header("location: home.php");
        } catch(PDOException $e) {
        // Em caso de erro na conexão ou na inserção, exibe a mensagem de erro
        echo "Erro: " . $e->getMessage();
        }
    }
    
?>


