<?php

    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $database = "ymr_indus";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES utf8");
    } catch(PDOException $e) {
        echo "Conexão falhou: " . $e->getMessage();
    }
?>