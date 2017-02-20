<body>
    <script>
        function confirmar_submissao() {
            return confirm("Tem a certeza que deseja pedir renovação de medicação para o medicamento seleccionado?");
}
</script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Os seus medicamentos</h4>
                            <p class="category">Lista dos medicamentos que estão assiciados a si. Aqui pode fazer pedidos de renovação de medicação</p>
                        </div>
                        <div  class="content">
                            <?php
                            
                            if (!empty($medicamentos)) {
                   
                                echo "<table class=\"table\">
                                                <thead>
                                                  <tr>
                                                    <th>Nome medicamento</th>
                                                    <th>Dosagem</th>
                                                    <th>Forma Farmaceutica</th>
                                                    <th>DCI</th>
                                                    <th>Nº Unidades por embalagem</th>
                                                    <th>Titular AIM</th>
                                                    <th>Preço por embalagem</th>
                                                  </tr>
                                                </thead>
                                                <tbody>";
                                foreach ($medicamentos as $medicamento) {
                                    $id_receita = $medicamento['id_receita'];//id da receita
                                    $data = $medicamento['data'];
                                    $medi = $medicamento['medicamento'];
                                    $dosagem = $medicamento['dosagem'];
                                    $forma_farmaceutica = $medicamento['forma_farmaceutica'];
                                    $dci = $medicamento['dci'];
                                    $embalagem_unidades = $medicamento['embalagem_unidades'];
                                    $titular_aim = $medicamento['titular_aim'];
                                    $preco_embalagem = $medicamento['preco_embalagem'];
                                    $botao = "<input type='submit' class='btn btn-info btn-fill pull-right' value='Pedir renovação'></input>";
                                   

                                    foreach ($pedidos_renovacao as $pedido) {
                                        
                                        $estado = $pedido['estado'];
                                        $id = $pedido['id'];
                                        if($pedido['id_receita'] == $id_receita ) {
                                            if ($estado == 'pendente') {
                                                $botao = '<i>Pedido pendente</i>';
                                            } else {
                                                $botao = "<input type='submit' class='btn btn-info btn-fill pull-right' value='Pedir renovação'></input>";
                                            }
                                        }
                                    }



                                    echo "<tr><td align='center';>$medi</td><td align='center';>$dosagem</td><td align='center';>$forma_farmaceutica</td><td align='center';>$dci</td><td align='center';>$embalagem_unidades</td><td align='center';>$titular_aim</td><td align='center';>$preco_embalagem €</td></td><td><form method='POST' onclick='return confirmar_submissao(this);' action='"
                                    . base_url('index.php/Portal_Utente/set_renovacao')
                                    . "'> <input name='id_receita' type='hidden' value='$id_receita'></input></input>"
                                    . "$botao</form></td></tr></tbody>";
                                    
                                }
                                echo "</table>";
                            } else {
                                echo "<label>Não possui medicamentos associados.</label>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Os seus pedidos de renovação de medicação</h4>
                            <p class="category">Consulte o estado e a lista de todos os pedidos de renovação de medicação</p>
                        </div>

                        <div class="content">
                            <?php
                            if (!empty($pedidos_renovacao)) {

                                foreach ($pedidos_renovacao as $pedido) {
                                    $id_receita = $pedido['id_receita'];
                                    $medi = $pedido['medicamento'];
                                    $data = $pedido['data'];
                                    $dosagem = $pedido['dosagem'];
                                    $forma_farmaceutica = $pedido['forma_farmaceutica'];
                                    $dci = $pedido['dci'];
                                    $embalagem_unidades = $pedido['embalagem_unidades'];
                                    $titular_aim = $pedido['titular_aim'];
                                    $preco_embalagem = $pedido['preco_embalagem'];
                                    $estado = $pedido['estado'];
                                    
                                    if( $estado ) {
                                        if ($estado == "aceite") {
                                            $botao = "<form method='POST' action='" . base_url('index.php/Portal_Utente/gerar_receita') . "' target='_blank'><input name='id_receita' type='hidden' value='$id_receita'</input><input type='submit' class='btn btn-info btn-fill pull-right' value='Imprimir receita'></input></form>";
                                            echo "<div style=\"background-color:rgba(0,255,10,0.25);padding:20px;border-radius:6px;box-shadow: 0px 2px 3px rgba(0,0,0,0.25);\">" .
                                            "<h5 class=\"title\"><strong>Este pedido foi aceite. $botao</strong></h5><br>";
                                            
                                        } else if ($estado == "pendente") {
                                            echo "<div style=\"background-color:rgba(95,158,160,0.1);padding:20px;border-radius:6px;box-shadow: 0px 2px 3px rgba(0,0,0,0.25)\">" .
                                            "<h5 class=\"title\"><strong>Este pedido está pendente</strong></h5><br>";
                                        } else if ($estado == "recusado") {
                                            echo "<div style=\"background-color:rgba(255,0,0,0.25);padding:20px;border-radius:6px;box-shadow: 0px 2px 3px rgba(0,0,0,0.25)\">" .
                                            "<h5 class=\"title\"><strong>Este pedido foi recusado</strong></h5><br>";
                                        }

                                        echo "<label><strong>Nome do medicamento: </strong>$medi</label><br>" .
                                        "<label><strong>Data do pedido: </strong>$data</label><br>" .
                                        "<label><strong>Dosagem: </strong>$dosagem</label><br>" .
                                        "<label><strong>Forma farmaceutica: </strong>$forma_farmaceutica</label><br>" .
                                        "<label><strong>Nº de unidades por embalagem: </strong>$embalagem_unidades</label><br>" .
                                        "</div>" .
                                        "<br><hr>";
                                        }
                                    }
                            } else {
                                echo "<label>Não tem pedidos de isenção pendentes.</label>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
