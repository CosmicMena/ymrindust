<div id="modal-cadastro" class="modal">
    <div class="form-card animate">
        <div class="form-card-heading">
            <h2>Cadastro</h2>
        </div>
        <form method="POST" id="cadastro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="slider-card">
                <p>Passo 1/3</p>
                <div class="input-box">
                    <input type="text" name="nome" id="mc-name" class="field" required="required"/>
                    <label for="mc-name">Digite o Seu Nome</label>
                    <i class="fa-solid fa-user icon"></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" id="mc-email" class="field" required="required"/>
                    <label for="mc-email">Digite o Seu Email</label>
                    <i class="fa-solid fa-envelope icon"></i>
                </div>     
                <div class="input-box">
                    <input type="tel" name="telefone" id="mc-telefone" class="field" required="required"/>
                    <label for="mc-telefone">Digite o seu Telefone</label>
                    <i class="fa-solid fa-phone icon"></i>
                </div>     
                <div class="input-box">
                    <select name="canal" id="mc-canal" autocomplete="off" class="input-login act">
                        <option value="whatsapp">Whatsapp</option>
                        <option value="email">E-mail</option>
                    </select>
                    <label for="mc-canal" class="labelatc">Forma de Comunicação preferida</label>
                    <i class="icon fa-brands fa-telegram"></i>
                </div>
                <div class="slider-card-footer">
                    <a></a>
                    <a class="control"  onclick="proximoCard()">Seguinte</a>
                </div>
            </div>
            <div class="slider-card">
                <p>Passo 2/3</p>
                <div class="input-box">                   
                    <select name="pais" id="mc-pais" autocomplete="off">
                        <option value="Angola">Angola</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Moçambique">Moçambique</option>
                        <option value="Guiné Equatorial">Guiné Equatorial</option>
                        <option value="Namíbia">Namíbia</option>
                        <option value="Zâmbia">Zâmbia</option>
                        <option value="República Democrática do Congo">República Democrática do Congo</option>
                        <option value="Namíbia">Namíbia</option>
                        <option value="Namíbia">Namíbia</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="China">China</option>
                        <option value="Japão">Japão</option>
                        <option value="Alemanha">Alemanha</option>
                        <option value="Índia">Índia</option>
                        <option value="Outro">Outro</option>
                    </select>
                    <label for="mc-pais">País</label>
                    <i class="fa-solid fa-earth-americas icon"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="company" id="mc-company" class="field" required="required"/>
                    <label for="mc-company">Empresa (Opcional)</label>
                    <i class="fa-solid fa-building icon"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="cargo" id="mc-cargo" class="field" required="required"/>
                    <label for="mc-cargo">Seu cargo</label>
                    <i class="fa-solid fa-circle-user icon"></i>
                </div>
                <div class="input-box">
                    <input type="file" name="user-pp" id="mc-user-pp" value="Foto de Perfil">
                    <label for="mc-user-pp">Foto de Perfil</label>
                    <i class="fa-solid fa-mountain-sun icon"></i>
                </div>
                
                <div class="slider-card-footer">
                    <a class="control" onclick="anteriorCard()">Anterior</a>
                    <a class="control" onclick="proximoCard()">Seguinte</a>
                </div>
            </div>
            <div class="slider-card">
                <p>Passo 3/3</p>
                <div class="input-box">
                    <input type="password" name="pass" id="mc-pass" class="field password" required="required"/>
                    <label for="mc-pass">Digite uma password</label>
                    <i class="toggle fa-solid fa-lock icon"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="cpass" id="mc-cpass" class="field password" required="required"/>
                    <label for="mc-cpass">Confirme a sua password</label>
                    <i class="fa-solid fa-lock icon toggle"></i>
                </div>
                <div class="slider-card-footer">
                    <a class="control" onclick="anteriorCard()">Anterior</a>
                    <button name="cadastrar-usuario" class="control-width">Enviar</button>
                </div>
            </div>
        </form>
        <p class="form-card-botton">Já tem uma conta? <a onclick="document.getElementById('modal-login').style.display='flex';document.getElementById('modal-cadastro').style.display='none'">Faça Loin</a></p>
    </div>

    <div class="fixed-btn">
        <span onclick="document.getElementById('modal-cadastro').style.display='none'" class="close"><i class="fa-solid fa-house"></i> Cancelar</span>
    </div>
</div>
<script>
    const toggle = document.querySelector(".toggle"),
    input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
        if (input.type === "password") {
            input.type = "text";
            toggle.classList.replace("fa-eye-slash", "fa-eye");
        } else {
            input.type = "password";
        }
    })

    var cards = document.querySelectorAll('.slider-card');
    var cardAtual = 0;
    function mostrarCard(index) {
        if (index < 0) {
            cardAtual = cards.length - 1;
        } else if (index == cards.length) {
            cardAtual = 0;
        }

        for (var i = 0; i < cards.length; i++) {
            cards[i].style.display = 'none';
        }

        cards[cardAtual].style.display = 'grid';
    }
    function anteriorCard() {
        cardAtual--;
        mostrarCard(cardAtual);
    }

    function proximoCard() {
        cardAtual++;
        mostrarCard(cardAtual);
    }

    mostrarCard(cardAtual);
</script>

                
