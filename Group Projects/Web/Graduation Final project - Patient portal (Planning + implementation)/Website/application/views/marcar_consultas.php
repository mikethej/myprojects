<head>
    <meta charset="utf-8"/>
    <title>DN Calendar</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dncalendar-skin.min.css'); ?>">

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('js/dncalendar.min.js'); ?>"></script>
    <script type="text/javascript">
        var utc = new Date().toJSON().slice(0, 10);
        $(document).ready(function () {
            $('#horas').hide();

            var my_calendar = $("#dncalendar-container").dnCalendar({
                minDate: utc,
                maxDate: "2016-12-02",
                monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outobro", "Novembro", "Dezembro"],
                monthNamesShort: ['Jan', 'FeV', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                dayNames: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                dayNamesShort: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
                dataTitles: {today: 'Hoje'},
                startWeek: 'Segunda',
                dayClick: function (date, view) {
                    sessionStorage.setItem("data", date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear());
                    var dia = sessionStorage.getItem("data");
                    escolherHorario(dia);
                    $('#horario_hora').show();

                }
            });

            // init calendar
            my_calendar.build();


        });
    </script>
    <script>
        $(document).ready(function () {
            $('#medicos').hide();
            $('#horario').hide();
            $('#horario_hora').hide();

            $('#popup').click(function () {
                nome_medico = sessionStorage.getItem('nome_medico');
                data = sessionStorage.getItem('data');
                hora = sessionStorage.getItem('hora');

                string_pedido = "index.php/Portal_Utente/marcar_consulta?=nome_medico=" + nome_medico + "&data=" + data + "&hora=" + hora;

                window.location = string_pedido;

            });

            
        });

        function marcar_consulta() {
            nome_medico = sessionStorage.getItem('nome_medico');
            data = sessionStorage.getItem('data');
            hora = sessionStorage.getItem('hora');
            especialidade = sessionStorage.getItem('especialidade');

            string_pedido = "<?php echo base_url(); ?>index.php/Portal_Utente/marcar_consultas?nome_medico=" + nome_medico + "&data=" + data + "&hora=" + hora + "&especialidade=" + especialidade;

            location.href = string_pedido;
        }


        function escolherEspecialidade(str) {
            if (str == "") {
                document.getElementById("teste").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        sessionStorage.setItem('especialidade', str);
                        document.getElementById("select_medico").innerHTML = xmlhttp.responseText;
                        $('#medicos').show();
                        $('#horario').hide();
                        $('#horario_hora').hide();
                        
                    }
                };
                xmlhttp.open("GET", "<?php echo site_url("index.php/Portal_Utente/get_medicos_especialidade"); ?>?q=" + str, true);
                xmlhttp.send();
            }
        }

        function escolherMedico(str) {
            sessionStorage.setItem('nome_medico', str);
            $('#horario').show();
            $('#horario_hora').hide();
            
        }

        function escolherHorario(data) {
            var nome_medico = sessionStorage.getItem('nome_medico');
            if (data == "") {
                document.getElementById("teste").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        $('#horario_hora').show();
                        document.getElementById("horas_preencher").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", "<?php echo site_url("index.php/Portal_Utente/get_consultas_marcadas_medico"); ?>?data=" + data + "&nome_medico=" + nome_medico, true);
                xmlhttp.send();
            }
        }

    </script>

    <style type="text/css">
        table{
            width:99%;
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
            background: #AAA;
            color: white;
            padding: 5px 10px;
        }

        td:hover
        {
            cursor: pointer;
            background: #DDD;
        }
    </style>
</head>
<body>

    <div class="content">
        <div class="container-fluid">
            <div id="calendario" class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Marcação de Consulta</h4>
                            <p class="category">Aqui pode marcar uma consulta para a especialidade desejada</p>
                        </div>
                        <div class="content">
                            <div id="tipo_consulta">
                                <label>Passo 1 de 4 - Seleccione um tipo de consulta</label>
                                <form>
                                    <select class="form-control" name="especialidade" onchange="escolherEspecialidade(this.value)">
                                        <option value=""></option>
                                        <option value="geral">Clínica Geral</option>
                                        <option value="cardiologia">Cardiologia</option>
                                        <option value="urologia">Urologia</option>
                                    </select>
                                </form>
                            </div>
                            <div id="medicos">
                                <br>
                                <label>Passo 2 de 4 - Seleccione um médico</label>
                                <form>
                                    <select id="select_medico" class="form-control" name="medico" onchange="escolherMedico(this.value)">
                                        <option value=""></option>
                                    </select>

                                </form>
                            </div>

                            <div id="horario">
                                <br>
                                <label>Passo 3 de 4 - Seleccione um dia</label>
                                <div id="dncalendar-container">
                                </div>
                            </div>

                            <div id="horario_hora">
                                <br>
                                <label>Passo 4 de 4 - Escolha uma hora</label>
                                <div id="horas_disponiveis">



                                    <table width="80%" align="center" >
                                        <p id="p1" align="Center"></p>

                                        <script>

                                            $(document).click(function () {
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

                                        <tr id="horas_preencher">				
                                            </div>
                                        </tr>


                                    </table>
                                    <div id="abc">

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">As suas consultas marcadas</h4>
                            <p class="category">Consulte a lista de todas as suas consultas marcadas</p>
                        </div>
                        <div class="content">
                            <?php
                            if (!empty($consultas_marcadas)) {
                                echo "<table class=\"table\">
                                                <thead>
                                                  <tr>
                                                    <th style='color:white'>Nome Médico</th>
                                                    <th style='color:white'>Data</th>
                                                    <th style='color:white'>Hora</th>
                                                    <th style='color:white'>Tipo Consulta</th>
                                                  </tr>
                                                </thead>
                                                <tbody>";
                                $i = 0;
                                foreach ($consultas_marcadas as $consulta) {
                                    $id = $consulta['id'];
                                    $id_utente = $consulta['id_utente'];
                                    $nome_medico = $consulta['nome_medico'];
                                    $data = $consulta['data'];
                                    $hora = $consulta['hora'];
                                    $especialidade = $consulta['especialidade'];
                                    $estado = $consulta['estado'];

                                    if( $estado == 0 ) {
                                        echo "<tr><td>$nome_medico</td><td>$data</td><td>$hora:00</td><td>$especialidade</td></td><td><form method='POST' action='" . base_url('index.php/Portal_Utente/eliminar_consulta')
                                        . "'> <input name='id_consulta' type='hidden' value='$id'></input><input type='submit' class='btn btn-danger' "
                                        . "value='Desmarcar Consulta'></input></form></td></tr>";
                                        $i++;
                                    }
                                }
                            } else {
                                echo "<label>Não tem consultas marcadas.</label>";
                            }
                            
                            echo "</table>";
                            ?>
                            
                        </div>

                    </div>
                </div>
            </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Histórico de consultas</h4>
                            <p class="category">Consulte a lista de todas as suas consultas efectuadas</p>
                        </div>
                        <div class="content">
                            <?php
                            $i = 0;
                            if (!empty($consultas_efectuadas)) {
                                echo "<table class=\"table\">
                                                <thead>
                                                  <tr>
                                                    <th style='color:white'>Nome Médico</th>
                                                    <th style='color:white'>Data</th>
                                                    <th style='color:white'>Hora</th>
                                                    <th style='color:white'>Tipo Consulta</th>
                                                  </tr>
                                                </thead>
                                                <tbody>";
                                
                                foreach ($consultas_efectuadas as $consulta) {
                                    $id = $consulta['id'];
                                    $id_utente = $consulta['id_utente'];
                                    $nome_medico = $consulta['nome_medico'];
                                    $data = $consulta['data'];
                                    $hora = $consulta['hora'];
                                    $especialidade = $consulta['especialidade'];
                                    $estado = $consulta['estado'];

                                    if( $estado == 1 ) {
                                        echo "<tr  style='background-color:rgba(0,255,10,0.25)'><td>$nome_medico</td><td>$data</td><td>$hora:00</td><td>$especialidade</td></td><td><form method='POST' action='" . base_url('index.php/Portal_Utente/eliminar_consulta')
                                        . "'> <input name='id_consulta' type='hidden' value='$id'></input>"
                                        . "<p><i>Compareceu</i></p></form></td></tr>";
                                        $i++;
                                    } else if ($estado == 2 ) {
                                        echo "<tr style='background-color:rgba(255,0,0,0.25);'><td>$nome_medico</td><td>$data</td><td>$hora:00</td><td>$especialidade</td></td><td><form method='POST' action='" . base_url('index.php/Portal_Utente/eliminar_consulta')
                                        . "'> <input name='id_consulta' type='hidden' value='$id'></input>"
                                        . "<p><i>Faltou</i></p></form></td></tr>";
                                        $i++;
                                    }
                                }
                            } else {
                                echo "<label>Não tem histórico de consultas.</label>";
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>

