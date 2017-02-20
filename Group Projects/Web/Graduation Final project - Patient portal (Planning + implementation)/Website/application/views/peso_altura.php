	    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var js_array = JSON.parse('<?php echo json_encode($dados);?>');

        
        js_array2 = [["Data","Peso","Altura"]];


      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
 

        var j=1;
        for(i=0;i<js_array.length;i++){
            js_array2[j]=[String(js_array[i][1]),parseFloat(js_array[i][0]),parseFloat(js_array[i][2])];
            j++;
        }
 
        if(js_array2.length != 1){
            var data = google.visualization.arrayToDataTable(js_array2);
        }
        else{
            
            var data = google.visualization.arrayToDataTable([["Data","Peso","Altura"],["0",0,0]]);
        
        }

        var options = {
          title: 'Peso/Altura',
          hAxis: {title: '',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Adicionar Peso/Altura</h4>
                                <p class="category">Insira o seu peso e altura (as informações dizem respeito à data atual)</p>
                            </div>
                            <div class="content">
								<div id="infosPeso" class="ct-chart ct-perfect-fourth">
									<form method="POST" action="<?php echo base_url('index.php/Portal_Utente/peso_altura');?>" class="col-md-12">
										<div class="form-group">
											<label>Peso (KG)</label>
											<input class="form-control" type="number" step="0.1" name="peso"></input>
										</div>
										<hr>
										<div class="form-group">
											<label>Altura (CM)</label>
											<input class="form-control" type="number" step="0.1" name="altura"></input>
										</div>
										<hr>
										<input type="submit" class="btn btn-info btn-fill pull-right" value="Submeter"></input>
									</form>
								</div>
							</div>
								


                            <div class="footer">
                            </div>
						</div>
                    </div>
									
				<div class="col-md-12">
					<div class="card">
						<div class="header">
							<h4 class="title">Estatísticas do seu Peso/Altura</h4>
							<p class="category">Informações úteis relativas ao seu peso/altura</p>
						</div>
						<div class="content">
							<div id="chart_div" style="overflow:hidden"></div>
						</div>
							


						<div class="footer">
						</div>
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
