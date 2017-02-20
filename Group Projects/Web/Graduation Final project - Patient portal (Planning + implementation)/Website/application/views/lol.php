
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
                            $id = $medicamento['id'];
                            $medi = $medicamento['medicamento'];
                            $dosagem = $medicamento['dosagem'];
                            $forma_farmaceutica = $medicamento['forma_farmaceutica'];
                            $dci = $medicamento['dci'];
                            $embalagem_unidades = $medicamento['embalagem_unidades'];
                            $titular_aim = $medicamento['titular_aim'];
                            $preco_embalagem = $medicamento['preco_embalagem'];
                            

                            echo "<tr><td align='center';>$medi</td><td align='center';>$dosagem</td><td align='center';>$forma_farmaceutica</td><td align='center';>$dci</td><td align='center';>$embalagem_unidades</td><td align='center';>$titular_aim</td><td align='center';>$preco_embalagem €</td></td><td><form method='POST' target='_blank' action='"
                            . base_url('index.php/Portal_Utente/gerar_receita')
                            . "'> <input name='id_receita' type='hidden' value='$id'></input><input type='submit' class='btn btn-info btn-fill pull-right' "
                            . "value='Imprimir Receita'></input></form></td></tr></tbody></table>";
                        }
                    } else {
                        echo "<label>Não possui medicamentos associados.</label>";
                    }
                    ?>