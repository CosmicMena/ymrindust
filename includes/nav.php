<?php
    if(isset($_SESSION['id'])) {
        try {
            $sql_cart = "SELECT * FROM tb_cart WHERE client_id = $idclient";
            $stmt_cart = $conn->query($sql_cart);
        } catch (PDOException $e) {
            echo "Erro ".$e->getMessage();
        }
    } else {
        try {
            $sql_cart = "SELECT * FROM tb_cart WHERE client_id = 1000";
            $stmt_cart = $conn->query($sql_cart);
        } catch (PDOException $e) {
            echo "Erro ".$e->getMessage();
        }
    }
?>
<div class="header-nav">
        <nav class="center-flex">
            <div class="content space-bet-flex">
                <ul class="inline_list">
                    <?php
                        $pagina_atual = basename($_SERVER["PHP_SELF"]);
                    ?>
                    <li><a href="index.php" <?php if ($pagina_atual == "index.php"){echo ' class="active"';} ?>>Home</a></li>
                    <li><a href="sobre.php" <?php if ($pagina_atual == "sobre.php"){echo ' class="active"';} ?>>Sobre nós</a></li>
                    <li><a href="contacto.php" <?php if ($pagina_atual == "contacto.php"){echo ' class="active"';} ?>>Contacte-nos</a></li>
                </ul>
                <ul class='inline_list'>
                <?php 
                    if(isset($_SESSION['id'])) {
                ?>
                        <li><a href="cliente.php">Olá, <?php echo $username; ?></a></li>
                        <li><a href="process.php?logout">sair</a></li>
                <?php
                    } else {
                ?>
                        <li><a onclick="document.getElementById('modal-login').style.display='flex'">Login</a></li>
                        <li><a onclick="document.getElementById('modal-cadastro').style.display='flex'">Cadastrar-se</a></li>
                <?php
                    }
                ?>
                </ul>
            </div>
            <div class="content responsive-content space-bet-flex">
                <a href="index.php" class="ymrlogo">
                    <img src="assets/ymrlogo.png" alt="Logo YMR">
                </a>
                <div class="toggle-side-menu" onclick="togglemenu(this)">
                    <div class="barra1"></div>
                    <div class="barra2"></div>
                    <div class="barra3"></div>
                </div>
                <ul class="side-menu">
                    <li><a href="index.php" <?php if ($pagina_atual == "index.php"){echo ' class="active"';} ?>>Home</a></li>
                    <li><a href="sobre.php" <?php if ($pagina_atual == "sobre.php"){echo ' class="active"';} ?>>Sobre nós</a></li>
                    <li><a href="contacto.php" <?php if ($pagina_atual == "contacto.php"){echo ' class="active"';} ?>>Contacte-nos</a></li>
                    <li><a href="index.php">Comprar</a></li>
                    <?php 
                        if(isset($_SESSION['id'])) {
                    ?>
                            <li><a href="cliente.php">Minha Conta</a></li>
                            <li><a href="process.php?logout">sair</a></li>
                    <?php
                        } else {
                    ?>
                            <li><a onclick="document.getElementById('modal-login').style.display='flex'">Login</a></li>
                            <li><a onclick="document.getElementById('modal-cadastro').style.display='flex'">Cadastrar-se</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </nav>
        <header>
            <div class="content space-bet-flex">
                <a href="index.php" class="ymrlogo">
                    <img src="assets/ymrlogo.png" alt="Logo YMR">
                </a>
                <form action="categorias.php" method="get" class="pesquisar-form">
                    <input type="text" placeholder="Pesquisar" name="pesquisa">
                    <select name="categoria" id="">
                        <option value="">Categoria Todas</option>                    
                        <?php
                            try {
                                $sql_category = "SELECT * FROM tb_category";
                                $stmt_category = $conn->query($sql_category);
                            } catch (PDOException $e) {
                                echo "Erro ao retronar as categorias".$e->getMessage();
                            }
                            
                            while ($row_category = $stmt_category->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="'.$row_category['category_id'].'">'.$row_category['category_name'].'</option>';
                            }
                        ?>
                    </select>
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <ul class="inline_list">
                    <li class="show-ocult-list">
                        <p><span>Produtos</span> <i class="fa-solid fa-caret-down"></i></p>
                        <ul class="ocult-list">
                            <?php
                                try {
                                    $sql_products_list = "SELECT tb_product.*, tb_subcategory.subcategory_name, tb_subcategory.category_id, tb_category.category_name FROM tb_product JOIN tb_subcategory ON tb_product.subcategory_id = tb_subcategory.subcategory_id JOIN tb_category ON tb_subcategory.category_id = tb_category.category_id LIMIT 10";
                                    $stmt_products_list = $conn->query($sql_products_list);
                                } catch (PDOException $e) {
                                    echo "Erro ao retornar produtos ".$e->getMessage();
                                }
                                while ($row_products_list = $stmt_products_list->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<li><a href="'.$row_products_list['product_id'].'">'.$row_products_list['product_name'].'</a></li>';
                                }
                            ?>
                            
                        </ul>
                    </li>
                        <li><p>|</p></li>
                        <li><a href="carrinho.php" class="cart"><i class="fa-solid fa-cart-shopping"></i> (<?php echo $stmt_cart->rowCount();?>)</a></li>
                </ul>
            </div>
        </header>
    </div>