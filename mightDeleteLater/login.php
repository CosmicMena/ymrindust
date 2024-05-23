<?php
session_start();
include "config.php";

if (isset($_POST['login-usuario'])) {

    $email = $_POST["email"];
    $senha = $_POST["pass"];

    try {
        $sql_verificar_usuario = "SELECT * FROM tb_users WHERE email = :email";
        $stmt_verificar_usuario = $conn->prepare($sql_verificar_usuario);
        $stmt_verificar_usuario->bindParam(':email', $email);
        $stmt_verificar_usuario->execute();
        
        if ($stmt_verificar_usuario->rowCount() > 0) {
            $row_verificar_usuario = $stmt_verificar_usuario->fetch(PDO::FETCH_ASSOC);
            if ($row_verificar_usuario['senha'] == $senha) {
                $_SESSION['id'] = $row_verificar_usuario['id'];
                header("location: home.php");
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
