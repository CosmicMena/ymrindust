<div id="modal-ymr" class="modal">
    <div class="form-card animate">
        <div class="form-card-heading">
            <h2>YMR Industrial</h2>
            <p>Brevemente na YMR Pesados. </p>
        </div>
        <form method="POST" id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="input-box">
                <input type="email" name="email" id="nw-email" class="field" required="required"/>
                <label for="ml-email">Digite o Seu Email</label>
                <i class="fa-solid fa-envelope icon"></i>
            </div>
            <button name="newsletter">Entrar</button>
        </form>
        <p class="form-card-botton">Para mais informções assine à nossa newsletter colocando o seu email acima e não perca nenhuma oferta</p>
    </div>
    <div class="fixed-btn">
        <span onclick="document.getElementById('modal-ymr').style.display='none'" class="close"><i class="fa-solid fa-house"></i> Cancelar</span>
    </div>
</div>