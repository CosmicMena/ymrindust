<?php 
    include("process.php");
    $titulo = "YMR | Home"; 
    include("includes/header.php");    
    include("includes/nav.php");    
    
    if (empty($idclient)) {
        $idclient = 1000;
        try {
            $sql_cart = "SELECT tb_cart.*, tb_product.*, tb_subcategory.*, tb_category.* FROM tb_cart JOIN tb_product ON tb_product.product_id = tb_cart.product_id JOIN tb_subcategory ON tb_subcategory.subcategory_id = tb_product.subcategory_id JOIN tb_category ON tb_category.category_id = tb_subcategory.category_id WHERE client_id = $idclient";
            $stmt_cart = $conn->query($sql_cart);
        } catch (PDOException $e) {
            echo "Erro ".$e->getMessage();
        }
    } else {
        try {
            $sql_cart = "SELECT tb_cart.*, tb_product.*, tb_subcategory.*, tb_category.* FROM tb_cart JOIN tb_product ON tb_product.product_id = tb_cart.product_id JOIN tb_subcategory ON tb_subcategory.subcategory_id = tb_product.subcategory_id JOIN tb_category ON tb_category.category_id = tb_subcategory.category_id WHERE client_id = $idclient";
            $stmt_cart = $conn->query($sql_cart);
        } catch (PDOException $e) {
            echo "Erro ".$e->getMessage();
        }
    }
?> 
    <main>
        <section class="main-body">
            <section class="main-section">
                <h2 class="section-heading">
                    Carrinho
                </h2>
                <table class="table-main">
                    <thead>
                        <tr>
                            <th>img</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($stmt_cart->rowCount() > 0){
                                while ($row_cart = $stmt_cart->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                    <tr>
                                        <td class="img-td center"><img src="assets/produtos/<?php echo $row_cart['category_id']; ?>/<?php echo $row_cart['product_img']; ?>"></td>
                                        <td data-cell="Produto">
                                            <p class="td-p-category"><?php echo $row_cart['category_name'];?></p>
                                            <h3><?php echo $row_cart['product_name'];?></h3>
                                        </td>
                                        <td class="center" data-cell="Quantidade">
                                            <form action="" method="get" class="add-cart-form">
                                                <div class="min-input-box">
                                                    <label for="quantidade">Quant.</label>
                                                    <input type="number" name="quantidade-produto" id="quantidade" min="1" value="<?php echo $row_cart['cart_quant'];?>" max="150">
                                                </div>
                                                <button><i class="fa-solid fa-cart-shopping"></i><span> (+)</span></button>
                                            </form>
                                        </td>
                                        <td class="center"  data-cell="Ação">
                                            <form method="post">
                                                <input type="hidden" name="idCarrinho" value="<?php echo $row_cart['product_id'];?>">
                                                <input type="hidden" name="idclient" value="<?php if (empty($idclient)){echo "1000";}else{echo $idclient;}?>">
                                                <button class="btn" name="removecart">Remover</button>
                                            </form>
                                        </td>
                                    </tr>
                        <?php                                
                                }
                            } else {
                        ?>
                                <tr>
                                    <td colspan="4">Sem Produtos no carrinho <a href="index.php" class="btn">Continue explorando</a></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <?php
                            if ($stmt_cart->rowCount() > 0){
                        ?>
                        <tr>
                            <td colspan="4">
                                <form action="" method="post">
                                    <button class="btn">Pedir Orçamento</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tfoot>
                </table>
                <?php include("includes/scrollprod.php");?>
            </section>
            <aside>
                <?php 
                    include("includes/aside/aside-category-list.php"); 
                ?>
            </aside>
        </section>
    </main>
<?php include("includes/footer.php"); ?>