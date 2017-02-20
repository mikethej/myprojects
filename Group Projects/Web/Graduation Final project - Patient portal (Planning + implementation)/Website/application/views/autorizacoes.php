         <script language="javascript">
        function toggleState(item){
           if(item.className == "on") {
              item.className="off";
           } else {
              item.className="on";
           }
        }
     </script>
<body>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Defina aqui autorizações</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo base_url('index.php/Portal_Utente/autorizacoes');?>">
                                <table class="table-responsive">
                                    <?php
                                    
                                    echo "<tr>".
                                     "<td>".
                                     "<p class=\"text-muted\" id=\"espacamento\">Autorizo os profissionais de saúde a consultarem os registos inseridos por mim.</p>".
                                     "    </td>".
                                     "    <td>".
                                     "<input type=\"checkbox\"  name=\"au_part_reg_ins_user\""; if($autorizacoes[0]['au_part_reg_ins_user'] == 1) { echo "checked";} echo "></input>".
                                     "   </td>".
                                     "</tr>".
                                     "<tr>".
                                     "<td>".
                                     "<p class=\"text-muted\" id=\"espacamento\">Autorizo os profissionais de saúde consultem a minha informação clínica registada nos diversos sistemas do Serviço Nacional de Saúde, através da Plataforma de Dados de Saúde.</p>".
                                     "   </td>".
                                     "   <td>".
                                     "            <input type=\"checkbox\" name=\"au_part_reg_clinicos\""; if($autorizacoes[0]['au_part_reg_clinicos'] == 1) { echo "checked";} echo "></input>".

                                     "</td>".
                                    "</tr>".
                                    "<tr>".
                                    "<td>".
                                    "<p class=\"text-muted\" id=\"espacamento\">Quero ser notificado quando um profissional de saúde credenciado consulte algum dos meus registos nesta plataforma.</p>".
                                    "</td>".
                                    "<td>".
                                    "<input type=\"checkbox\" name=\"au_notificacoes\""; if($autorizacoes[0]['au_notificacoes'] == 1) { echo "checked";} echo "></input>".
                                    "</td>".
                                    "</tr>".
                                    "<tr>".
                                    "<td>".
                                    "<p class=\"text-muted\" id=\"espacamento\">Concordo que parte do meu Resumo Clínico Único de Utente seja apresentado/transferido a um profissional de saúde credenciado num dos países que integram o projeto epSOS no contexto em que me sejam prestados cuidados de saúde.</p>".
                                
                                    "</td>".
                                        "<td>".
                                                 "<input type=\"checkbox\" name=\"au_estrangeiro\""; if($autorizacoes[0]['au_estrangeiro'] == 1) { echo "checked";} echo "></input>".
                                                         "<input type=\"hidden\" name=\"test_input\" value=\"1\"".
                                        "</td>".
                                    "</tr>";
                                    ?>
                                </table>
                                      <?php
                                   echo "<button type=\"submit\" class=\"btn btn-info btn-fill pull-right\">Guardar alterações</button><br><br>";
                                     ?>
                                </form>
                            </div>
                            
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
       <footer class="footer">
                <p class="copyright pull-right">
                  Grupo007
                </p>
        </footer>


</body>
