<h2 class="section-heading">
    Categorias
</h2>
<div class="product-grid">
    <?php
        try {
            $sql_category = "SELECT * FROM tb_category";
            $stmt_category = $conn->query($sql_category);
        } catch (PDOException $e) {
            echo "Erro ao retronar as categorias".$e->getMessage();
        }

        while ($row_category = $stmt_category->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="product-card">
        <a href="categorias.php?category=<?php echo $row_category['category_name']; ?>&id_category=<?php echo $row_category['category_id']; ?>">
            <img src="<?php echo $row_category['category_img']; ?>" title="Categoria de Abrasivos" alt="Categoria de Abrasivos">
            <h2><?php echo $row_category['category_name']; ?></h2>
        </a>
    </div>
    <?php
        }
    ?>
</div>