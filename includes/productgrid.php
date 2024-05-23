<?php if (isset($_GET['pesquisa'])) ?>
<h2 class="section-heading">
    <?php 
        if (isset($_GET['pesquisa'])) {
            echo 'Resultado da Pesquisa por: '.$_GET['pesquisa'];
        } else {
            echo 'Categoria:';
        }
        ?>
    <?php 
        if (isset($_GET['category'])) {
            echo $_GET['category'];
            $idCategory = $_GET['id_category'];
        }
    ?>
</h2>
<div class="subcategoies_list">
<?php
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $request_uri = $_SERVER['REQUEST_URI'];

    // Parse the URL to get existing parameters
    $url_parts = parse_url($protocol . $host . $request_uri);
    parse_str($url_parts['query'] ?? '', $query_params);

    // Remover o parâmetro 'subcategory' para o link "Todos"
    unset($query_params['subcategory']);
    $new_query_string_without_subcategory = http_build_query($query_params);
    $new_full_url_without_subcategory = $protocol . $host . $url_parts['path'] . '?' . $new_query_string_without_subcategory;

    try {
        $sql_get_subcategory = "SELECT * FROM tb_subcategory WHERE category_id = :subcategory";
        $stmt_get_subcategory = $conn->prepare($sql_get_subcategory);
        $stmt_get_subcategory->bindParam(':subcategory', $idCategory);
        $stmt_get_subcategory->execute();
    } catch (PDOException $e) {
        echo "erro: " . $e->getMessage();
        exit;
    }
    ?>
        <a href="<?php echo htmlspecialchars($new_full_url_without_subcategory); ?>" class="<?php if (!isset($_GET['subcategory'])){echo "active";}?>">Todos</a>
    <?php
    while ($row_get_subcategory = $stmt_get_subcategory->fetch(PDO::FETCH_ASSOC)) {
        // Update the subcategory parameter in the query params
        $query_params['subcategory'] = $row_get_subcategory['subcategory_id'];
        // Rebuild the full URL with updated parameters
        $new_query_string = http_build_query($query_params);
        $new_full_url = $protocol . $host . $url_parts['path'] . '?' . $new_query_string;

        // Determine if this subcategory is active
        $is_active = (isset($_GET['subcategory']) && $_GET['subcategory'] == $row_get_subcategory['subcategory_id']) ? 'class="active"' : '';
    ?>
        <a href="<?php echo htmlspecialchars($new_full_url); ?>" <?php echo $is_active; ?>>
            <?php echo htmlspecialchars($row_get_subcategory['subcategory_name']); ?>
        </a><br>
    <?php
    }
    ?>

</div>
    
<div class="product-grid">
    <?php
        try {
            if (isset($_GET['subcategory'])) {
                $subcategory = $_GET['subcategory'];
                $sql_product = "SELECT tb_product.*, tb_subcategory.subcategory_name, tb_subcategory.category_id, tb_category.category_name, tb_category.category_id FROM tb_product JOIN tb_subcategory ON tb_product.subcategory_id = tb_subcategory.subcategory_id JOIN tb_category ON tb_subcategory.category_id = tb_category.category_id WHERE tb_category.category_id = $idCategory AND tb_product.subcategory_id = $subcategory";
            } else if (isset($_GET['pesquisa'])){
                $pesquisa = $_GET['pesquisa'];
                if ($_GET['categoria'] > 0) {
                    $categoria = $_GET['categoria'];
                    $sql_product = "SELECT tb_product.*, tb_subcategory.subcategory_name, tb_subcategory.category_id, tb_category.category_name, tb_category.category_id FROM tb_product JOIN tb_subcategory ON tb_product.subcategory_id = tb_subcategory.subcategory_id JOIN tb_category ON tb_subcategory.category_id = tb_category.category_id WHERE product_name LIKE '%$pesquisa%' AND tb_category.category_id = '$categoria'";                    
                } else {
                    $sql_product = "SELECT tb_product.*, tb_subcategory.subcategory_name, tb_subcategory.category_id, tb_category.category_name, tb_category.category_id FROM tb_product JOIN tb_subcategory ON tb_product.subcategory_id = tb_subcategory.subcategory_id JOIN tb_category ON tb_subcategory.category_id = tb_category.category_id WHERE product_name LIKE '%$pesquisa%'";     
                }
            } else {
                $sql_product = "SELECT tb_product.*, tb_subcategory.subcategory_name, tb_subcategory.category_id, tb_category.category_name, tb_category.category_id FROM tb_product JOIN tb_subcategory ON tb_product.subcategory_id = tb_subcategory.subcategory_id JOIN tb_category ON tb_subcategory.category_id = tb_category.category_id WHERE tb_category.category_id = $idCategory";
            }
            $stmt_product = $conn->query($sql_product);
        } catch (PDOException $e) {
            echo "Erro ao retornar os produtos".$e->getMessage();
        }

        while ($row_product = $stmt_product->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="product-card">
        <a href="produto.php?id_produto=<?php echo $row_product['product_id'];?>">
            <img src="assets/produtos/<?php echo $row_product['category_id']; ?>/<?php echo $row_product['product_img']; ?>" title="Categoria de Abrasivos" alt="Categoria de Abrasivos">
            <h2><?php echo $row_product['product_name']; ?></h2>
        </a>
    </div>
    <?php
        }
    ?>
</div>