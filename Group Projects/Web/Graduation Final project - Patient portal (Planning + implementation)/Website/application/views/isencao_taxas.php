<body>
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Isenção de Taxas Moderadoras</h4>
                            </div>
                            <div  class="content">
                                <p>Através do Portal das Finanças, mediante login pessoal, ou através do serviço de finanças da respetiva área de residência, o utente pode consultar os rendimentos considerados no apuramento da condição de insuficiência económica e o respetivo cálculo do rendimento médio mensal, para efeitos de isenção de taxas moderadoras e de outros encargos de que dependa o acesso às prestações de saúde.</p>
                                <p id="justificado">Consideram-se em situação de insuficiência económica para efeitos de isenção de pagamento de taxas moderadoras e de outros encargos de que dependa o acesso às prestações de saúde os utentes que integrem agregado familiar cujo rendimento médio mensal, dividido pelo número de pessoas a quem cabe a direção do agregado familiar, seja igual ou inferior a 628,83 Euros (1,5 vezes o valor do Indexante dos Apoios Sociais).</p>
                                <p id="justificado">Os critérios de verificação da condição de insuficiência económica dos utentes encontram-se estabelecidos na Portaria n.º 311-D/2011, de 27 de dezembro.</p>
                                <p id="justificado">A concessão indevida de benefícios por facto imputável ao utente determina a perda da possibilidade de concessão da isenção do pagamento de taxas moderadoras durante um período de 24 meses.</p>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo base_url('index.php/Portal_Utente/isencao_taxas');?>">
                                    <hr>
                                    <h4 class="title"> Informação do Requerente</h4>
                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nome completo*:</label>
                                                <input disabled name="nome" type="text" class="form-control" placeholder="" value="<?php echo $this->Mymodel->get_user_nome_completo($this->dx_auth->get_user_id());?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Data Nascimento*:</label>
                                                <input disabled name="data_nas" type="date" class="form-control" placeholder="" value="<?php echo $this->Mymodel->get_user_data_nascimento($this->dx_auth->get_user_id());?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Número de Utente*:</label>
                                                <input disabled name="nu_utente" type="number" class="form-control" placeholder="" value="<?php echo $this->dx_auth->get_username();?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>NIF*:</label>
                                                <input name="nif" type="number" class="form-control" placeholder="" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Número Segurança Social*:</label>
                                                <input name="nu_seg_social" type="number" class="form-control" placeholder="" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Morada*:</label>
                                                <input name="morada" type="text" class="form-control" placeholder="" value="" required>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Código Postal*:</label>
                                                <input name="cod_postal" type="text" class="form-control" placeholder="" value="" required>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Localidade*:</label>
                                                <input name="localidade" type="text" class="form-control" placeholder="" value="" required>
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <label>Telefone*:</label>
                                                <input name="telefone" type="number" class="form-control" placeholder="" value="" required>
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="email" class="form-control" placeholder="" value="" required>
                                            </div>
                                        </div>
                                    <strong> Os campos assinalados com * são de preenchimento obrigatório</strong>
                                   <button type="submit" class="btn btn-info btn-fill pull-right">Submeter Pedido</button>
                                    <div class="clearfix"></div>
                                </form> 
                                
                                
                        </div>
                    </div>
                </div>
            </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Os seus pedidos de isenção pendentes</h4>
                            </div>
                            
                            <div class="content">
                                        <?php 
                                        if(!empty($pedidos)) {
                                            
                                            foreach($pedidos as $pedido) {
                                                $num_utente = $pedido['username'];
                                                $nome = $pedido['nome'];
                                                $data_nascimento = $pedido['data_nascimento'];
                                                $nif =  $pedido['nif'];  
                                                $nu_seg_social = $pedido['nu_seg_social'];
                                                $morada = $pedido['morada'];
                                                $cod_postal = $pedido['cod_postal'];
                                                $localidade = $pedido['localidade'];
                                                $telefone = $pedido['telefone'];
                                                $email = $pedido['email'];
                                                $elegivel = $pedido['elegibilidade'];

                                                if($elegivel == "aceite") {
                                                    echo "<div style=\"background-color:rgba(0,255,10,0.25);padding:20px;border-radius:6px;box-shadow: 0px 2px 3px rgba(0,0,0,0.25);\">".
                                                     "<h5 class=\"title\"><strong>Este pedido foi aceite</strong></h5><br>";
                                                } else if($elegivel == "pendente") {
                                                    echo "<div style=\"background-color:rgba(95,158,160,0.1);padding:20px;border-radius:6px;box-shadow: 0px 2px 3px rgba(0,0,0,0.25)\">".
                                                     "<h5 class=\"title\"><strong>Este pedido está pendente</strong></h5><br>";
                                                } else if($elegivel == "recusado") {
                                                    echo "<div style=\"background-color:rgba(255,0,0,0.25);padding:20px;border-radius:6px;box-shadow: 0px 2px 3px rgba(0,0,0,0.25)\">".
                                                     "<h5 class=\"title\"><strong>Este pedido foi recusado</strong></h5><br>";
                                                }
                                                
                                                    echo "<label><strong>Nome: </strong>$nome</label><br>".
                                                     "<label><strong>Nº Utente: </strong>$num_utente</label><br>".
                                                     "<label><strong>Data Nascimento: </strong>$data_nascimento</label><br>".
                                                     "<label><strong>NIF: </strong>$nif</label><br>".
                                                     "<label><strong>Nº Segurança Social: </strong>$nu_seg_social</label><br>".
                                                     "<label><strong>Morada: </strong>$morada</label><br>".
                                                     "<label><strong>Código Postal: </strong>$cod_postal</label><br>".
                                                     "<label><strong>Localidade: </strong>$localidade</label><br>".
                                                     "<label><strong>Telefone: </strong>$telefone</label><br>".
                                                     "<label><strong>Email: </strong>$email</label><br>".
                                                     "</div>".
                                                     "<br><hr>";

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
