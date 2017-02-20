<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            table{
                width:500px;
                height:100px;
            }
            th,td
            {
                margin: 0;
                text-align: center;
                border-collapse: collapse;
                outline: 1px solid #e3e3e3;
            }

            td
            {
                padding: 5px 10px;
            }

            th
            {
                background: #666;
                color: white;
                padding: 5px 10px;
            }

            td:hover
            {
                cursor: pointer;
                background: #666;
                color: white;
            }
        </style>

        <link href="<?php echo base_url('css\elements.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('js\my_js.js'); ?>"></script>
    </head>
    <!-- Body Starts Here -->
    <body id="body" style="overflow:hidden;">

        <table width="80%" align="center" >
            <p id="p1" align="Center"></p>

            <script>
                
                $( document ).click(function() {
                    document.getElementById("p1").innerHTML = sessionStorage.getItem("data");

                    var dia = document.getElementById("dia");
                    var data = sessionStorage.getItem("data");
                    dia.setAttribute("value", data);
                    
                    var hora = document.getElementById("hora");
                    var data_hora = sessionStorage.getItem("hora");
                    hora.setAttribute("value", data_hora);
                    
                    
                    
                    var texto_consulta = $('#seleciona_consulta').find(":selected").text();
                    
                    var consulta = document.getElementById("consulta");
                    consulta.setAttribute("value", texto_consulta);
                    
                    var texto_medico = $('#seleciona_medico').find(":selected").text();
                    
                    var medico = document.getElementById("medico");
                    medico.setAttribute("value", texto_medico);
                    
                    
                });
                
                function set_hora(hora) {
                        sessionStorage.setItem('hora', hora);
                }
                
                

                
            </script>
            <div id="head_nav">

                <tr>
                    <th></th>
                    <th>9:00 - 10:00</th>
                    <th>10:00 - 11:00</th>
                    <th>11:00 - 12:00</th>
                    <th>12:00 - 13:00</th>
                    <th>13:00 - 14:00</th>
                    <th>14:00 - 15:00</th>
                    <th>15:00 - 16:00</th>
                    <th>16:00 - 17:00</th>
                </tr>
            </div>  

            <tr>
                <th>Horas</th>
                <td><button id="popup" onclick="div_show(); set_hora('9');">Livre</button></td>
                <td><button id="popup" onclick="div_show(); set_hora('10');">Livre</button></td>
                <td><button id="popup" onclick="div_show(); set_hora('11');">Livre</button></td>
                <td><button id="popup" onclick="div_show(); set_hora('12');">Livre</button></td>
                <td><button id="popup" onclick="div_show(); set_hora('13');">Livre</button></td>	
                <td><button id="popup" onclick="div_show(); set_hora('14');">Livre</button></td>	
                <td><button id="popup" onclick="div_show(); set_hora('15');">Livre</button></td>	
                <td><button id="popup" onclick="div_show(); set_hora('16');">Livre</button></td>				
                </div>
            </tr>


        </table>
        <div id="abc">

            <!-- Popup Div Starts Here -->
            <div id="popupContact">
                <!-- Contact Us Form -->
                <form method="POST" action="<?php echo base_url('index.php/Portal_Utente/marcar_consultas');?>" id="form" name="form">
                    <h1 id="close"  onclick ="div_hide()" style="color:red">X</h1>
                    <h2>Marcar Consulta</h3>
                        <hr>
                        <label class="ui-hidden-accessible">Tipo de consulta:</label><br><br>
                        <select id="seleciona_consulta">
                            <option  value="Geral" >Consulta Geral</option>
                            <option  value="Familiar" >Planeamento Familiar</option>
                            <option  value="Especialidade" >Consulta de especialidade</option>
                        </select><br><br>
                        <label for="medico" class="ui-hidden-accessible">Escolha um Médico disponível:</label><br><br>
                        <select id="seleciona_medico" name="nome_medico">
                            <?php 
                                foreach($medicos as $medico) {
                                    echo "<option value='$medico'>" . $medico . "</option>";
                                }
                            
                            
                            ?>

                        </select><br><br>
                        <input id="dia" name="dia" type="hidden" value="">
                        <input id="hora" name="hora" type="hidden" value="">
                        <input id="consulta" name="consulta" type="hidden" value="">
                        <input id="medico" name="medico" type="hidden" value="">
                        <input type="submit" data-inline="true" value="Marcar"><br>
                        </form>


                        </div>
                        <!-- Popup Div Ends Here -->
                        </div>
                        </body>
                        <!-- Body Ends Here -->
                        </html>