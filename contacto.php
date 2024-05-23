<?php 
    include("process.php");
    $titulo = "YMR | Contacte-nos"; 
    include("includes/header.php");    
    include("includes/nav.php");    
?> 
    <main>
        <div class="contact-header">
            <img src="assets/hero/contact.png" alt="">
        </div>
        <div class="contact-div">
            <div class="left">
                <h3>Deixe uma mensagem</h3>
                <p>Estamos aqui para o atender</p>
                <form method="POST" id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="input-box">
                        <input type="text" name="ct-name" id="ct-name" class="field" required="required"/>
                        <label for="ct-name">Nome</label>
                        <i class="fa-solid fa-envelope icon input-icon"></i>
                    </div>
                    <div class="input-box">
                        <input type="email" name="ct-email" id="ct-email" class="field" required="required"/>
                        <label for="ct-email">Email</label>
                        <i class="fa-solid fa-envelope icon input-icon"></i>
                    </div>
                    <div class="input-box textarea">
                        <textarea name="ct-message" id="ct-mensagem" autocomplete="off" required class="input-contact" cols="10" rows="5"></textarea>
                        <label for="mensagem" class="label-textarea">Deixe uma mensagem</label>
                        <i class="icon fas fa-comment input-icon-textarea"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" value="Enviar Mensagem" name="enviar_message">
                    </div>
                </form>
            </div>  
            <div class="right">
                <h3>Onde estamos</h3>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2568.583131626807!2d13.268156303884995!3d-9.006259679049522!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a521dae4d68e61d%3A0xa481155a0d8a5a03!2sEdif%C3%ADcio%20X34!5e0!3m2!1spt-PT!2sao!4v1705056791131!5m2!1spt-PT!2sao" width="100%" height="305" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="icons">
                    <a href="https://www.facebook.com/ymr.industrial.9?_rdc=2&_rdr" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/ymrindustrial/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://web.whatsapp.com/send?phone=937%20590%20360" target="_blank"  class="extend"><i class="fa-brands fa-whatsapp"></i></i></a>
                    <a href="https://www.linkedin.com/company/ymr-industrial/about/" target="_blank" class="extend"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="faqs-div">
            <div class="section-heading">
                <h2>Perguntas Frequentes</h2>
            </div>
            <div class="faq">
                <div class="faq-h1">
                    Onde Vejo os Preços?
                </div>
                <div class="faq-p">
                    <p>Os nossos preços são entrgues quando o cliente faz o pedido de orçameto dos produtos nos seu carrinho. Enviamos os dados do orçamento ao seu email ou whatsapp e damos segmento ao processo de compra</p>
                    
                </div>
            </div>
        </div>
        <script>
            const faq = document.getElementsByClassName('faq');
            for (i = 0; i<faq.length; i++) {
                faq[i].addEventListener('click', function() {
                    this.classList.toggle('active');
                })
            }
        </script>
    </main>
<?php include("includes/footer.php"); ?>