<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Editar | Tuga-Buy</title>
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
                                <option value="categoria">Categoria</option>
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
                                        document.getElementById("cat").style.display ="none";
                                    }
                                    else{
                                        if(option =="base"){
                                            document.getElementById("texto").style.display ="none";
                                            document.getElementById("numero").style.display ="inline-block";
                                            document.getElementById("data").style.display ="none";
                                            document.getElementById("cat").style.display ="none";
                                        }
                                        else{
                                            if(option =="dataf"){
                                            document.getElementById("texto").style.display ="none";
                                            document.getElementById("numero").style.display ="none";
                                            document.getElementById("data").style.display ="inline-block";
                                            document.getElementById("cat").style.display ="none";
                                            }
                                            else{
                                                if(option =="categoria"){
                                                    document.getElementById("texto").style.display ="none";
                                                    document.getElementById("numero").style.display ="none";
                                                    document.getElementById("cat").style.display ="inline-block";
                                                    document.getElementById("data").style.display ="none";
                                                }
                                                else{
                                                    document.getElementById("texto").style.display ="inline-block";
                                                    document.getElementById("numero").style.display ="none";
                                                    document.getElementById("data").style.display ="none";
                                                    document.getElementById("cat").style.display ="none";
                                                }
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
	
	<div class="container">
		<p id="titulo">Bem-vindo!</p>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                                <?php
                                include 'connect.php';
                                $idi = $_GET['id'];
                                $data = date("Y-m-d");
                                $sql = "SELECT * FROM artigos WHERE item_id = '".$idi."';";
                                $query = mysqli_query($conn, $sql) or die("Error");
                                while($row = mysqli_fetch_assoc($query)){
                                    $idp = $row['user_id'];
                                    $nome = $row['designacao'];
                                    $valor = $row['valor_base'];
                                    $descricao = $row['descricao'];
                                    $datai = $row['data_entr'];
                                    $datafim = $row['data_fim'];
                                    $horas = $row['hora_final'];
                                    $mvalor = $row['melhor_val'];
                                }
                                $sq = "SELECT * FROM utilizadores WHERE user_id = '".$idp."';";
                                $qur = mysqli_query($conn, $sq) or die("Error");
                                while($row = mysqli_fetch_assoc($qur)){
                                    $nick = $row['nick'];
                                }
                                if ($_COOKIE['nick'] == $nick && $_COOKIE['login'] == 'true'){
                                    
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
                                                <td>Palavra-chave (para pesquisa):</td>
                                                <td><input type = 'text' name = 'pchave' value = '".$items."'></td>
                                            </tr>
                                            <tr>
                                                <td>Valor M&aacute;ximo de licitaç&atilda;o: </td>
                                                <td><input type = 'number' name = 'mvalor' value = '".$mvalor."'></td>
                                            </tr>";
                                            if(strtotime($datai) > strtotime($data)){
                                                echo"<tr>
                                                    <td>Valor Base: </td>
                                                    <td><input type = 'number' name = 'valor' value = '".$valor."'></td>
                                                </tr>
                                                <tr>
                                                    <td>Data inicial do leilão: </td>
                                                    <td><input type = 'date' name = 'data_ini' value = '".$datai."'></td>
                                                </tr>";
                                            }
                                            echo"<tr>
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
                                }
                                else{
                                    echo "<p><a href='perfil'>Volte para o perfil</a> para poder editar itens</p>";
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
								<li><a href="faqs">FAQ’s</a></li>
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
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>
</html>