<?php 
    try {
        $sql_scroll_product = "SELECT tb_product.*, tb_subcategory.subcategory_name, tb_subcategory.category_id, tb_category.category_name FROM tb_product JOIN tb_subcategory ON tb_product.subcategory_id = tb_subcategory.subcategory_id JOIN tb_category ON tb_subcategory.category_id = tb_category.category_id ORDER BY RAND() LIMIT 4";
        $stmt_scroll_product = $conn->query($sql_scroll_product);
    } catch (PDOException $e) {
        echo "Erro ao retornar produtos ".$e->getMessage();
    }
    
?>
<h2 class="section-heading text-center">
        Destaques
    </h2>
    <div class="scroll-auto" style="--t:50s">
        <div>
            <?php 
                while ($row_scroll_product = $stmt_scroll_product->fetch(PDO::FETCH_ASSOC)) {
                    echo '<a href="" class="min-product-card">
                        <img src="assets/produtos/'. $row_scroll_product['category_name'].'/'.$row_scroll_product['product_img'].'" alt="Adesivo Personalizado">
                        <p>'.$row_scroll_product['product_name'].'</p>
                    </a>';
                }
                // Fechar e reexecutar a consulta
                $stmt_scroll_product->closeCursor(); // Fecha o cursor, permitindo que a consulta seja reexecutada
                $stmt_scroll_product->execute(); // Reexecuta a consulta
            ?>
        </div>
        <div>
            <?php 
                while ($row_scroll_product = $stmt_scroll_product->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <a href="produto.php?id_produto=<?php echo $row_scroll_product['product_id'];?>" class="min-product-card">
                        <img src="assets/produtos/<?php echo $row_scroll_product['category_name'].'/'.$row_scroll_product['product_img']; ?>" alt="Adesivo Personalizado">
                        <p><?php echo $row_scroll_product['product_name']; ?></p>
                    </a>
            <?php
                }
            ?>
        </div>
    </div>