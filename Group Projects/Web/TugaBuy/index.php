<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ofertas do dia | Tuga-Buy</title>
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
	<section>
		<div class="container">
			<div class="row">
					<div><!--recommended_items-->
						<h2 class="title text-center">Ofertas do dia</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=15"><img src="uploads/15.jpg" alt="1" id = "iperfil"/></a>
													<?php
                                                        include 'connect.php';
                                                        $sql = "SELECT * FROM artigos WHERE item_id = 15;"; //Procura tudo sobre o artigo
                                                        $query = mysqli_query($conn, $sql) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($query)){
                                                            $valorl = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $sqlp = "SELECT * FROM licitacoes WHERE item_id = 15;"; //Procura licitacoes do artigo
                                                        $queryp = mysqli_query($conn, $sqlp) or die("Error2");
                                                        $vatua = $valorl;
                                                        if(!empty($queryp)){
                                                            while($row = mysqli_fetch_assoc($queryp)){
                                                                $valorl = $row['valor'];                                            
                                                                $raw = array($valorl);
                                                            }
                                                            foreach ($raw as $value){
                                                                if($value > $vatua){
                                                                    $vatua=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatua."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=2"><img src="uploads/2.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $sq = "SELECT * FROM artigos WHERE item_id = 2;"; //Procura tudo sobre o artigo
                                                        $quer = mysqli_query($conn, $sq) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($quer)){
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $s = "SELECT * FROM licitacoes WHERE item_id = '2';"; //Procura licitacoes do artigo
                                                        $qu = mysqli_query($conn, $s) or die("Error2");
                                                        $vatualt = $valor;
                                                        if(!empty($qu)){
                                                            while($row = mysqli_fetch_assoc($qu)){
                                                                $valorlt = $row['valor'];                                            
                                                                $rawt = array($valorlt);
                                                            }
                                                            foreach ($rawt as $value){
                                                                if($value > $vatualt){
                                                                    $vatualt=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualt."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=2" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=3"><img src="uploads/3.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $sq = "SELECT * FROM artigos WHERE item_id = 3;"; //Procura tudo sobre o artigo
                                                        $quer = mysqli_query($conn, $sq) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($quer)){
                                                            $valorlb = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $s = "SELECT * FROM licitacoes WHERE item_id = 3;"; //Procura licitacoes do artigo
                                                        $qu = mysqli_query($conn, $s) or die("Error2");
                                                        $vatualb = $valorlb;
                                                        if(!empty($qu)){
                                                            while($row = mysqli_fetch_assoc($qu)){
                                                                $valorlb = $row['valor'];                                            
                                                                $rawb = array($valorlb);
                                                            }
                                                            foreach ($rawb as $value){
                                                                if($value > $vatualb){
                                                                    $vatualb=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualb."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=3" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
                                    <div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=4"><img src="uploads/4.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $sqttb = "SELECT * FROM artigos WHERE item_id = 4;"; //Procura tudo sobre o artigo
                                                        $querttb = mysqli_query($conn, $sqttb) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($querttb)){
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $stb = "SELECT * FROM licitacoes WHERE item_id = '4';"; //Procura licitacoes do artigo
                                                        $qutb = mysqli_query($conn, $stb) or die("Error2");
                                                        $vatualtb = $valor;
                                                        if(!empty($qutb)){
                                                            while($row = mysqli_fetch_assoc($qutb)){
                                                                $valorltb = $row['valor'];                                            
                                                                $rawtb = array($valorltb);
                                                            }
                                                            foreach ($rawtb as $value){
                                                                if($value > $vatualtb){
                                                                    $vatualtb=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualtb."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=4" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=5"><img src="uploads/5.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $sqrell = "SELECT * FROM artigos WHERE item_id = 5;"; //Procura tudo sobre o artigo
                                                        $querrell = mysqli_query($conn, $sqrell) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($querrell)){
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $srel = "SELECT * FROM licitacoes WHERE item_id = '5';"; //Procura licitacoes do artigo
                                                        $qurel = mysqli_query($conn, $srel) or die("Error2");
                                                        $vatualrrel = $valor;
                                                        if(!empty($qurel)){
                                                            while($row = mysqli_fetch_assoc($qurel)){
                                                                $valorlrrel = $row['valor'];                                            
                                                                $rawr = array($valorlrrel);
                                                            }
                                                            foreach ($rawr as $value){
                                                                if($value > $vatualrrel){
                                                                    $vatualrrel=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualrrel."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=5" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=6"><img src="uploads/6.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $sq = "SELECT * FROM artigos WHERE item_id = 6;"; //Procura tudo sobre o artigo
                                                        $quer = mysqli_query($conn, $sq) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($quer)){
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $s = "SELECT * FROM licitacoes WHERE item_id = '6';"; //Procura licitacoes do artigo
                                                        $qu = mysqli_query($conn, $s) or die("Error2");
                                                        $vatualr = $valor;
                                                        if(!empty($qu)){
                                                            while($row = mysqli_fetch_assoc($qu)){
                                                                $valorlr = $row['valor'];                                            
                                                                $rawr = array($valorlr);
                                                            }
                                                            foreach ($rawr as $value){
                                                                if($value > $vatualr){
                                                                    $vatualr=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualr."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=9" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=10"><img src="uploads/10.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        include 'connect.php';
                                                        $sql = "SELECT * FROM artigos WHERE item_id = 10;"; //Procura tudo sobre o artigo
                                                        $query = mysqli_query($conn, $sql) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($query)){
                                                            $mvalor = $row['melhor_val'];
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $sqlp = "SELECT * FROM licitacoes WHERE item_id = 10;"; //Procura licitacoes do artigo
                                                        $queryp = mysqli_query($conn, $sqlp) or die("Error2");
                                                        $vatual = $valor;
                                                        if(!empty($queryp)){
                                                            while($row = mysqli_fetch_assoc($queryp)){
                                                                $valorl = $row['valor'];                                            
                                                                $raw = array($valorl);
                                                            }
                                                            foreach ($raw as $value){
                                                                if($value > $vatual){
                                                                    $vatual=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatual."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=1" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=7"><img src="uploads/7.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $sq = "SELECT * FROM artigos WHERE item_id = 7;"; //Procura tudo sobre o artigo
                                                        $quer = mysqli_query($conn, $sq) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($quer)){
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $s = "SELECT * FROM licitacoes WHERE item_id = '7';"; //Procura licitacoes do artigo
                                                        $qu = mysqli_query($conn, $s) or die("Error2");
                                                        $vatualt = $valor;
                                                        if(!empty($qu)){
                                                            while($row = mysqli_fetch_assoc($qu)){
                                                                $valorlt = $row['valor'];                                            
                                                                $rawt = array($valorlt);
                                                            }
                                                            foreach ($rawt as $value){
                                                                if($value > $vatualt){
                                                                    $vatualt=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualt."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=2" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=11"><img src="uploads/11.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $sq = "SELECT * FROM artigos WHERE item_id = 11;"; //Procura tudo sobre o artigo
                                                        $quer = mysqli_query($conn, $sq) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($quer)){
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $stc = "SELECT * FROM licitacoes WHERE item_id = '11';"; //Procura licitacoes do artigo
                                                        $qutc = mysqli_query($conn, $stc) or die("Error2");
                                                        $vatualtc = $valor;
                                                        if(!empty($qu)){
                                                            while($row = mysqli_fetch_assoc($qutc)){
                                                                $valortc = $row['valor'];                                            
                                                                $rawtc = array($valorltc);
                                                            }
                                                            foreach ($rawtc as $value){
                                                                if($value > $vatualtc){
                                                                    $vatualtc=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualtc."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=3" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=12"><img src="uploads/12.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $rawte = array();
                                                        $squq = "SELECT * FROM artigos WHERE item_id = 12;"; //Procura tudo sobre o artigo
                                                        $queruq = mysqli_query($conn, $squq) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($queruq)){
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $sqo = "SELECT * FROM licitacoes WHERE item_id = '12';"; //Procura licitacoes do artigo
                                                        $quo = mysqli_query($conn, $sqo) or die("Error2");
                                                        $vatualte = $valor;
                                                        if(!empty($quo)){
                                                            while($row = mysqli_fetch_assoc($quo)){
                                                                $valorlte = $row['valor'];                                            
                                                                array_push($rawte, $valorlte);
                                                            }
                                                            foreach ($rawte as $value){
                                                                if($value > $vatualte){
                                                                    $vatualte=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualte."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=12" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=13"><img src="uploads/13.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $sq = "SELECT * FROM artigos WHERE item_id = 13;"; //Procura tudo sobre o artigo
                                                        $quer = mysqli_query($conn, $sq) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($quer)){
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $sqlm = "SELECT * FROM licitacoes WHERE item_id = '13';"; //Procura licitacoes do artigo
                                                        $qum = mysqli_query($conn, $sqlm) or die("Error2");
                                                        $vatualm = $valor;
                                                        if(!empty($qum)){
                                                            while($row = mysqli_fetch_assoc($qum)){
                                                                $valorlm = $row['valor'];                                            
                                                                $rawm = array($valorlm);
                                                            }
                                                            foreach ($rawm as $value){
                                                                if($value > $vatualm){
                                                                    $vatualm=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualm."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=13" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="product-details?id=14"><img src="uploads/14.jpg" alt="" id = "iperfil"/></a>
													<?php
                                                        $sq = "SELECT * FROM artigos WHERE item_id = 14;"; //Procura tudo sobre o artigo
                                                        $quer = mysqli_query($conn, $sq) or die("Error1");
                                                        while($row = mysqli_fetch_assoc($quer)){
                                                            $valor = $row['valor_base'];
                                                            $nome = $row['designacao'];
                                                        }
                                                        $sbr = "SELECT * FROM licitacoes WHERE item_id = '14';"; //Procura licitacoes do artigo
                                                        $qubr = mysqli_query($conn, $sbr) or die("Error2");
                                                        $vatualbr = $valor;
                                                        if(!empty($qubr)){
                                                            while($row = mysqli_fetch_assoc($qubr)){
                                                                $valorlbr = $row['valor'];                                            
                                                                $rawbr = array($valorlbr);
                                                            }
                                                            foreach ($rawbr as $value){
                                                                if($value > $vatualbr){
                                                                    $vatualbr=$value;
                                                                }
                                                            }
                                                        } // ve qual e a maior licitacao
                                                        
                                                        echo "<h2>".$vatualbr."€</h2>";
                                                        echo "<p>".$nome."</p>";
                                                    ?>
													<a href="product-details?id=9" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Faça a sua oferta</a>
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
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->	
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
