<?php 
    $titulo = "YMR | Client Area"; 
    include("includes/header.php");    
    include("includes/nav.php");    
        try {
            $sql_dados_usuario = "SELECT * FROM tb_client WHERE client_id = ".$idclient;
            $stmt_dados_usuario = $conn->query($sql_dados_usuario);
            $row_dados_usuario = $stmt_dados_usuario->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "erro: ".$e->getMessage();
        }
        $username
?> 
    <main>
        <section class="main-body">
            <section class="main-section">
                <h2 class="section-heading text-center">
                    Área do Cliente
                </h2>
                <div class="user-card">
                    <div class="user-card-menu">
                        <div class="user-card-menu-header">
                            <img src="assets/user.png" alt="">
                            <h2>Nome do Usuário</h2>
                            <span>Usuário Normal</span>
                        </div>
                        <ul>
                            <li><button class="user_data_link active" onclick="abrirDadosUsuario(event, 'user-data')">Dados de Usuário</button></li>
                            <li><button class="user_data_link" onclick="abrirDadosUsuario(event, 'contact')">Info de Contacto</button></li>
                            <li><button class="user_data_link" onclick="abrirDadosUsuario(event, 'privacidade')">Privacide e Segurança</button></li>
                            <li><button class="user_data_link" onclick="abrirDadosUsuario(event, 'notf')">Notificações</button></li>
                        </ul>
                    </div>
                    <div id="contact" class="user-card-data">
                        <div class="user-card-data-header">
                            <h3>Informações de Contacto</h3>
                        </div>
                        <ul class="user-card-data-body">
                            <ul><li><span>Nome:</span> <?php echo $username;?></li></ul>
                            <ul><li><span>Email:</span> <?php echo $row_dados_usuario['client_email'];?></li></ul>
                            <ul><li><span>Telefone:</span> (+244) <?php echo $row_dados_usuario['client_tel'];?></li></ul>
                            <ul><li><span>Forma de comunicação preferida:</span> <?php echo $row_dados_usuario['client_meio'];?></li></ul>
                            <ul><li><span>Pais:</span> <?php echo $row_dados_usuario['client_country'];?></li></ul>
                            <ul><li><span>Cargo:</span> <?php echo $row_dados_usuario['client_cargo'];?></li></ul>
                            <ul><li><span>Empresa:</span><?php echo $row_dados_usuario['client_company'];?></li></ul>
                        </ul>
                        <div class="user-card-data-footer">
                            <a class="btn">Alterar Dados</a>
                        </div>
                    </div>
                    <div id="user-data" class="user-card-data active">
                        <div class="user-card-data-header">
                            <h3>Dados do Usuário</h3>
                        </div>
                        <ul class="user-card-data-body">
                            <ul><li><span>Nome:</span> <?php echo $username;?></li></ul>
                            <ul><li><span>Cliente desde:</span> 05/03/2024</li></ul>
                            <ul><li><span>Último acesso em:</span> 28/04/2024</li></ul>
                            <ul><li><span>Produtos no Carrinho:</span> 0</li></ul>
                            <ul><li><span>Pedidos pendentes:</span> 0</li></ul>
                            <ul><li><span>Compras bem sucedidas:</span> 0</li></ul>
                            <ul><li><span>Compras Canceladas:</span> 0</li></ul>
                        </ul>
                    </div>
                    <div id="privacidade" class="user-card-data">
                        <div class="user-card-data-header">
                            <h3>Password</h3>
                        </div>
                        <ul class="user-card-data-body">
                            <ul><li>Este recurso está inativo de momento!</li></ul>
                        </ul>
                        <div class="user-card-data-footer">
                            <a class="btn">Alterar Password</a>
                        </div>
                    </div>
                    <div id="notf" class="user-card-data">
                        <div class="user-card-data-header">
                            <h3>Notificações</h3>
                        </div>
                        <ul class="user-card-data-body">
                            <ul><li>Veja informaões diretas de nós nesta seção. Receba Ofertas, confirmações de entrega e muito mais</li></ul>
                        </ul>
                    </div>
                </div>
            </section>
        </section>
    </main>
<?php include("includes/footer.php"); ?>