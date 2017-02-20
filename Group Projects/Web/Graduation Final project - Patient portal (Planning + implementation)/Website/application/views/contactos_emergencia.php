<body>
  <div class="content">
        <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Os seus contactos de emergência</h4>
                                <p class="category">Lista de todos os seus contactos de emergência</p>
                            </div>
                            <div class="content">
                                <?php 
                                    if(!empty($contactos)) {
                                        echo "<table class=\"table\">
                                                <thead>
                                                  <tr>
                                                    <th>Nome</th>
                                                    <th>Telefone</th>
                                                    <th>Email</th>
                                                    <th>Cidade</th>
                                                  </tr>
                                                </thead>
                                                <tbody>";
                                        foreach($contactos as $contacto) {
                                            $id = $contacto['id'];
                                            $nome = $contacto['nome'];
                                            $telefone = $contacto['telefone'];
                                            $email = $contacto['email'];
                                            $cidade = $contacto['cidade'];
                                            
                                            echo "<tr><td>$nome</td><td>$telefone</td><td>$email</td><td>$cidade</td></td><td><form method='POST' action='" 
                                                    . base_url('index.php/Portal_Utente/eliminar_contacto_emergencia') 
                                                    . "'> <input name='id_contacto' type='hidden' value='$id'></input><input type='submit' class='btn btn-danger' "
                                                    . "value='Apagar'></input></form></td></tr></table>";
                                        }
                                    } else {
                                        echo "<label>Não tem contactos de emergência.</label>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Definir contactos de emergência</h4>
                                <p class="category">Adicione contactos de emergência ao seu perfil</p>
                            </div>
                            <div class="content">
                                
                                     <form method="POST" action="<?php echo base_url('index.php/Portal_Utente/contactos_emergencia');?>">
                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nome*</label>
                                                <input type="text" class="form-control" placeholder="Nome Completo" value="" name="nome" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Telefone*</label>
                                                <input type="number" class="form-control" placeholder="Contacto" value="" name="telefone" required>
                                            </div>
                                        </div>
                                                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control" placeholder="Email" value="" name="email">
                                            </div>
                                        </div>
                                                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cidade</label>
                                                <input type="text" class="form-control"  placeholder="Cidade"  value="" name="cidade">
                                            </div>
                                        </div>
                                         <strong> Os campos assinalados com * são de preenchimento obrigatório</strong>
                                         <button type="submit"  id="separar" class="btn btn-info btn-fill pull-right"><strong>+</strong> Adicionar</button>
                                    <div class="clearfix"></div>
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</html>

