<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.png">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Portal do Utente
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.html">
                        <i class="fa fa-arrow-circle-left"></i>
                        <p>Início</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="fa fa-heart"></i>
                        <p>Os meus dados</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="fa fa-users"></i>
                        <p>Agregado Familiar</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="fa fa-file-text"></i>
                        <p>Taxas Moderadoras</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="fa fa-calendar"></i>
                        <p>Marcar Consulta</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="fa fa-user-md"></i>
                        <p>Avaliar Médico</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="fa fa-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <b class="caret"></b>
                                <span class="notification">5</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Mensagem 1</a></li>
                                <li><a href="#">Mensagem 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <b class="caret"></b>
                                <span class="notification">3</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Mensagem 1</a></li>
                                <li><a href="#">Mensagem 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <b class="caret"></b>
                            </a>    
                            <ul class="dropdown-menu">
                                <li><a href="user.html">Configurações</a></li>
                                <li><a href="">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card posicao1">
                            <div class="header">
                                <h4 class="title">Editar Conta</h4>
                            </div>
                            <div class="content">
                                <form>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nome completo</label>
                                                <input type="text" class="form-control" placeholder="Nome Completo" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control" placeholder="Email" value="">
                                            </div>
                                        </div>
                                                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Palavra-passe</label>
                                                <input type="password" class="form-control" placeholder="Palavra-passe" value="">
                                            </div>
                                        </div>
                                                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="password" class="form-control" placeholder="Confirmar Palavra-passe" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Morada</label>
                                                <input type="text" class="form-control" placeholder="Morada" value="">
                                            </div>
                                        </div>
                                   <button type="submit" class="btn btn-info btn-fill pull-right">Submeter</button>
                                    <div class="clearfix"></div>
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

</html>
