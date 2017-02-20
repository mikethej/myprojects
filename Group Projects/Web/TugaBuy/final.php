<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Notificaç&otilde;es | Tuga-Buy</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
                                    if ($_COOKIE['login'] == 'true'){
                                        echo '<li><a href="items"><i class="fa fa-plus"></i>Adicionar Item</a></li>';
                                        echo '<li><a href="perfil">'. $_COOKIE['nick'] .'</a></li>';
                                        echo '<li><a href="logout"><i class="fa fa-lock"></i>Terminar Sessao</a></li>';
                                        
                                    }
                                    else{
                                        echo '<li><a href="login"><i class="fa fa-lock"></i>Iniciar Sessão</a></li>';
                                        echo '<li><a href="register"><i class="fa fa-lock"></i> Registar</a></li>';
                                    }
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
                            <br></br>
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="#" class="active">Ofertas do dia</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="resultpesq" method="POST" style="text-align:center;">
                            Procure artigos por:
                            <select name = "pesquisa" style="width:200px;" id = "alinhamento" onchange="optionChecka()">
                                <option selected disabled>--Pesquisar--</option>
                                <option value="nome">Nome</option>
                                <option value="descricao">Descrição</option>
                                <option value="categoria">Palavra-Chave</option>
                                <option value="dataf">Data final do Leilão</option>
                                <option value="base">Preço base</option>
                                <option value="vendedor">Vendedor</option>
                                <option value="todos">Todos</option>
                            </select>
                            <input type="text" name="abc" id="texto" style="display: none;"><br>
                            <input type="number" name="valor" id="numero" style="display: none;" min="0">
                            <input type="date" name="data" id="data" style="display: none;">
                            <input type="submit" name="submit" value="Procurar">
                            <script type="text/javascript">
                                function optionChecka(){
                                    var option = document.getElementById("alinhamento").value;
                                    if(option == "todos"){
                                        document.getElementById("texto").style.display = "none";
                                        document.getElementById("numero").style.display ="none";
                                        document.getElementById("data").style.display ="none";
                                    }
                                    else{
                                        if(option =="base"){
                                            document.getElementById("texto").style.display ="none";
                                            document.getElementById("numero").style.display ="inline-block";
                                            document.getElementById("data").style.display ="none";
                                        }
                                        else{
                                            if(option =="dataf"){
                                            document.getElementById("texto").style.display ="none";
                                            document.getElementById("numero").style.display ="none";
                                            document.getElementById("data").style.display ="inline-block";
                                            }
                                            else{
                                                document.getElementById("texto").style.display ="inline-block";
                                                document.getElementById("numero").style.display ="none";
                                                document.getElementById("data").style.display ="none";
                                            }
                                        }
                                    }
                                }
                            </script>
                        </form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

    <div id="contact-page" class="container">
        <div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">
                    <div class="show">
                        <div id = "final">
                            <?php
                                include 'connect.php';
                                $data_lici = date("Y-m-d H:i:s");
                                $sql = "SELECT * FROM artigos;";
                                $query = mysqli_query($conn, $sql) or die("Error");
                                while($raw = mysqli_fetch_assoc($query)){
                                    $idi = $raw['item_id'];
                                    $vendedor = $raw['user_id'];
                                    $datafim = $raw['data_fim'];
                                    $horafim = $raw['hora_final'];
                                    $data = date("Y-m-d");
                                    $hora = date("H:i:s");
                                    $valor = $raw['valor_base'];

                                    $sqla = "SELECT * FROM artigos WHERE item_id = '".$idi."';";
                                    $querya = mysqli_query($conn, $sqla) or die("Error4");
                                    while($rew = mysqli_fetch_assoc($query)){
                                        $valor = $rew['valor_base'];
                                    }
                                    $raw =array();
                                    $sqlp = "SELECT * FROM licitacoes WHERE item_id = '".$idi."';";
                                    $queryp = mysqli_query($conn, $sqlp) or die("Error3");
                                    $vatual = $valor;
                                    if(!empty($queryp)){
                                        while($row = mysqli_fetch_assoc($queryp)){
                                            $valorl = $row['valor'];                                            
                                            array_push($raw, $valorl);
                                        }
                                        foreach ($raw as $value){
                                            if($value > $vatual){
                                                $vatual=$value;
                                           }
                                        }
                                    }
                                    $sqli = "SELECT * FROM licitacoes WHERE valor = '".$vatual."' AND item_id = '".$idi."';";
                                    $queryi = mysqli_query($conn, $sqli) or die("Error");
                                    while($row = mysqli_fetch_assoc($queryi)){
                                        $idpe = $row['user_id'];
                                    }
                                    if(strtotime($data)>strtotime($datafim)||(strtotime($data)==strtotime($datafim) && strtotime($hora)>strtotime($horafim))){
                                        $sqlb="SELECT * FROM notificacoes WHERE item_id='$idi'";
                                        $queryb = mysqli_query($conn, $sqlb) or die("Erro!");
                                        $row = mysqli_fetch_array($queryb);

                                        if(!empty($row)){
                                            $sqlc="UPDATE notificacoes SET comprador_id ='$idpe', vendedor_id='$vendedor', valor_final='$vatual' WHERE item_id='$idi'";
                                           $queryc = mysqli_query($conn, $sqlc) or die("Error aqui");
                                        }
                                        else{
                                            $sqla="INSERT INTO notificacoes VALUES ('$idpe', '$vendedor', '$idi', '$vatual', '0', '0');";
                                            $querya = mysqli_query($conn, $sqla) or die("Error aqui");
                                        }

                                    }
                                }
                            ?>
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
								<li><a href="#">FAQ’s</a></li>
                                <li><a href="refundo">Política de Reembolso</a></li>
                                <li><a href="termos">Termos de Uso</a></li>
								<li><a href="privacidade">Política de Privacidade</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Menu rápido</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="shop">Roupa</a></li>
								<li><a href="shop">Tecnologia</a></li>
								<li><a href="shop">Casa</a></li>
                                				<li><a href="shop">Acessórios</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Sobre</h2>
							<ul class="nav nav-pills nav-stacked">
                                				<li><a href="developers">Criadores</a></li>
								<li><a href="info">Info sobre a companhia</a></li>
								<li><a href="contact-us">Contactos e Localização</a></li>
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
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>