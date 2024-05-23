<?php 
    $titulo = "YMR | Categorias"; 
    include("includes/header.php");    
    include("includes/nav.php");    
?> 
<main>
    <section class="main-body">
        <section class="main-section">    
            <?php include("includes/productgrid.php"); ?>
            <?php include("includes/scrollprod.php"); ?>
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