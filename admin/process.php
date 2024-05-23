<?php

    function limpardado($valor) {
        /*==== Remove whitespace (Espaços desnecessário) ====*/
        $valor = trim($valor);
        /*==== Remove barras invertidas ====*/
        $valor = stripslashes($valor);
        /*==== Impede todo textto de ser lido como código ====*/
        $valor = htmlspecialchars($valor);
        return $valor;
    }

    /* ================================== ADMIN LOGIN =================================== */
    /* ================================== ADMIN LOGIN =================================== */
    /* ================================== ADMIN LOGIN =================================== */

    $tentativasPermitidas = 4;
    $tempoEspera = 600;

    if (!isset($_SESSION['tentativas'])) {
        $_SESSION['tentativas'] = 0;
    }

    if (!isset($_SESSION['ultimo_tempo'])) {
        $_SESSION['ultimo_tempo'] = time();
    }

    if ($_SESSION['tentativas'] >= $tentativasPermitidas && (time() - $_SESSION['ultimo_tempo']) < $tempoEspera) {
        $tempoRestante = $tempoEspera - (time() - $_SESSION['ultimo_tempo']);
        echo "<style>
            .message-sec{
                display: flex;
            }
            </style>
            <div class='message-sec'>
                <div class='message'>
                    <p>Você excedeu o número de tentativas permitidas. Tente novamente em $tempoRestante segundos.</p>
                    <br>
                    <button onclick='fecharDialogo()'>Fechar</button>
                </div>
            </div>";
    } else {
        if (isset($_POST['adminlogin'])) {
            $adminemail = limpardado($_POST['adminemail']);
            $adminsenha = limpardado($_POST['adminsenha']);
    
            try {
                $sql_verificar_usuario = "SELECT * FROM tb_user WHERE user_email = :adminemail";
                $stmt_verificar_usuario = $conn->prepare($sql_verificar_usuario);
                $stmt_verificar_usuario->bindParam(':adminemail', $adminemail);
                $stmt_verificar_usuario->execute();
    
                if ($stmt_verificar_usuario->rowCount() > 0) {
                    $row_verificar_usuario = $stmt_verificar_usuario->fetch(PDO::FETCH_ASSOC);
                    $password = $row_verificar_usuario['user_password'];
                    $decrypt = password_verify($adminsenha, $password);
    
                    if ($decrypt) {
                        $_SESSION['tentativas'] = 0;
                        $_SESSION['ultimo_tempo'] = time();
                        $_SESSION['admin'] = $row_verificar_usuario['user_id'];
                        header("location: index.php");
                    } else {
                        $_SESSION['tentativas'] += 1;
                        $_SESSION['ultimo_tempo'] = time();
                        $tentativasRestantes = $tentativasPermitidas - $_SESSION['tentativas'];
                        echo "<style>
                            .message-sec{
                                display: flex;
                            }
                            </style>
                            <div class='message-sec'>
                                <div class='message'>
                                    <p>Sua senha está incorreta. $tentativasRestantes tentativas restantes.</p>
                                    <br>
                                    <button onclick='fecharDialogo()'>Fechar</button>
                                </div>
                            </div>";
                    }
                } else {
                    echo "Usuário não encontrado.";
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }

    
    

    /* ================================== ADMIN LOGIN =================================== */
    /* ================================== ADMIN LOGIN =================================== */
    /* ================================== ADMIN LOGIN =================================== */

    /* =================================== CADASTRO =================================== */
    /* =================================== CADASTRO =================================== */
    /* =================================== CADASTRO =================================== */

    if (isset($_POST['cadastrar-produto'])) {

        $p_nome = $_POST["nome_produto"];
        $p_price = $_POST["product-price"];
        $p_desc = $_POST["desc-product"];
        $p_esp = $_POST["esp-product"];
        $p_subcateg = $_POST["subcateg-product"];
        $p_stock = $_POST["quant-stock"];
        $p_vid = $_POST["vid-product"];
        $p_doc = "assets/files/".$_POST["doc-product"];
        $p_img = $_POST["img-product"];
        $p_img1 = $_POST["img1-product"];
        $p_img2 = $_POST["img2-product"];
        $p_img3 = $_POST["img3-product"];

        $sql_checkar_produto = "SELECT * FROM tb_product WHERE product_name = :p_nome";
        $stmt_checkar_produto = $conn->prepare($sql_checkar_produto);
        $stmt_checkar_produto->bindParam(':p_nome', $p_nome);
        $stmt_checkar_produto->execute();

        if ($stmt_checkar_produto->rowCount() > 0) {
            echo " 
                <style>
                .message-sec{
                    display: flex;
                }
                </style>
                <div class='message-sec'>
                    <div class='message'>
                        <p>Já Existe um produto com este mesmo nome</p>
                        <br>
                        <a href='javascript:self.history.back()'>
                            Tentar de Novo
                        </a>
                    </div>
                </div>";
        } else {
            try {
                $sql_cadastrar_produto = "INSERT INTO tb_product (product_name, product_desc, product_esp, product_doc, product_vid, product_price, product_stock, product_img, subcategory_id) VALUES (:p_nome, :p_desc, :p_esp, :p_doc, :p_vid, :p_price, :p_stock, :p_img, :p_subcateg)";
                
                $stmt_cadastrar_produto = $conn->prepare($sql_cadastrar_produto);

                $stmt_cadastrar_produto->bindParam(':p_nome', $p_nome);
                $stmt_cadastrar_produto->bindParam(':p_desc', $p_desc);
                $stmt_cadastrar_produto->bindParam(':p_esp', $p_esp);
                $stmt_cadastrar_produto->bindParam(':p_doc', $p_doc);
                $stmt_cadastrar_produto->bindParam(':p_vid', $p_vid);
                $stmt_cadastrar_produto->bindParam(':p_price', $p_price);
                $stmt_cadastrar_produto->bindParam(':p_img', $p_img);
                $stmt_cadastrar_produto->bindParam(':p_stock', $p_stock);
                $stmt_cadastrar_produto->bindParam(':p_subcateg', $p_subcateg);

                $stmt_cadastrar_produto->execute();
                if ($stmt_cadastrar_produto) {
                    $idProduto = $conn->lastInsertId();

                    for ($x = 1; $x < 4; $x++) {
                        $imgTemp = $p_img.$x;

                        $sql_cadastrar_imagem_produto = "INSERT INTO tb_product_img (product_img_url, product_id) VALUES (:img, :id_produto)";

                        $stmt_cadastrar_imagem_produto = $conn->prepare($sql_cadastrar_imagem_produto);
                        $stmt_cadastrar_imagem_produto->bindParam(':img', $imgTemp);
                        $stmt_cadastrar_imagem_produto->bindParam(':id_produto', $idProduto);
                        $stmt_cadastrar_imagem_produto->execute();
                    }

                    echo " 
                        <style>
                        .message-sec{
                            display: flex;
                        }
                        </style>
                        <div class='message-sec'>
                            <div class='message'>
                                <p>Produto Cadastrado com sucesso</p>
                                <br>
                    "; 
                        ?>       
                            <a href='javascript:self.history.back()'>
                                Continuar
                            </a>
                        <?php
                    echo "
                            </div>
                        </div>";
                } else {
                    echo " 
                        <style>
                        .message-sec{
                            display: flex;
                        }
                        </style>
                        <div class='message-sec'>
                            <div class='message'>
                                <p>Aconteceu algum erro ao cadastrar o Produto, por Favor tente de novo</p>
                                <br>
                                <a href='javascript:self.history.back()'>
                                    Tentar de Novo
                                </a>
                            </div>
                        </div>";
                }
            } catch(PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
    }

    /* =================================== CADASTRO =================================== */
    /* =================================== CADASTRO =================================== */
    /* =================================== CADASTRO =================================== */

    /* =================================== LOGOUT =================================== */
    /* =================================== LOGOUT =================================== */
    /* =================================== LOGOUT =================================== */

    if (isset($_GET['logout'])) {
        session_start();
        session_destroy();
        header("location: index.php");
    }

    /* =================================== LOGOUT =================================== */
    /* =================================== LOGOUT =================================== */
    /* =================================== LOGOUT =================================== */
?>
<script>
function fecharDialogo() {
    var elements = document.getElementsByClassName('message-sec');
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = 'none';
    }
}
</script>