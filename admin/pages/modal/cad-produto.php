<div id="modal-produto-cadastro" class="modal">
    <div class="form-card animate">
        <div class="form-card-heading">
            <h2>Cadastro de Produto</h2>
        </div>
        <form method="POST" id="cadastro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="slider-card">
                <p>Passo 1/3</p>
                <div class="input-box">
                    <input type="text" name="nome_produto" id="admin-product-name" class="field" required="required"/>
                    <label for="admin-product-name">Nome do Produto</label>
                    <i class="fa-brands fa-product-hunt icon"></i>
                </div>
                <div class="input-box">
                    <input type="number" name="product-price" id="admin-product-price" class="field" required="required"/>
                    <label for="admin-product-price">Preço do Produto</label>
                    <i class="fa-solid fa-dollar-sign icon"></i>
                </div>     
                <div class="input-box">
                    <input type="text" name="desc-product" id="aadmin-desc-product" class="field" required="required"/>
                    <label for="aadmin-desc-product">Descrição do Produto</label>
                    <i class="fa-solid fa-info icon"></i>
                </div>     
                <div class="input-box">
                    <input type="text" name="esp-product" id="aadmin-esp-product" class="field" required="required"/>
                    <label for="aadmin-esp-product">Especificações do Produto</label>
                    <i class="fa-solid fa-file-lines icon"></i>
                </div> 
                <div class="slider-card-footer">
                    <a></a>
                    <a class="control"  onclick="proximoCard()">Seguinte</a>
                </div>
            </div>
            <div class="slider-card">
                <p>Passo 2/3</p>    
                <div class="input-box">
                    <select name="subcateg-product" id="admin-subcateg-product" autocomplete="off" class="input-login act">
                        <?php 
                            try {
                                $sql_retornar_subcategorias = "SELECT tb_subcategory.*, tb_category.category_name FROM tb_subcategory JOIN tb_category ON tb_category.category_id = tb_subcategory.category_id";
                                $stmt_retornar_subcategorias = $conn->query($sql_retornar_subcategorias);
                            } catch (PDOException $e) {
                                echo "Erro ".$e->getMessage();
                            }

                            while ($row_retornar_subcategorias = $stmt_retornar_subcategorias->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="'.$row_retornar_subcategorias['subcategory_id'].'">'.$row_retornar_subcategorias['subcategory_name'].' ('.$row_retornar_subcategorias['category_name'].')</option>';
                            }
                        ?>
                        
                    </select>
                    <label for="admin-subcateg-product" class="labelatc">Subcategoria do produto</label>
                    <i class="fa-solid fa-folder-open icon"></i>
                </div>
                <div class="input-box">
                    <input type="number" name="quant-stock" id="admin-quant-stock" class="field" required="required"/>
                    <label for="admin-quant-stock">Quant. em Stock</label>
                    <i class="fa-solid fa-boxes-stacked icon"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="vid-product" id="admin-vid-product" class="field" required="required"/>
                    <label for="admin-vid-product">URL do Video do produto</label>
                    <i class="fa-solid fa-video icon"></i>
                </div>
                <div class="input-box">
                    <input type="file" name="doc-product" id="admin-doc-product" value="Foto de Perfil">
                    <label for="admin-doc-product">Documentação do Produto</label>
                    <i class="fa-solid fa-file-pdf icon"></i>
                </div>
                
                <div class="slider-card-footer">
                    <a class="control" onclick="anteriorCard()">Anterior</a>
                    <a class="control" onclick="proximoCard()">Seguinte</a>
                </div>
            </div>
            <div class="slider-card">
                <p>Passo 3/3</p>
                <div class="input-box">
                    <input type="file" name="img-product" id="admin-img-product" value="Foto de Perfil">
                    <label for="admin-img-product">Imagem Principal</label>
                    <i class="fa-solid fa-mountain-sun icon"></i>
                </div>
                
                <div class="input-box">
                    <input type="file" name="img1-product" id="admin-img1-product" value="Foto de Perfil">
                    <label for="admin-img1-product">Imagem Secundária 1</label>
                    <i class="fa-solid fa-mountain-sun icon"></i>
                </div>
                
                <div class="input-box">
                    <input type="file" name="img2-product" id="admin-img2-product" value="Foto de Perfil">
                    <label for="admin-img2-product">Imagem Secundária 2</label>
                    <i class="fa-solid fa-mountain-sun icon"></i>
                </div>
                
                <div class="input-box">
                    <input type="file" name="img3-product" id="admin-img3-product" value="Foto de Perfil">
                    <label for="admin-img3-product">Imagem Secundária 3</label>
                    <i class="fa-solid fa-mountain-sun icon"></i>
                </div>
                <div class="slider-card-footer">
                    <a class="control" onclick="anteriorCard()">Anterior</a>
                    <button name="cadastrar-produto" class="control-width">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="fixed-btn">
        <span onclick="document.getElementById('modal-produto-cadastro').style.display='none'" class="close"><i class="fa-solid fa-house"></i> Cancelar</span>
    </div>
</div>
<script>
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