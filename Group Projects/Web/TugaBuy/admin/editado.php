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
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
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
								<li><a href="index.php">Ofertas do dia</a></li>
								<li><a href="shop.php">Loja</a></li> 
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<div class="container">
		<p id="titulo">Bem-vindo!</p>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                                <?php
                                    include '../connect.php';
                                    $idi = $_GET['id'];
                                    $nomeart = htmlspecialchars($_POST['nome']);
                                    $descricao = htmlspecialchars($_POST['descricao']);
                                    $valor = htmlspecialchars($_POST['valor']);
                                    $palavra_chave = htmlspecialchars($_POST['palavra_chave']);
                                    $datafinal = htmlspecialchars($_POST['data_fim']);
                                    $datainicial = htmlspecialchars($_POST['data_ini']);
                                    $hours = htmlspecialchars($_POST['horas']);

                                    if ($nomeart&&$descricao&&$valor&&$pchave&&$datafinal&&$datainicial&&$hours){
                                            $sql = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
                                            $quer = mysqli_query($conn, $sql) or die("Error");
                                            while($row = mysqli_fetch_assoc($quer)){
                                                $idp = $row['user_id'];
                                            }
                                            $query = "UPDATE artigos SET designacao = '$nomeart', valor_base ='$valor', descricao = '$descricao', data_entr='$datainicial', data_fim='$datafinal', hora_final='$hours' WHERE item_id = '$idi';";
                                            $resa = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                            if(!$resa){
                                                die("Error: ".$query);
                                            }
                                            $sql_q = "SELECT * FROM artigos WHERE designacao = '".$nomeart."';";
                                            $quera = mysqli_query($conn, $sql_q) or die("Error1");
                                            while($row = mysqli_fetch_assoc($quera)){
                                                $idi = $row['item_id'];
                                            }
                                            $del = "DELETE FROM palavraschave WHERE item_id = '$idi';";
                                            $cenas = mysqli_query($conn, $del) or die("Error2");
                                            $pc= explode(",", $pchave);
                                            foreach($pc as $row){
                                                $que = "INSERT INTO palavraschave VALUES('$idi', '$row');";
                                                $res = mysqli_query($conn, $que) or die(mysqli_error($pchave));
                                                if(!$res){
                                                    die("Error: ".$que);
                                                }
                                            }
                                            echo "<script>window.location.href = 'admin.php';</script>";
                                    }
                                    else{
                                        echo "Por favor preencha <b>todos</b> os campos!";
                                        echo "<p><a href='edit?id=".$idi."'>Volte para a p&aacute;gina para editar o item.</a></p>";
                                    }
                                ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
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