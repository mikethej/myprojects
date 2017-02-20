<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Registo | Tuga-Buy</title>
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
								<li><a href="login" class="active"><i class="fa fa-lock"></i> Iniciar Sessão</a></li>
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
	
	<div class="container">
		<p id="titulo">Registar</p>
		<script>
			$(function() {
				$('#login-form-link').click(function(e) {
					$("#login-form").delay(100).fadeIn(100);
					$("#register-form").fadeOut(100);
					$('#register-form-link').removeClass('active');
					$(this).addClass('active');
					e.preventDefault();
				});
				$('#register-form-link').click(function(e) {
					$("#register-form").delay(100).fadeIn(100);
					$("#login-form").fadeOut(100);
					$('#login-form-link').removeClass('active');
					$(this).addClass('active');
					e.preventDefault();
				});
			});
		</script>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                            <?php
                                if ($_COOKIE['login'] == 'true'){
                                    echo "<p>Já tem sessão iniciada</p>
                                    <p><a href='logout'>Termina sessão aqui</a></p>";
                                }
                                else{
                                    echo "<form action='registado' method='POST' enctype='multipart/form-data'>
									<table>
										<tr>
											<td>Nome Próprio: </td>
											<td><input type = 'text' name = 'nome'></td>
										</tr>
										<tr>
											<td>Apelido: </td>
											<td><input type = 'text' name = 'apelido'></td>
										</tr>
										<tr>
											<td>Nickname: </td>
											<td><input type = 'text' name = 'nick'></td>
										</tr>
										<tr>
											<td>Escolha uma palavra-passe:</td>
											<td><input type = 'password' name = 'password'></td>
										</tr>
										<tr>
											<td>Repita a palavra-passe: </td>
											<td><input type = 'password' name = 'repeatpassword'></td>
										</tr>
										<tr>
											<td>E-mail: </td>
											<td><input type = 'email' name = 'email'></td>
										</tr>
										<tr>
											<td>Sexo: </td>
											<td><input type='radio' name = 'genero' value='Masculino'> Masculino 
                                                <input type='radio' name = 'genero' value='Feminino'> Feminino </td>
										</tr>
										<tr>
											<td>Data de Nascimento: </td>
											<td><input type = 'date' name = 'bday'></td>
										</tr>
                                        <tr>
                                            <td>Fotografia:</td>
                                            <td><input type='file' name='image'></td>
                                        </tr>
										<tr>
											<td>País: </td>
											<td>";
                                                include 'connect.php';
                                                $sql = "SELECT * FROM paises;";
                                                $query = mysqli_query($conn, $sql) or die("Error");
                                                $optionsHtml='';
                                                while ($reg = mysqli_fetch_array($query)) {
                                                    $optionsHtml.= '<option value="'.$reg['nome_pais'].'">'.$reg['nome_pais'].'</option>';
                                                }
                                                if (!empty($optionsHtml)) {
                                                    $outputHtml = '<select name="ativo" id="options" onchange="optionCheck()"><option selected disabled>Pa&iacute;ses</option>'.$optionsHtml.'</select>';
                                                }
                                                else {
                                                    $outputHtml = $erro;
                                                }
                                                echo $outputHtml;
											echo "</td>
										</tr>
                                        <tr id = 'distritos' style='display:none;'>
                                            <td>Distrito: </td>
                                            <td><input type = 'text' name = 'distrito'></td>
                                        </tr>
                                        <tr id = 'concelhos' style='display:none;'>
                                            <td>Concelho: </td>
                                            <td><input type = 'text' name = 'concelho'></td>
                                        </tr>
                                        <script type='text/javascript'>
                                            function optionCheck(){
                                                var option = document.getElementById('options').value;
                                                if(option == 'Portugal'){
                                                    document.getElementById('distritos').style.display ='';
                                                    document.getElementById('concelhos').style.display ='';
                                                }
                                                else{
                                                    document.getElementById('distritos').style.display ='none';
                                                    document.getElementById('concelhos').style.display ='none';
                                                }
                                            }
                                        </script>
                                    </table>
									<p><input class='btn btn-default' id='posicao' type = 'submit' name ='submit' value='Submeter'></p>
								</form>";
                                
                                }
                            ?>
                            </div>
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
