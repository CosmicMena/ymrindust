<div id="modal-to-do" class="modal">
    <div class="form-card animate">
        <div class="form-card-heading">
            <h2>Lembretes</h2>
        </div>
        <form method="POST" id="to-do">
            <div class="input-box">
                <input type="text" name="to-do" id="admin-to-do" class="field" required="required"/>
                <label for="admin-to-do">Escreva o lembrete</label>
                <i class="fa-solid fa-list icon"></i>
            </div>
            <button name="to-do-usuario">Adicionar</button>
        </form>
        <p class="form-card-botton">É uma boa prática organizar o amanhã hoje</p>
    </div>

    <div class="fixed-btn">
        <span onclick="document.getElementById('modal-to-do').style.display='none'" class="close"><i class="fa-solid fa-house"></i> Cancelar</span>
    </div>
</div>
        
        <div class="heading-sec">
            <h2>Visão Geral</h2>
        </div>
        <section class="grid-section">
            <div class="data-card">
                <i class="fa-solid fa-money-bill-transfer"></i>
                <div class="data-card-text">
                    <h3>1641</h3>
                    <p>Total de vendas Confirmadas</p>
                </div>
            </div>
            <div class="data-card">
                <i class="fa-regular fa-eye"></i>
                <div class="data-card-text">
                    <h3>14831</h3>
                    <p>Total de visitas à página</p>
                </div>
            </div>
            <div class="data-card">
                <i class="fa-solid fa-magnifying-glass"></i>
                <div class="data-card-text">
                    <h3>1641</h3>
                    <p>Total de vendas Confirmadas</p>
                </div>
            </div>
            <div class="data-card">
                <i class="fa-solid fa-money-bill-transfer"></i>
                <div class="data-card-text">
                    <h3>1641</h3>
                    <p>Total de vendas Confirmadas</p>
                </div>
            </div>
        </section>
        <section class="flex-section">
            <div class="min-table">
                <h3 class="content-heading">Pedidos Recentes</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td-img">
                                <img src="../assets/user.png" alt="">
                                <p>Jonh Due</p>
                            </td>
                            <td>12-4-2024</td>
                            <td>
                                <p class="status-p status-1">Pendente</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-img">
                                <img src="../assets/user.png" alt="">
                                <p>Jonh Due</p>
                            </td>
                            <td>12-4-2024</td>
                            <td>
                                <p class="status-p status-1">Pendente</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-img">
                                <img src="../assets/user.png" alt="">
                                <p>Jonh Due</p>
                            </td>
                            <td>12-4-2024</td>
                            <td>
                                <p class="status-p status-1">Pendente</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="to-do-list">
                <h3 class="content-heading">Lembretes</h3>
                <ul>
                    <li class="to-do-li-3">
                        Enviar a proposta para a Greinger
                    </li>
                    <li class="to-do-li-3">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam itaque commodi unde rerum nesciunt dicta vitae ullam praesentium a voluptatem obcaecati quae neque, delectus vero dignissimos amet culpa voluptatibus totam?
                    </li>
                    </li>
                    <li class="to-do-li-3">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam itaque commodi unde rerum nesciunt dicta vitae ullam praesentium a voluptatem obcaecati quae neque, delectus vero dignissimos amet culpa voluptatibus totam?
                    </li>
                    </li>
                    <li class="to-do-li-3">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam itaque commodi unde rerum nesciunt dicta vitae ullam praesentium a voluptatem obcaecati quae neque, delectus vero dignissimos amet culpa voluptatibus totam?
                    </li>
                </ul>
                <div class="to-do-list-bottom">
                    <button onclick="document.getElementById('modal-to-do').style.display='flex'">Adicionar</button>
                </div>
            </div>
        </section>