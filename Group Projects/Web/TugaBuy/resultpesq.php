<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Resultado da Pesquisa | Tuga-Buy</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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
                                <option value="categoria">Palavras-chave</option>
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
<section>
    <div id="contact-page" class="container">
        <div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">
                     <?php
                        include 'connect.php';
                        $filtro = $_POST['pesquisa'];
                        echo "<h2 class='title text-center'>Artigos</h2>";
                        echo "<div class='col-md-9'><table class='table table-list-search'>";
                        echo "<tr><td>ID</td><td>Designação</td><td>User ID</td><td>Valor Base</td><td>Descrição</td><td>Data de Entrada</td><td>Data do Fim</td><td>Hora Final</td><td>Melhor Licitação</td><td>Melhor Valor</td>";
                        if($filtro == 'nome'){
                            $filter = $_POST['abc'];
                            $sqli = "SELECT * FROM artigos WHERE designacao='".$filter."';";
                            $res = mysqli_query($conn, $sqli) or die("Erro aqui79");
                            while($row = mysqli_fetch_assoc($res)){
                                        $idi = $row['item_id'];
                                        $sql = "SELECT * FROM artigos WHERE item_id='".$idi."' AND user_id='".$idp."';";
                                        $resa = mysqli_query($conn, $sql) or die("Erro aqui79");
                                        while($raw = mysqli_fetch_array($resa, MYSQL_NUM)){
                                                echo "<tr><td>".implode("</td><td><a href='product-details?id=".$idi."'>", $raw)."</td><tr>";
                                        }
                                    }
                                    echo "</table><br>";
                        }
                        else{
                            if($filtro == 'descricao'){
                                $filter = $_POST['abc'];
                                $sqli = "SELECT * FROM artigos WHERE descricao='".$filter."';";
                                $res = mysqli_query($conn, $sqli) or die("Erro aqui79");
                                while($row = mysqli_fetch_assoc($res)){
                                    $idi = $row['item_id'];
                                    $sql = "SELECT * FROM artigos WHERE item_id='".$idi."';";
                                    $resa = mysqli_query($conn, $sql) or die("Erro aqui79");
                                    while($raw = mysqli_fetch_array($resa, MYSQL_NUM)){
                                            echo "<tr><td>".implode("</td><td><a href='product-details?id=".$idi."'>", $raw)."</td><tr>";
                                    }
                                }
                                echo "</table><br>";
                            }
                            else{
                                if($filtro == 'categoria'){
                                    $filter = $_POST['abc'];
                                    $sqli = "SELECT * FROM palavraschave WHERE pal_chave= '".$filter."';";
                                    $res = mysqli_query($conn, $sqli) or die("Erro aqui79");
                                    while($row = mysqli_fetch_assoc($res)){
                                        $idi = $row['item_id'];
                                        $sql = "SELECT * FROM artigos WHERE item_id='".$idi."';";
                                        $resa = mysqli_query($conn, $sql) or die("Erro aqui79");
                                        while($raw = mysqli_fetch_array($resa, MYSQL_NUM)){
                                            echo "<tr><td>".implode("</td><td><a href='product-details?id=".$idi."'>", $raw)."</td><tr>";
                                        }
                                    }
                                    echo "</table><br>";
                                }
                                else{
                                    if($filtro == 'dataf'){
                                        $filter = $_POST['data'];
                                        $sqli = "SELECT * FROM artigos WHERE data_fim='".$filter."';";
                                        $res = mysqli_query($conn, $sqli) or die("Erro aqui79");
                                        while($row = mysqli_fetch_assoc($resa)){
                                            $idi = $row['item_id'];
                                        }
                                        while($row = mysqli_fetch_array($res, MYSQL_NUM)){
                                            echo "<tr><td>".implode("</td><td><a href='product-details?id=".$idi."'>", $row)."</td><tr>";
                                        }
                                        echo "</table><br>";

                                    }
                                    else{
                                        if($filtro == 'base'){
                                            $filter = $_POST['valor'];
                                            $sqli = "SELECT * FROM artigos WHERE valor_base='".$filter."';";
                                            $res = mysqli_query($conn, $sqli) or die("Erro aqui79");
                                            while($row = mysqli_fetch_assoc($res)){
                                                $idi = $row['item_id'];
                                                $sql = "SELECT * FROM artigos WHERE item_id='".$idi."';";
                                                $resa = mysqli_query($conn, $sql) or die("Erro aqui79");
                                                while($raw = mysqli_fetch_array($resa, MYSQL_NUM)){
                                                    echo "<tr><td>".implode("</td><td><a href='product-details?id=".$idi."'>", $raw)."</td><tr>";
                                                }
                                            }
                                            echo "</table><br>";
                                        }
                                        else{
                                            if($filtro == 'vendedor'){
                                                $filter = $_POST['abc'];
                                                $sql = "SELECT * FROM utilizadores WHERE nick='".$filter."';";
                                                $resa = mysqli_query($conn, $sql) or die("Erro aqui77");
                                                while($row = mysqli_fetch_assoc($resa)){
                                                    $idp = $row['user_id'];
                                                }
                                                $sqli = "SELECT * FROM artigos WHERE user_id='".$idp."';";
                                                $res = mysqli_query($conn, $sqli) or die("Erro aqui79");
                                                while($row = mysqli_fetch_assoc($res)){
                                                    $idi = $row['item_id'];
                                                    $sql = "SELECT * FROM artigos WHERE item_id='".$idi."';";
                                                    $resa = mysqli_query($conn, $sql) or die("Erro aqui79");
                                                    while($raw = mysqli_fetch_array($resa, MYSQL_NUM)){
                                                        echo "<tr><td>".implode("</td><td><a href='product-details?id=".$idi."'>", $raw)."</td><tr>";
                                                    }
                                                }
                                                echo "</table><br>";
                                            }
                                            else{
                                                $sql = "SELECT * FROM artigos";
                                                $res = mysqli_query($conn, $sql) or die("Erro");
                                                while($row = mysqli_fetch_assoc($res)){
                                                    $idi = $row['item_id'];
                                                    $sql = "SELECT * FROM artigos WHERE item_id='".$idi."';";
                                                    $resa = mysqli_query($conn, $sql) or die("Erro aqui79");
                                                    while($raw = mysqli_fetch_array($resa, MYSQL_NUM)){
                                                        echo "<tr><td>".implode("</td><td><a href='product-details?id=".$idi."'>", $raw)."</td><tr>";
                                                    }
                                                }
                                                echo "</table><br>";
                                            }
                                        }
                                    }
                                }
                            }
                        }                             
                    ?>
                    <div id = "auto"></div>
                    <div id = "final"></div>
                    <script type="text/javascript">
                        setInterval(function(){
                            $('#auto').load('auto #show');
                        }, 5000);
                        setInterval(function(){
                            $('#final').load('final #final');
                        },5000);
                    </script>
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
								<li><a href="../faqs">FAQ’s</a></li>
                                <li><a href="../refundo">Política de Reembolso</a></li>
                                <li><a href="../termos">Termos de Uso</a></li>
								<li><a href="../privacidade">Política de Privaciadade</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Menu rápido</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="../shop">Roupa</a></li>
								<li><a href="../shop">Tecnologia</a></li>
								<li><a href="../shop">Casa</a></li>
                                <li><a href="../shop">Acessórios</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Sobre</h2>
							<ul class="nav nav-pills nav-stacked">
                                <li><a href="../developers">Criadores</a></li>
								<li><a href="../info">Info sobre a companhia</a></li>
								<li><a href="../contact-us">Contactos e Localização</a></li>
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
        
        </div>
	</footer><!--/Footer-->
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
