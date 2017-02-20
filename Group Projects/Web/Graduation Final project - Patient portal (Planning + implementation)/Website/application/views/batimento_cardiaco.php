	    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var js_array = JSON.parse('<?php echo json_encode($dados);?>');

        
        js_array2 = [["Data","Batimento Cardíaco"]];


      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
 

        var j=1;
        for(i=0;i<js_array.length;i++){
            js_array2[j]=[String(js_array[i][1]),parseInt(js_array[i][0])];
            j++;
        }
        
        if(js_array2.length != 1){
            var data = google.visualization.arrayToDataTable(js_array2);
        }
        else{
            
            var data = google.visualization.arrayToDataTable([["Data","BPM"],["0",0]]);
        
        }

        var options = {
          title: 'Batimento Cardíaco',
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
                                <h4 class="title">Adicionar batimento cardíaco</h4>
                                <p class="category">Insira a sua medição de batimentos cardíacos (as informações dizem respeito à data atual)</p>
                            </div>
                            <div class="content">
                                <div id="infosINR" class="ct-chart ct-perfect-fourth">
                                    <form method="POST" action="<?php echo base_url('index.php/Portal_Utente/batimento_cardiaco');?>" class="col-md-12">
                                                <div class="form-group">
                                                        <label>Batimentos cardíacos (BPM)</label>
                                                        <input class="form-control" type="number" name="batimento_cardiaco"></input>
                                                </div>
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
							<h4 class="title">Estatísticas do seu batimento cardíaco</h4>
							<p class="category">Informações úteis relativas ao seu batimento cardíaco</p>
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


       <footer class="footer">
                <p class="copyright pull-right">
                  Grupo007
                </p>
        </footer>


    </div>
</div>


</body>
</html>
