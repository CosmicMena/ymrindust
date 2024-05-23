<?php 
    if(isset($_SESSION['id'])) {
?>
        <style>
            #login-aside {
                display: none;
            }
        </style>
<?php
    }
?>
<div class="aside-box" id="login-aside">
    <div class="card-form">
        <h2 class="card-heading-text">Login</h2>
        <form method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="input-box">
                <input type="email" name="email" id="hm-email" autocomplete="off" required>
                <label for="hm-email">Seu Email</label>
                <i class="input-icon fas fa-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" name="pass" id="hm-password" autocomplete="off" required>
                <label for="password">Password</label>
                <i class="input-icon fa-solid fa-lock"></i>
            </div>
            <div class="input-box">
                <input type="submit" name="login-usuario">
            </div>
        </form>
        <span>Caso não tenha uma conta <a href="signup.php">Crie uma</a></span>
    </div>
</div>