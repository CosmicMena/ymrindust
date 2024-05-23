<?php 
    include("process.php");
    $titulo = "YMR | Home"; 
    include("includes/header.php");    
    include("includes/nav.php");    
?> 
    <main>
        <?php 
            include("includes/slideshow.php"); 
            include("includes/modal/modal-newsletter.php");
        ?>
        <section class="main-body">
            <section class="main-section">
                <div class="grid-layout">
                    <div class="image-card">
                        <img src="assets/image.png" alt="">
                        <div class="image-card-text">
                            <h2>Geradores</h2>
                            <p>Geradores industriais de última geração na ymrindustrial</p>
                            <a onclick="document.getElementById('modal-ymr').style.display='flex'" class="btn small">Ver Mais</a>
                        </div>
                    </div>
                    <div class="image-card">
                        <img src="assets/image.png" alt="">
                        <div class="image-card-text">
                            <h2>Engrenagens</h2>
                            <p>Temos para sua empresa materiais de suporte</p>
                            <a onclick="document.getElementById('modal-ymr').style.display='flex'" class="btn small">Ver Mais</a>
                        </div>
                    </div>
                    <div class="image-card">
                        <img src="assets/image.png" alt="">
                        <div class="image-card-text">
                            <h2>Geradores</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ill.</p>
                            <a onclick="document.getElementById('modal-ymr').style.display='flex'" class="btn small">Ver Mais</a>
                        </div>
                    </div>
                </div>
                <?php include("includes/scrollprod.php"); ?>
                <?php include("includes/categorygrid.php"); ?>
            </section>
            <aside>
                <?php 
                    include("includes/aside/aside-login.php"); 
                    include("includes/aside/newsletter.php"); 
                    include("includes/aside/aside-slideshow.html"); 
                ?>
            </aside>
        </section>
    </main>
<?php include("includes/footer.php"); ?>