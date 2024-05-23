<div class="aside-box">
    <div class="card-form">
        <h2 class="card-heading-text">Categorias</h2>
        <ul class="aside-ul">
            <?php
                if (isset($_GET['id_category'])) {
                    $categoryid = $_GET['id_category'];
                    try {
                        $sql_category_list = "SELECT * FROM tb_category";
                        $stmt_category_list = $conn->query($sql_category_list);
                    } catch (PDOException $e) {
                        echo "Erro ao retornar produtos ".$e->getMessage();
                    }
                    while ($row_category_list = $stmt_category_list->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <li>
                            <a href="categorias.php?category=<?php echo $row_category_list['category_name']; ?>&id_category=<?php echo $row_category_list['category_id']; ?>" class="<?php if ($row_category_list['category_id'] == $categoryid){echo 'active';} ?>">
                                <?php echo $row_category_list['category_name'];?>
                            </a>
                        </li>
                    <?php    
                    }
                } else {
                    try {
                        $sql_category_list = "SELECT * FROM tb_category";
                        $stmt_category_list = $conn->query($sql_category_list);
                    } catch (PDOException $e) {
                        echo "Erro ao retornar produtos ".$e->getMessage();
                    }
                    while ($row_category_list = $stmt_category_list->fetch(PDO::FETCH_ASSOC)) {
            ?>
                        <li><a href="categorias.php?category=<?php echo $row_category_list['category_name']; ?>&id_category=<?php echo $row_category_list['category_id']; ?>"><?php echo $row_category_list['category_name'];?></a></li>
            <?php
                    }
                }
            ?>
        </ul>
    </div>
</div>