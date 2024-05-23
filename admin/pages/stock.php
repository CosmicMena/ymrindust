

<div class="main-table">
    <div class="heading-section">
        <h3 class="content-heading">Gestão de Stock</h3>
        <div>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" class="pesquisar-form">
                <input type="text" placeholder="Pesquisar">
                <select name="" id="">
                    <option value="">Categoria Todas</option>
                    <option value="">Produtos</option>
                    <option value="">Produtos</option>
                    <option value="">Produtos</option>
                    <option value="">Produtos</option>
                </select>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        
        <button onclick="document.getElementById('modal-produto-cadastro').style.display='flex'">Cadastrar Produto</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Subcategoria</th>
                <th>Quant. Stock</th>
                <th>Preço Base</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
                try {
                    $sql_produto = "SELECT tb_product.*, tb_subcategory.subcategory_name, tb_subcategory.category_id, tb_category.category_name FROM tb_product JOIN tb_subcategory ON tb_product.subcategory_id = tb_subcategory.subcategory_id JOIN tb_category ON tb_subcategory.category_id = tb_category.category_id";
                    $stmt_produto = $conn->query($sql_produto);
                } catch (PDOException $e) {
                    echo "Erro ".$e->getMessage();
                }

                while ($row_produto = $stmt_produto->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td class="td-img">
                    <img src="../assets/produtos/<?php echo $row_produto['category_name']."/".$row_produto['product_img'];?>" alt="">
                    <p><?php echo $row_produto['product_name'];?></p>
                </td>
                <td><?php echo $row_produto['category_name'];?></td>
                <td><?php echo $row_produto['subcategory_name'];?></td>
                <td><?php echo $row_produto['product_stock'];?></td>
                <td><?php echo $row_produto['product_price'];?></td>
                <td>
                    <form action="">
                        <input type="hidden" value="idMessage">
                        <button name="ver-mensagem" id="ver-mensagem1"></button>
                    </form>
                    <label for="ver-mensagem1">Ver Mais</label>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>