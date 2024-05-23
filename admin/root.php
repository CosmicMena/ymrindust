<?php

// Dados do usuário
$nome = 'Eduardo Baptista';
$email = 'eduardombaptista2005@gmail.com';
$senha = 'Angola14';
$foto = null; // valor null pode ser representado como NULL no SQL
$user_rule_id = 2;

// Criptografar a senha
$hash = password_hash($senha, PASSWORD_DEFAULT);

try {
    // Preparar a consulta SQL
    $sql = "INSERT INTO tb_user (user_name, user_email, user_password, user_pp_url, user_rule_id) 
            VALUES (:nome, :email, :senha, :foto, :user_rule_id)";
    $stmt = $conn->prepare($sql);

    // Vincular os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $hash);
    $stmt->bindParam(':foto', $foto, PDO::PARAM_NULL);
    $stmt->bindParam(':user_rule_id', $user_rule_id);

    // Executar a consulta
    $stmt->execute();

    echo "Conta cadastrada com sucesso!";
} catch(PDOException $e) {
    echo "Erro ao cadastrar usuário: " . $e->getMessage();
}
?>
