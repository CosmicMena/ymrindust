<?php 
    include("process.php");
    $titulo = "YMR | Produto"; 
    include("includes/header.php");    
    include("includes/nav.php");  
    if (isset($_GET['id_produto'])){
        $idProduto = $_GET['id_produto'];
    }  

    try {
        $sql_product = "SELECT tb_product.*, tb_subcategory.subcategory_name, tb_subcategory.category_id, tb_category.category_name, tb_category.category_id FROM tb_product JOIN tb_subcategory ON tb_product.subcategory_id = tb_subcategory.subcategory_id JOIN tb_category ON tb_subcategory.category_id = tb_category.category_id WHERE product_id = $idProduto";
        $stmt_product = $conn->query($sql_product);
    } catch (PDOException $e) {
        echo "Erro ao retornar os produtos".$e->getMessage();
    }

    $row_product = $stmt_product->fetch(PDO::FETCH_ASSOC);
?> 
    <main>
        <section class="main-body">
            <section class="main-section">
                <p class="section-heading-history">
                    <a href="index.php">Home</a> > <a href="categorias.php?category=<?php echo $row_product['category_name']; ?>&id_category=<?php echo $row_product['category_id']; ?>"><?php echo $row_product['category_name']; ?></a> > <a href="#" class="actual"><?php echo $row_product['product_name']; ?></a>
                </p>
                <div class="product-view">    
                    <div class="big-product-card">
                        <div class="main-image">
                            <img id="main-image" style="width:100%"  src="assets/produtos/<?php echo $row_product['category_name']; ?>/<?php echo $row_product['product_img']; ?>">
                        </div>
                        <!-- The four columns -->
                        <div class="row">
                            <div class="column">
                                <img src="assets/produtos/<?php echo $row_product['category_name']; ?>/<?php echo $row_product['product_img']; ?>" style="width:100%" onclick="trocarImagem(this);">
                            </div>
                            <div class="column">
                                <img src="assets/product/adhesives/0022.jpg" style="width:100%" onclick="trocarImagem(this);">
                            </div>
                            <div class="column">
                                <img src="assets/product/adhesives/images.jpg" style="width:100%" onclick="trocarImagem(this);">
                            </div>
                            <div class="column">
                                <img src="assets/product/adhesives/images-1.jpg" style="width:100%" onclick="trocarImagem(this);">
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="product-tab-name">
                            <h2><?php echo $row_product['product_name']; ?></h2>
                        </div>
                        <div class="product-tab-header">
                            <button class="atributo_link active" onclick="mostrarAtributo(event, 'desc')">Descrição</button>
                            <button class="atributo_link" onclick="mostrarAtributo(event, 'esp')">Especificações</button>
                            <button class="atributo_link" onclick="mostrarAtributo(event, 'doc')">Documentação</button>
                        </div>
                        <div id="desc" class="product_tab_body active">
                            <h3>Descrição</h3>
                            <p><?php echo $row_product['product_desc']; ?></p>
                        </div>
                        <div id="esp" class="product_tab_body">
                            <h3>Especificações</h3>
                            <p><?php echo $row_product['product_esp']; ?></p> 
                        </div>
                        <div id="doc" class="product_tab_body">
                            <h3>Documentação</h3>
                            <a href="assets/files/<?php echo $row_product['product_doc']; ?>" download="<?php echo $row_product['product_doc']; ?>">Baixar Documentação <i class="fa-solid fa-file-arrow-down"></i></a>
                        </div>
                        <div class="produto-tab-footer">
                            <p>
                                Disponibilidade: <span class="green">Disponível</span> <br>
                                Quantidade em Stock: <?php echo $row_product['product_stock']; ?>
                            </p>
                            <form method="POST" class="add-cart-form">
                                <div class="min-input-box">
                                    <input type="hidden" name="idproduto" value="<?php echo $idProduto; ?>">
                                    <input type="hidden" name="idclient" value="<?php if (empty($idclient)){echo "1000";}else{echo $idclient;}?>">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="number" name="quantidade-produto" id="quantidade" min="1" value="1" max="150">
                                </div>
                                <button type="submit" name="addcart"><i class="fa-solid fa-cart-shopping"></i><span> (+)</span></button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="iframe-section">
                    <iframe width="560" height="315" src="<?php echo $row_product['product_vid']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <?php include("includes/scrollprod.php");?>
            </section>
            <aside>
                <?php 
                    include("includes/aside/aside-category-list.php"); 
                    include("includes/aside/aside-slideshow.html"); 
                ?>
            </aside>
        </section>
    </main>
<?php include("includes/footer.php"); ?>