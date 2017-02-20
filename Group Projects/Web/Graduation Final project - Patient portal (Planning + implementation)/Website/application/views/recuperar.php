<body>
<nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Início</a></li>
                        <li><a href="about-us.html">SNS</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Serviços<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="services.html">Utente</a></li>
                                <li><a href="estabelecimentos.html">Estabelecimentos</a></li>
                            </ul>
                        </li>
                        <li><a href="contact-us.html">Informações</a></li>
                 
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Entrar <strong class="caret"></strong></a>
						<div class="dropdown-menu" style="padding: 10px; padding-bottom: 10px;">
							<form method="post" action="login" accept-charset="UTF-8">
								<input  class="tamanho" type="text" placeholder="Nº de Utente" id="username" name="nrutente">
								<input  class="tamanho" type="password" placeholder="Palavra-passe" id="password" name="palavra_passe">
								<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
								<label class="string optional" for="user_remember_me">Lembrar-me</label>
								<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Entrar">          
                                <a href="registar.html"><input class="btn btn-primary btn-block" type="button" value="Registar" ></a>
                               
								
							</form>
						</div>
					</li>
				                    
                        <li> 
                            <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                            </form>
                        </li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->



    <section class="pricing-page">
        <div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary"><p id="titulo_auto">Recuperar dados da Conta</p></a>
        </div>
    </div>
</div>
            <br>
            <br>
            <br>
<form role="form">
    <div class="row setup-content" id="step-1">
    
        <div class="col-xs-12">
            <div class="col-md-12">
                                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="service_name">Nome Completo:</label>  
                    <div class="col-md-5">
                        <input  id="box"  id="service_name" name="service_name" type="text" placeholder="" class="form-control input-md">
                    </div>
                </div>
                    <br>
                    <br>
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="service_version">Número de Utente:</label>  
                    <div class="col-md-5">
                        <input id="box" id="service_version" name="service_version" type="text" placeholder="" class="form-control input- md">
                    </div>
                </div>
                    <br>
                    <br>
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="service_architecture">Data de Nascimento:</label>
                    <div class="col-md-5">
                        <input id="box"  id="data" name="service_version" type="date" class="form-control input-md">
                    </div>
                </div>
                <br>
                <br>

                 <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Registar</button>
            </div>
            <br>
        </div>
    </div>  
</div>
</div><!--/container-->
        <br>
        <br>
</section><!--/pricing-page-->

    

        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Grupo 007</p>
                    </div>
                
                </div>
              </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>