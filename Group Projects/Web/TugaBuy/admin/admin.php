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
		</header><!--/header-->
	
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
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
<section>
    <div id="contact-page" class="container">
        <div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">
                    <?php
                        $dbhost = "appserver.di.fc.ul.pt";
                        $dbuser = "asw46586";
                        $dbpass = "asw46586";
                        $dbnome = "asw46586";
                        $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Couldn't connect");
                        $base= mysqli_select_db($conn,$dbnome) or die ('Não foi possivel conectar ao banco de dados...');

                        $filtro = $_POST['filtro'];
                        if($filtro == 'pais' || $filtro == 'distrito' || $filtro == 'concelho' || $filtro == 'nick' || $filtro == 'email' || $filtro == 'u_todos'){
                            echo "<table class='table table-list-search'>";	
                            echo "<tr><td>ID</td><td>Nick</td><td>Nome</td><td>Apelido</td><td>Palavra-passe encriptada</td><td>Data de Nascimento</td><td>Email</td><td>Genero</td><td>País</td><td>Distrito</td><td>Concelho</td><td>Foto</td><td>Data de Registo</td>";
                        }
                        if($filtro == 'pais'){
                            $filter = $_POST['abc'];
                            $sqli = "SELECT * FROM utilizadores WHERE pais='".$filter."'";
                            $res = mysqli_query($conn, $sqli) or die("Erro aqui");
                            while($row = mysqli_fetch_array($res, MYSQL_NUM)){
                                echo "<tr><td>".implode("</td><td>", $row)."</td><tr>";
                            }
                            echo "</table><br>";
                        }
                        else{
                            if($filtro == 'distrito'){
                                $filter = $_POST['abc'];
                                $sqli = "SELECT * FROM utilizadores WHERE distrito='".$filter."'";
                                $res = mysqli_query($conn, $sqli) or die("Erro aqui");	
                                while($row = mysqli_fetch_array($res, MYSQL_NUM)){
                                    echo "<tr><td>".implode("</td><td>", $row)."</td><tr>";
                                }
                                echo "</table><br>";
                            }
                            else{
                                if($filtro == 'concelho'){
                                    $filter = $_POST['abc'];
                                    $sqli = "SELECT * FROM utilizadores WHERE concelho='".$filter."'";
                                    $res = mysqli_query($conn, $sqli) or die("Erro aqui");	
                                    while($row = mysqli_fetch_array($res, MYSQL_NUM)){
                                        echo "<tr><td>".implode("</td><td>", $row)."</td><tr>";
                                    }
                                    echo "</table><br>";
                                }
                                else{
                                    if($filtro == 'nick'){
                                        $filter = $_POST['abc'];
                                        $sqli = "SELECT * FROM utilizadores WHERE nick='".$filter."'";
                                        $res = mysqli_query($conn, $sqli) or die("Erro aqui");
                                        while($row = mysqli_fetch_array($res, MYSQL_NUM)){
                                            echo "<tr><td>".implode("</td><td>", $row)."</td><tr>";
                                        }
                                        echo "</table><br>";
                                    }
                                    else{
                                        if($filtro == 'email'){
                                            $filter = $_POST['abc'];
                                            $sqli = "SELECT * FROM utilizadores WHERE email='".$filter."'";
                                            $res = mysqli_query($conn, $sqli) or die("Erro aqui");
                                            while($row = mysqli_fetch_array($res, MYSQL_NUM)){
                                                echo "<tr><td>".implode("</td><td>", $row)."</td><tr>";
                                            }
                                            echo "</table><br>";
                                        }
                                        else{
                                             if($filtro == 'u_todos'){
                                                $filter = $_POST['abc'];
                                                $sqli = "SELECT * FROM utilizadores";
                                                $res = mysqli_query($conn, $sqli) or die("Erro aqui");
                                                while($row = mysqli_fetch_array($res, MYSQL_NUM)){
                                                    echo "<tr><td>".implode("</td><td>", $row)."</td><tr>";
                                                }
                                                echo "</table><br>";
                                            }
                                            else{
                                                if($filtro == 'i_todos'){
                                                    echo "<div>";   
                                                    $sql = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
                                                    $query = mysqli_query($conn, $sql) or die("Error");

                                                    $sqli = "SELECT * FROM artigos";
                                                    $quer = mysqli_query($conn, $sqli) or die("Error");
                                                    echo "<br/>";
                                                    echo "<h2 class='title text-center'>Todos os itens</h2>";
                                                    echo "<div class='col-md-9'><table class='table table-list-search'>";
                                                    echo "<tr><td>ID</td><td>Designaç&atilde;o</td><td>User ID</td><td>Valor Base</td><td>Descriç&atilde;o</td><td>Data de Inicio</td><td>Data de Fim</td><td>Hora final</td><td>Melhor Licitaç&atilde;o</td><td>Melhor Valor</td><td>Editar Dados</td>";
                                                    while($row = mysqli_fetch_assoc($quer)){
                                                        $idi = $row['item_id'];
                                                        echo "<tr><td>".implode("</td><td><a href='../product-details?id=".$idi."'>", $row)."</a></td><td><a href='edit?id=".$idi."' type='button' class='btn btn-warning'>Editar</a></td></tr>";
                                                    }
                                                    echo "</table><br>";
                                                }
                                                else{
                                                    echo "<table class='table table-list-search'>";	
                                                    echo "<tr><td>Artigo</td><td>Vendedor</td><td>Licitaç&atilde;o</td><td>Licitador</td><td>Data da Licitaç&atilde;o</td>";
                                                    $sqla = "SELECT * FROM licitacoes;";
                                                    $quer = mysqli_query($conn, $sqla) or die("Error");
                                                    $dataatual = date("Y-m-d");
                                                    $horaatual = date("H:i:s");
                                                    while($row = mysqli_fetch_assoc($quer)){
                                                        $idprod = $row['item_id'];
                                                        $valorl = $row['valor'];
                                                        $idpe = $row['user_id'];
                                                        $datafinal = $row['data_licit'];
                                                        $sqle = "SELECT * FROM artigos WHERE item_id = '".$idprod."';";
                                                        $quera = mysqli_query($conn, $sqle) or die("Error");
                                                        while($row = mysqli_fetch_assoc($quera)){
                                                            $valor = $row['valor_base'];
                                                            $idv = $row['user_id'];
                                                            $artigo = $row['designacao'];
                                                            $datafim = $row['data_fim'];
                                                            $horafim = $row['hora_final'];  
                                                        }
                                                        $sqlo = "SELECT * FROM utilizadores WHERE user_id = '".$idpe."';";
                                                        $queryo = mysqli_query($conn, $sqlo) or die("Error");
                                                        while($row = mysqli_fetch_assoc($queryo)){
                                                            $comprador = $row['nick'];
                                                        }
                                                        $sqlq = "SELECT * FROM utilizadores WHERE user_id = '".$idv."';";
                                                        $queryq = mysqli_query($conn, $sqlq) or die("Error");
                                                        while($row = mysqli_fetch_assoc($queryq)){
                                                            $vendedor = $row['nick'];
                                                        }
                                                        if($filtro == 'vendedor'){
                                                            $filter = $_POST['abc'];
                                                            if($filter == $vendedor && $datafim < $dataatual){
                                                                echo "<tr><td>".$artigo."</td><td>".$vendedor."</td><td>".$valorl."</td><td>".$comprador."</td><td>".$datafim." ".$horafim."</td>";
                                                            }
                                                        }
                                                        else{
                                                            if($filtro == 'comprador'){
                                                                $filter = $_POST['abc'];
                                                                if($filter == $comprador && $datafim < $dataatual){
                                                                    echo "<tr><td>".$artigo."</td><td>".$vendedor."</td><td>".$valorl."</td><td>".$comprador."</td><td>".$datafim." ".$horafim."</td>";
                                                                }
                                                            }else{
                                                                if($filtro == 'licitador'){
                                                                    $filter = $_POST['abc'];
                                                                    if($filter == $comprador ){
                                                                        echo "<tr><td>".$artigo."</td><td>".$vendedor."</td><td>".$valorl."</td><td>".$comprador."</td><td>".$datafim." ".$horafim."</td>";
                                                                    }
                                                                }
                                                                else{
                                                                    if($filtro == 'l_todos'){
                                                                        echo "<tr><td>".$artigo."</td><td>".$vendedor."</td><td>".$valorl."</td><td>".$comprador."</td><td>".$datafim." ".$horafim."</td>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo "</table>";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                    ?>
                </div>
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
