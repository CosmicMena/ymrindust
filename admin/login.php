<?php 
    $titulo = "YMR | Admin Login"; 
    $adminpage = 1;
    include("includes/header.php");     
    include("process.php");     
?> 
<main class="admin-login">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-header">
            <img src="../assets/ymrsvg.png" alt="">
            <h2>Tela de Admin YMR</h2>
        </div>
        <div class="inputBox">
            <input type="email" name="adminemail" id="adminemail" required="required">
            <span>Email Admin</span>
        </div>
        <div class="inputBox">
            <input type="password" name="adminsenha" id="adminsenha" required="required">
            <span>Senha Admin</span>
        </div>
        <input type="submit" value="Entrar" name="adminlogin">
        <div class="form-footer">
            <span>Área destinada apenas à administradores do sistema!</span>
        </div>
    </form>
</main>
