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
								<?php
                                    
                                ?>
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
                                $sq = "SELECT * FROM artigos WHERE item_id = '".$idi."';";
                                $qur = mysqli_query($conn, $sq) or die("Error");
                                while($row = mysqli_fetch_assoc($qur)){
                                    $idp = $row['user_id'];
                                    $nome = $row['designacao'];
                                    $valor = $row['valor_base'];
                                    $descricao = $row['descricao'];
                                    $datainicial = $row['data_entr'];
                                    $datafim = $row['data_fim'];
                                    $horas = $row['hora_final'];
                                }
                                $sq = "SELECT * FROM artigos WHERE user_id = '".$idp."';";
                                $qur = mysqli_query($conn, $sq) or die("Error");
                                while($row = mysqli_fetch_assoc($qur)){
                                    $nick = $row['nick'];
                                }
                                $sql = "SELECT * FROM palavraschave WHERE item_id = '".$idi."';";
                                $query = mysqli_query($conn, $sql) or die("Error");
                                $items='';
                                while($row = mysqli_fetch_assoc($query)){
                                    $pchave = $row['pal_chave'];
                                    $items .= $pchave.', ';
                                }
                                echo "<form action='editado?id=".$idi."' method='POST'>
                                    <table>
                                        <tr>
                                            <td>Nome do Item: </td>
                                            <td><input type = 'text' name = 'nome' value = '".$nome."'></td>
                                        </tr>
                                        <tr>
                                            <td>Descrição: </td>
                                            <td><input type = 'text' name = 'descricao' value = '".$descricao."'></td>
                                        </tr>
                                        <tr>
                                            <td>Valor Base: </td>
                                            <td><input type = 'number' name = 'valor' value = '".$valor."'></td>
                                        </tr>
                                        <tr>
                                            <td>Palavra-chave (para pesquisa):</td>
                                            <td><input type = 'text' name = 'palavra_chave' value = '".$items."'></td>
                                        </tr>
                                        <tr>
                                            <td>Data inicial do leilão: </td>
                                            <td><input type = 'date' name = 'data_ini' value = '".$datainicial."'></td>
                                        </tr>
                                        <tr>
                                            <td>Data final do leilão: </td>
                                            <td><input type = 'date' name = 'data_fim' value = '".$datafim."'></td>
                                        </tr>
                                        <tr>
                                            <td>Horas do final do leilão: </td>
                                            <td><input type = 'time' name = 'horas' value = '".$horas."'></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <p><input class=btn btn-default pull-right' type = 'submit' name ='submit' value='Submeter Ediç&atilde;o'></p>
                                </form>";
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