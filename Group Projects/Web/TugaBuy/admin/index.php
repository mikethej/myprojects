<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administradores | Tuga-Buy</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/prettyPhoto.css" rel="stylesheet">
	<link href="../css/price-range.css" rel="stylesheet">
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="../images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Inic&iacute;o</a></li>
							</ul>
						</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">	
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    <form  action="admin.php" method="POST" style="text-align:center;">
        <h1>Procure por:</h1>
        <select name = "filtro" style="width:200px;" id = "filtros" onchange="optionChecka()">
            <option selected disabled>-----------Pesquisar-----------</option>
            <option disabled>--Utilizadores--</option>
            <option value="nick">Nick</option>
            <option value="email">Email</option>
            <option value="pais">País</option>
            <option value="distrito">Distrito</option>
            <option value="concelho">Concelho</option>
            <option value="u_todos">Todos</option>
            <option disabled>--Items--</option>
            <option value="i_todos">Todos</option>
            <option disabled>--Licitaç&otilde;es--</option>
            <option value="vendedor">Vendedor</option>
            <option value="comprador">Comprador</option>
            <option value="licitador">Licitador</option>
            <option value="l_todos">Todos</option>
            
        </select><br><br>
        <input type="text" name="abc" id="texto"><br>
        <input type="number" name="idade1" id="numero1" style="visibility:hidden;width:50px;">
        <input type="number" name="idade2" id="numero2" style="visibility:hidden;width:50px;"><br>
        <input type="submit" name="submit" value="Procurar"><br><br>
        <script type="text/javascript">
            function optionChecka(){
                var option = document.getElementById("filtros").value;
                if(option == "u_todos" || option == "i_todos" || option == "l_todos"){
                    document.getElementById("texto").style.visibility ="hidden";
                }
                else{
                    document.getElementById("texto").style.visibility ="visible";
                }
            }
        </script>
    </form>
    
	<section>
    <div id="contact-page" class="container">
        <div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">
                    
                </div>
           </div>	
        </div>
    </section>
        
    <footer id="footer"><!--Footer-->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Tuga</span>-Buy</h2>
							<p>Sê um mestre nos leilões!</p>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Ajuda e Suporte</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="../faqs.php">FAQ’s</a></li>
                                <li><a href="../refundo.php">Política de Reembolso</a></li>
                                <li><a href="../termos.php">Termos de Uso</a></li>
								<li><a href="../privacidade.php">Política de Privaciadade</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Menu rápido</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="../shop.php">Roupa</a></li>
								<li><a href="../shop.php">Tecnologia</a></li>
								<li><a href="../shop.php">Casa</a></li>
                                <li><a href="../shop.php">Acessórios</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Sobre</h2>
							<ul class="nav nav-pills nav-stacked">
                                <li><a href="../developers.php">Criadores</a></li>
								<li><a href="../info.php">Info sobre a companhia</a></li>
								<li><a href="../contact-us.php">Contactos e Localização</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2016 TugaBuy</p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
    <script src="**/js/jquery.js"></script>
	<script src="**/js/bootstrap.min.js"></script>
	<script src="**/js/jquery.scrollUp.min.js"></script>
	<script src="**/js/price-range.js"></script>
    <script src="**/js/jquery.prettyPhoto.js"></script>
    <script src="**/js/main.js"></script>
</body>
</html>
