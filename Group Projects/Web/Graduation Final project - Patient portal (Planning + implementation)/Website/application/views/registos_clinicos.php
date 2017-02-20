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
                            <h4 class="title">Os seus registos clínicos</h4>
                            <p class="category">Lista de todos os seus registos clínicos</p>
                        </div>
                        <div  class="content">
                            <?php
                            
                            if (!empty($registos_clinicos)) {
                   
                                echo "<table class=\"table\">
                                                <thead>
                                                  <tr>
                                                    <th align='center'>Nome do médico</th>
                                                    <th align='center'>Tipo de registo</th>
                                                    <th align='center'>Data</th>
                                                    <th align='center'>Download</th>
                                                  </tr>
                                                </thead>
                                                <tbody>";
                                foreach ($registos_clinicos as $registo) {
                                    $id = $registo['id_registo'];
                                    $nome_medico = $registo['nome']; // nome do medico
                                    $tipo = $registo['tipo'];
                                    $data = $registo['data'];
                                    $link = base_url("index.php/Portal_Utente/download?id=" . $id );
                                    
                                    $botao = "<a href='" . $link . "'>Download</a>";
                                   

                                    echo "<tr><td align='center';>$nome_medico</td><td align='center';>$tipo</td><td align='center';>$data</td><td>$botao</td>";
                                    
                                    
                                }
                                echo "</table>";
                            } else {
                                echo "<label>Não possui nenhum registo clínico.</label>";
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

