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

    include "config.php";

    /* =================================== CADASTRO =================================== */
    /* =================================== CADASTRO =================================== */
    /* =================================== CADASTRO =================================== */

    if (isset($_POST['cadastrar-usuario'])) {

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $canal = $_POST["canal"];
        $pais = $_POST["pais"];
        $empresa = $_POST["company"];
        $cargo = $_POST["cargo"];
        /*$foto = $_POST["user-pp"];*/
        $foto = "assets/ymrlogo.png";
        $senha = $_POST["pass"];
        $senhac = $_POST["cpass"];

        $sql_checkar_user = "SELECT * FROM tb_client WHERE client_email = :email";
        $stmt_checkar_user = $conn->prepare($sql_checkar_user);
        $stmt_checkar_user->bindParam(':email', $email);
        $stmt_checkar_user->execute();

        if ($stmt_checkar_user->rowCount() > 0) {
            echo " 
                <style>
                .message-sec{
                    display: flex;
                }
                </style>
                <div class='message-sec'>
                    <div class='message'>
                        <p>Este email já está sendo usado, Por favor insira outro!</p>
                        <br>
                        <a href='javascript:self.history.back()'>
                            Tentar de Novo
                        </a>
                    </div>
                </div>";
        } else {
            $passwd = password_hash($senha, PASSWORD_DEFAULT);
            $key = bin2hex(random_bytes(12));

            if ($senha == $senhac) {
                try {
                    $sql_cadastrar_usuario = "INSERT INTO tb_client (client_name, client_email, client_tel, client_meio, client_country, client_company, client_cargo, client_password, client_pp_url) VALUES (:nome, :email, :telefone, :canal, :pais, :empresa, :cargo, :senha, :foto)";
                    
                    $stmt_cadastrar_usuario = $conn->prepare($sql_cadastrar_usuario);
                    $stmt_cadastrar_usuario->bindParam(':nome', $nome);
                    $stmt_cadastrar_usuario->bindParam(':email', $email);
                    $stmt_cadastrar_usuario->bindParam(':telefone', $telefone);
                    $stmt_cadastrar_usuario->bindParam(':canal', $canal);
                    $stmt_cadastrar_usuario->bindParam(':pais', $pais);
                    $stmt_cadastrar_usuario->bindParam(':empresa', $empresa);
                    $stmt_cadastrar_usuario->bindParam(':cargo', $cargo);
                    $stmt_cadastrar_usuario->bindParam(':senha', $passwd);
                    $stmt_cadastrar_usuario->bindParam(':foto', $foto);
                    
                    $stmt_cadastrar_usuario->execute();
                    if ($stmt_cadastrar_usuario) {
                        echo " 
                            <style>
                            .message-sec{
                                display: flex;
                            }
                            </style>
                            <div class='message-sec'>
                                <div class='message'>
                                    <p>Conta Cadastrada com sucesso</p>
                                    <br>
                        "; 
                    ?>
                                    <a onclick="document.getElementById('modal-login').style.display='flex'">
                                        Faça Login
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
                                    <p>Este email já está sendo usado, Por favor insira outro!</p>
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
            } else {
                echo 
                "<style>
                .message-sec{
                    display: flex;
                }
                </style>
                <div class='message-sec'>
                    <div class='message'>
                        <p>Passwords incompatíveis!</p>
                        <br>
                        <a href='javascript:self.history.back()'>
                            Tente de Novo
                        </a>
                    </div>
                </div>";
            }
        }
    }

    /* =================================== CADASTRO =================================== */
    /* =================================== CADASTRO =================================== */
    /* =================================== CADASTRO =================================== */

    /* =================================== LOGIN =================================== */
    /* =================================== LOGIN =================================== */
    /* =================================== LOGIN =================================== */

    if (isset($_POST['login-usuario'])) {

        $email = $_POST["email"];
        $senha = $_POST["pass"];

        try {
            $sql_verificar_usuario = "SELECT * FROM tb_client WHERE client_email = :email";
            $stmt_verificar_usuario = $conn->prepare($sql_verificar_usuario);
            $stmt_verificar_usuario->bindParam(':email', $email);
            $stmt_verificar_usuario->execute();
            
            if ($stmt_verificar_usuario->rowCount() > 0) {
                $row_verificar_usuario = $stmt_verificar_usuario->fetch(PDO::FETCH_ASSOC);
                $password = $row_verificar_usuario['client_password'];
                $decrypt = password_verify($senha, $password);
                if ($decrypt) {
                    session_start();
                    $_SESSION['id'] = $row_verificar_usuario['client_id'];
                    header("location: index.php");
                } else {
                    echo "Senha incorreta.";
                }
            } else {
                echo "Usuário não encontrado.";
            }
        } catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    /* =================================== LOGIN =================================== */
    /* =================================== LOGIN =================================== */
    /* =================================== LOGIN =================================== */

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

    /* =================================== ADDCART =================================== */
    /* =================================== ADDCART =================================== */
    /* =================================== ADDCART =================================== */
   
    if (isset($_POST['addcart'])) {
        $id_produto = limpardado($_POST['idproduto']);
        $id_client = limpardado($_POST['idclient']);
        if (empty($id_client)) {
            $id_client = 1000;
        }
        $quant_prod = limpardado($_POST['quantidade-produto']);
        $status_id = 1;
    
        try {
            $sql_add_cart = "INSERT INTO tb_cart (cart_quant, product_id, client_id, status_id) VALUES (:quant, :produto, :client, :status_id)";
            $stmt_add_cart = $conn->prepare($sql_add_cart);
            $stmt_add_cart->bindParam(':quant', $quant_prod);
            $stmt_add_cart->bindParam(':produto', $id_produto);
            $stmt_add_cart->bindParam(':client', $id_client);
            $stmt_add_cart->bindParam(':status_id', $status_id);
            $stmt_add_cart->execute();
            if ($stmt_add_cart) {
                echo "<style>
                    .message-sec{
                        display: flex;
                    }
                    </style>
                    <div class='message-sec'>
                        <div class='message'>
                            <p>Produto Adicionado ao carrinho!</p>
                            <br>
                            <a href='carrinho.php'>
                                Meu carrinho
                            </a>
                        </div>
                    </div>";
            } else {
                echo "<style>
                    .message-sec{
                        display: flex;
                    }
                    </style>
                    <div class='message-sec'>
                        <div class='message'>
                            <p>Falha ao adicionar produto</p>
                            <br>
                            <a href='carrinho.php'>
                                Meu carrinho
                            </a>
                        </div>
                    </div>";                
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    /* =================================== ADDCART =================================== */
    /* =================================== ADDCART =================================== */
    /* =================================== ADDCART =================================== */

    /* =================================== ENVIAR MENSAGEM =================================== */
    /* =================================== ENVIAR MENSAGEM =================================== */
    /* =================================== ENVIAR MENSAGEM =================================== */
   
    if (isset($_POST['enviar_message'])) {
        $m_nome = limpardado($_POST['ct-name']);
        $m_email = limpardado($_POST['ct-email']);
        $m_message = limpardado($_POST['ct-message']);
        $data_atual = date("Y-m-d");
    
        try {
            $sql_add_message = "INSERT INTO tb_message (message_email, message_nome, message_text, message_data) VALUES (:email, :nome, :mensagem, :data_atual)";
            $stmt_add_message = $conn->prepare($sql_add_message);
            $stmt_add_message->bindParam(':email', $m_email);
            $stmt_add_message->bindParam(':nome', $m_nome);
            $stmt_add_message->bindParam(':mensagem', $m_message);
            $stmt_add_message->bindParam(':data_atual', $data_atual);
            $stmt_add_message->execute();
            if ($stmt_add_message) {
                echo "<style>
                    .message-sec{
                        display: flex;
                    }
                    </style>
                    <div class='message-sec'>
                        <div class='message'>
                            <p>Obrigado pelo seu feedback</p>
                            <br>
                            <a href='contacto.php'>
                                Continuar
                            </a>
                        </div>
                    </div>";
            } else {
                echo "<style>
                    .message-sec{
                        display: flex;
                    }
                    </style>
                    <div class='message-sec'>
                        <div class='message'>
                            <p>Falha ao inviar mensagem</p>
                            <br>
                            <a href='contacto.php'>
                                Tente novamente
                            </a>
                        </div>
                    </div>";                
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    /* =================================== ENVIAR MENSAGEM =================================== */
    /* =================================== ENVIAR MENSAGEM =================================== */
    /* =================================== ENVIAR MENSAGEM =================================== */

    /* =================================== REMOVE FROM CART =================================== */
    /* =================================== REMOVE FROM CART =================================== */
    /* =================================== REMOVE FROM CART =================================== */

    if (isset($_POST['removecart'])) {
        $id_produto = limpardado($_POST['idCarrinho']);
        $id_client = limpardado($_POST['idclient']);
        if (empty($id_client)) {
            $id_client = 1000;
        }
        $sql_delete_from_cart = "DELETE FROM tb_cart WHERE product_id = $id_produto AND client_id = $id_client";
        $stmt_delete_from_cart = $conn->query($sql_delete_from_cart);
    }

    /* =================================== REMOVE FROM CART =================================== */
    /* =================================== REMOVE FROM CART =================================== */
    /* =================================== REMOVE FROM CART =================================== */
?>