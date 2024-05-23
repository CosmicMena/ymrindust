<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <meta name="description" content="Bem-vindo à YMR Industrial Encontre aqui o que precisa em uma ampla variedade de produtos, incluindo consumiveis, eletrônicos e muito mais. Explore nossas ofertas e faça suas angendas online com facilidade.">
    <meta name="keywords" content="YMR Industrial, Angola, consumíveis, eletrônicos, construção, peças, Kilamba, Loja Online">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.ymrindustrial.com">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="styles/style.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fontes do google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="assets/ymrsvg.png" type="image/x-icon">
    <title><?php echo $titulo;?></title>
</head>
<body>

<?php 

    include("config.php");

    include("includes/modal/modal-login.php");
    include("includes/modal/modal-cadastro.php"); 
    if (isset($_SESSION['id'])) {
        $idclient = $_SESSION['id'];
        try {
            $sql_dados_usuario = "SELECT * FROM tb_client WHERE client_id = ".$idclient;
            $stmt_dados_usuario = $conn->query($sql_dados_usuario);
            $row_dados_usuario = $stmt_dados_usuario->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "erro: ".$e->getMessage();
        }
        $username = $row_dados_usuario['client_name'];
    }
?>
