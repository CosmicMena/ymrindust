<div id="modal-login" class="modal">
    <div class="form-card animate">
        <div class="form-card-heading">
            <h2>LOGIN</h2>
        </div>
        <form method="POST" id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="input-box">
                <input type="email" name="email" id="ml-email" class="field" required="required"/>
                <label for="ml-email">Digite o Seu Email</label>
                <i class="fa-solid fa-envelope icon"></i>
            </div>
            <div class="input-box">
                <input type="password" name="pass" id="ml-pass" class="field" required="required"/>
                <label for="ml-pass">Digite a sua password</label>
                <i class="fa-solid fa-lock icon"></i>
            </div>
            <button name="login-usuario">Entrar</button>
        </form>
        <p class="form-card-botton">Não tem uma conta? <a class="toogle" onclick="document.getElementById('modal-login').style.display='none';document.getElementById('modal-cadastro').style.display='flex'">Crie Uma</a></p>
    </div>

    <div class="fixed-btn">
        <span onclick="document.getElementById('modal-login').style.display='none'" class="close"><i class="fa-solid fa-house"></i> Cancelar</span>
    </div>
</div>