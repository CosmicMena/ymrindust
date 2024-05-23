<?php 
    include("process.php");
    include("../config.php");

    $titulo = "YMR | Admin"; 
    $adminpage = 1;
    include("includes/header.php");  

    if (!isset($_SESSION['admin'])){
        header("location: login.php");
    } else {
        $userid = $_SESSION['admin'];
        try {
            $sql_dados_user = "SELECT tb_user.*, tb_user_rule.user_rule_name FROM tb_user JOIN tb_user_rule ON tb_user_rule.user_rule_id = tb_user.user_rule_id WHERE user_id = :userid";
            $stmt_dados_user = $conn->prepare($sql_dados_user);
            $stmt_dados_user->bindParam(':userid', $userid);
            $stmt_dados_user->execute();
        } catch (PDOException $e) {
            echo "Erro ".$e->getMessage;
        }
            $row_dados_user = $stmt_dados_user->fetch(PDO::FETCH_ASSOC);
            $username =  $row_dados_user['user_name'];
            $rule = $row_dados_user['user_rule_name'];
    }

    include('pages/modal/cad-produto.php');   
?> 

<div class="admin-page">
    <ul class="side-bar">
        <a href="" class="logo">
            <img src="../assets/ymrlogo.png" alt="YMR Logo">
        </a>

        <div class="user">
            <div class="user-image">
                <img src="../assets/user.png" alt="">
            </div>
            <div class="user-desc">
                <h3><?php echo $username; ?></h3>
                <p><?php echo $rule; ?></p>
            </div>
        </div>

        <li><a href="?general" <?php echo empty($_GET) ? 'class="active"' : '';?><?php echo isset($_GET["general"]) ? 'class="active"' : ''; ?>><div class="faicon"><i class="fa-solid fa-eye"></i></div> Visão geral</a></li>

        <li><a href="?messages" <?php echo isset($_GET["messages"]) ? 'class="active"' : ''; ?>><div class="faicon"><i class="fa-solid fa-message"></i></div> Mensagens</a></li>

        <li><a href="?order" <?php echo isset($_GET["order"]) ? 'class="active"' : ''; ?>><div class="faicon"><i class="fa-solid fa-cart-shopping"></i></div> Encomendas</a></li>

        <li><a href="?stock" <?php echo isset($_GET["stock"]) ? 'class="active"' : ''; ?>><div class="faicon"><i class="fa-solid fa-boxes-stacked"></i></div> Gestáo de Stock</a></li>

        <li><a href="?users" <?php echo isset($_GET["users"]) ? 'class="active"' : ''; ?>><div class="faicon"><i class="fa-solid fa-users"></i></div> Usuários</a></li>

        <li><a href="?logout" <?php echo isset($_GET["logout"]) ? 'class="active"' : ''; ?>><div class="faicon"><i class="fa-solid fa-users"></i></div> Logout</a></li>
    </ul>
    <main class="admin-main">
        <header>
            <div class="left">
                <a href=""><i class="fa-solid fa-circle-arrow-left"></i></a>
            </div>
            <div class="right">

            </div>
        </header>
        <?php include empty($_GET) ? 'pages/general.php' : 'pages/blank.php'; ?>
        <?php include isset($_GET["general"]) ? 'pages/general.php' : 'pages/blank.php'; ?>
        <?php include isset($_GET["messages"]) ? 'pages/message.php' : 'pages/blank.php'; ?>
        <?php include isset($_GET["order"]) ? 'pages/orders.php' : 'pages/blank.php'; ?>
        <?php include isset($_GET["stock"]) ? 'pages/stock.php' : 'pages/blank.php'; ?>
        <?php include isset($_GET["users"]) ? 'pages/users.php' : 'pages/blank.php'; ?>
    </main>
</div>
</body>
</html>

