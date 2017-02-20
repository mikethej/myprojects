<head>
		<meta charset="utf-8"/>
		<title>DN Calendar</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dncalendar-skin.min.css');?>">
	
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('js/dncalendar.min.js');?>"></script>
		<script type="text/javascript">
		var utc = new Date().toJSON().slice(0,10);
		$(document).ready(function() {
                        $('#horas').hide();
                        $('.entry').click(function() {
                            alert('clicou');
                            $('#calendario').hide();
                            $('#horas').show();
                            
                        });
			var my_calendar = $("#dncalendar-container").dnCalendar({
				minDate: utc,
				maxDate: "2016-12-02",
				monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outobro", "Novembro", "Dezembro" ], 
				monthNamesShort: [ 'Jan', 'FeV', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
				dayNames: [ 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                dayNamesShort: [ 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom' ],
                dataTitles: {today : 'Hoje' },
                startWeek: 'Segunda',
                dayClick: function(date, view) {
					sessionStorage.setItem("data", date.getDate()+ "-" + (date.getMonth() + 1) + "-" + date.getFullYear());
                                        window.location = '<?php echo base_url('index.php/Portal_Utente/popup');?>';
                }
			});

			// init calendar
			my_calendar.build();

			
		});
		</script>
		</head>
<body>
    <div class="content">
            <div class="container-fluid">
                <div id="calendario" class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Marcação de Consulta</h4>
                            </div>

	
                            <div id="dncalendar-container">
                            </div>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">As suas consultas marcadas</h4><br>
                            </div>
                            <div class="content">
                                <?php 
                                    if(!empty($consultas_marcadas)) {
                                        echo "<table class=\"table\">
                                                <thead>
                                                  <tr>
                                                    <th>Nome Médico</th>
                                                    <th>Data</th>
                                                    <th>Hora</th>
                                                    <th>Tipo Consulta</th>
                                                  </tr>
                                                </thead>
                                                <tbody>";
                                        $i = 0;
                                        foreach($consultas_marcadas as $consulta) {
                                            $id = $consulta['id'];
                                            $id_utente = $consulta['id_utente'];                                            
                                            $nome_medico = $consulta['nome_medico'];
                                            $data = $consulta['data'];
                                            $hora = $consulta['hora'];
                                            $especialidade = $consulta['especialidade'];
                                            
                                            echo "<tr><td>$nome_medico</td><td>$data</td><td>$hora:00</td><td>$especialidade</td></td><td><form method='POST' action='" . base_url('index.php/Portal_Utente/eliminar_consulta')
                                                    . "'> <input name='id_consulta' type='hidden' value='$id'></input><input type='submit' class='btn btn-danger' "
                                                    . "value='Desmarcar Consulta'></input></form></td></tr>";
                                            $i++;
                                        }
                                    } else {
                                        echo "<label>Não tem consultas marcadas.</label>";
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

