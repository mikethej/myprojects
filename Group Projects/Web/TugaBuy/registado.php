<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Registado | Tuga-Buy</title>
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
		<p id="titulo">Bem-vindo!</p>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12"> 
                                <?php
                                    include 'connect.php';	
                                    $submit = $_POST['submit'];
                                    $nome = htmlspecialchars($_POST['nome']);
                                    $apelido = htmlspecialchars($_POST['apelido']);
                                    $nick = strtolower(strip_tags($_POST['nick']));
                                    $password = htmlspecialchars($_POST['password']);
                                    $repeatpassword = strip_tags($_POST['repeatpassword']);
                                    $email = htmlspecialchars($_POST['email']);
                                    $genero = htmlspecialchars($_POST['genero']);
                                    $data_nascimento = htmlspecialchars($_POST['bday']);
                                    $pais = $_POST['ativo'];
                                    $distrito = $_POST['distrito'];
                                    $concelho = $_POST['concelho'];
                                    $imagem = $_FILES['image']['name'];
                                    $data_reg = date("Y-m-d H:i:s");
                                        
                                    if ($submit){               
                                        if ($nome&&$apelido&&$nick&&$password&&$repeatpassword&&$email&&$genero&&$data_nascimento){
                                            if($password == $repeatpassword){
                                                if(strlen($password)>16|| strlen($password)<4){
                                                    echo "<p>Palavra-passe tem que ter entre 4 e 16 caracteres!</p>";
                                                    echo "<p><a href = 'register'>Volte para o registo</a></p>";
                                                }
                                                else{
                                                    if(strlen($nome)>32|| strlen($apelido)>32 || strlen($nick)>32){
                                                        echo "Tamanho do nickname demasiado longo";
                                                        echo "<p><a href = 'register'>Volte para o registo</a></p>";
                                                    }
                                                    else{
                                                        if(isset($imagem)){
                                                            $errors= array();
                                                            $file_name = $_FILES['image']['name'];
                                                            $file_size =$_FILES['image']['size'];
                                                            $file_tmp =$_FILES['image']['tmp_name'];
                                                            $file_type=$_FILES['image']['type'];
                                                            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

                                                            $expensions= array("jpeg","jpg","png");         
                                                            if(in_array($file_ext,$expensions)=== false){
                                                                $errors[]="extensao nao permitida, escolha um ficheiro JPEG ou PNG.";
                                                            }

                                                            if($file_size > 2097152){
                                                                $errors[]='File size must be excately 2 MB';
                                                            }
                                                            if(empty($errors)==true){
                                                                move_uploaded_file($file_tmp,"uploads/".$nick.".jpg");
                                                            }
                                                            else{
                                                                print_r($errors);
                                                                
                                                            }
                                                        }
                                                    }
                                                    $pal_chave = md5($password);
                                                    $query = "INSERT INTO utilizadores VALUES(null, '$nick', '$nome', '$apelido', '$pal_chave', '$data_nascimento', '$email', '$genero', '$pais', '$distrito', '$concelho', '$nick', '$data_reg');";
                                                    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                    if(!$res){
                                                        die("Error: ".$query);
                                                    }
                                                    die("<p id='centrar'> Já estás registado! <a href = 'index'>Volta para a home page</a><p>");
                                                }
                                            }
                                            else{
                                                echo "As palavras-passe não coincidem.";
                                                echo "<p><a href = 'register'>Volte para o registo</a></p>";
                                            }
                                        }
                                        else{
                                            echo "Por favor preencha <b>todos</b> os campos!";
                                            echo "<p><a href = 'register'>Volte para o registo</a></p>";
                                        }
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
