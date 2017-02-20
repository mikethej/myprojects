<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detalhes | Tuga-Buy</title>
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
							<a href="index"><img src="images/home/logo.png" alt=""/></a>
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
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
                                <?php
                                    $idi = $_GET['id'];
                                    echo "<img src='uploads/".$idi.".jpg' class='fotosartigo'/>"
                                ?>
							</div>						
						</div>
						<div class="col-sm-7">
							<div class="product-information" id = "tableHolder"><!--/product-information-->
                                <?php
                                    include 'connect.php';
                                    $idi = $_GET['id'];
                                    $sqli = "SELECT * FROM artigos WHERE item_id = '".$idi."';"; //Procura os artigo com o id do produto
                                    $quer = mysqli_query($conn, $sqli) or die("Error");
                                    while($row = mysqli_fetch_assoc($quer)){
                                        $nome = $row['designacao'];
                                        $valor = $row['valor_base'];
                                        $descricao = $row['descricao'];
                                        $dataini = $row['data_entr'];
                                        $idp = $row['user_id'];
                                        $datafim = $row['data_fim'];
                                        $horafim = $row['hora_final'];
                                        $mvalor = $row['melhor_val'];
                                    }
                                    $sqlp = "SELECT * FROM licitacoes WHERE item_id = '".$idi."';"; //Procura as licitacoes para o produto da pagina
                                    $queryp = mysqli_query($conn, $sqlp) or die("Error");
                                    $vatual = $valor;
                                    $raw = array();
                                    if (!empty($queryp)){
                                        while($row = mysqli_fetch_assoc($queryp)){
                                            $valorl = $row['valor'];
                                            array_push($raw, $valorl);
                                        }
                                        foreach($raw as &$value){
                                            if($value > $vatual){
                                                $vatual=$value;
                                            }
                                        }
                                    } //ve qual e o valor mais elevado
                                    $sql = "SELECT * FROM utilizadores WHERE user_id = '".$idp."';"; //Procura o vendedor do artigo atual
                                    $query = mysqli_query($conn, $sql) or die("Error");
                                    while($row = mysqli_fetch_assoc($query)){
                                        $nick = $row['nick'];
                                    }
                                    echo"<h2>".$nome."</h2>
                                    <p>Descriç&atilde;o do produto:".$descricao."</p>
                                    <p>Data de Fim:".$datafim."</p>
                                    <p>Palavras-chave:";
                                    echo "<ul>";
                                    $sqlo = "SELECT * FROM palavraschave WHERE item_id = '".$idi."';"; //Procura as palavras-chave do artigo atual
                                    $queryo = mysqli_query($conn, $sqlo) or die("Error");
                                    while($row = mysqli_fetch_assoc($queryo)){
                                        $pchave = $row['pal_chave'];
                                        echo "<li>".$pchave."<li>";
                                    }
                                    echo "</ul>";
                                    echo "</p>
                                    <p>Vendedor: ".$nick."</p>
                                    <span>";
                                    $sqli = "SELECT * FROM licitacoes WHERE valor = '".$vatual."';"; //Procura a licitacao do valor mais elevado
                                    $queryi = mysqli_query($conn, $sqli) or die("Error");
                                    while($row = mysqli_fetch_assoc($queryi)){
                                        $idl = $row['user_id'];
                                        $datalicit = $row['data_licit'];
                                        $anon = $row['anon'];
                                    }
                                    $sql = "SELECT * FROM utilizadores WHERE user_id = '".$idl."';"; //Procura o utilizador que fez a maior licitacao
                                    $query = mysqli_query($conn, $sql) or die("Error");
                                    while($row = mysqli_fetch_assoc($query)){
                                        $nickl = $row['nick'];
                                    }?>
									<div id = 'show'>
                                    <div id = 'fazrefresh'>
                                    <?php echo "<span>€ ".$vatual."</span>";
                                    $data = date("Y-m-d");
                                    $hora = date("H:i:s");
                                    if((strtotime($data)<strtotime($datafim) || (strtotime($data) == strtotime($datafim) && strtotime($hora) < strtotime($horafim))) and (strtotime($data)>strtotime($dataini))){ //Para so poderem licitar se o tempo nao acabar ou comecar
                                        if ($anon ==1){
                                            echo "<b>Licitador: </b>An&oacute;nimo<br>";
                                        }
                                        else{
                                            echo "<b>Licitador: </b>".$nickl."<br>";
                                        }
                                        echo"<b>Data: </b>".$datalicit."</div>";
                                    }
                                if ($_COOKIE['nick'] == $nick){
                                    echo"<button type='button' class='btn btn-fefault cart'>
                                    <a href='edit?id=".$idi."' style='color:black;'>Editar</a></button>";
                                    echo"<button type='button' class='btn btn-fefault cart'>
                                    <a href='remove?id=".$idi."' style='color:black;'>Remover Artigo</a></button>
                                    </span>";
                                }
                                else{
                                    if((strtotime($data)<strtotime($datafim) || (strtotime($data) == strtotime($datafim) && strtotime($hora) < strtotime($horafim))) and (strtotime($data)>strtotime($dataini))){
                                        echo "<div class='col-xs-11'>
                                        <form action='licitacao?id=".$idi."' method='POST'>
                                            <label for='ex1'>Valor</label>
                                              <input style='width:100px' id='ex1' type='number' min='".$vatual."' step='0.01' value='".$vatual."' name = 'lici'></div>
                                              <br>
                                              <button type='submit' value = 'submit' class='btn btn-fefault cart' name = 'submit'>Licitar</button>
                                              <input style = 'height:15px;' type='checkbox' name='anon' value='1'> An&oacute;nimo                                   
                                        </form>
                                        </div>";
                                    }
                                    else{
                                        if(strtotime($data)<strtotime($dataini)){
                                            echo "<br><br><br><b>O prazo de licitaç&atilde;o ainda n&atilde;o começou</b>";
                                        }
                                        else{
                                            echo "<br><br><br><b>O prazo de licitaç&atilde;o j&aacute; acabou</b>";
                                        }
                                    }
                                }
				            ?>
                            <div id = "auto"></div>
                            <div id = "final"></div>
                            <script type="text/javascript">
                                setInterval(function(){
                                    $('#fazrefresh').load('product-details?id=<?php echo $idi;?> #fazrefresh');
                                }, 5000);
                                setInterval(function(){
                                    $('#auto').load('auto #show');
                                }, 5000);
                                setInterval(function(){
                                    $('#final').load('final #final');
                                },5000);
                            </script>
                            </div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Adicionar Coment&aacute;rio</a></li>
                                <li><a href="#details" data-toggle="tab">Coment&aacute;rios</a></li>
                                <li><a href="#mensagem" data-toggle="tab">Enviar Mensagem</a></li>
                                <li><a href="#licitacoes" data-toggle="tab">Licitaç&otilde;es</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details">
								<?php
                                    include 'connect.php';
                                    $idi = $_GET['id'];
                                    $sqli = "SELECT * FROM comentarios WHERE item_id = '".$idi."';";  //Procurar comentarios do artigo atual
                                    $quer = mysqli_query($conn, $sqli) or die("Error");
                                    while($row = mysqli_fetch_assoc($quer)){
                                        $coment = $row['comentario'];
                                        $user = $row['nome'];
                                        echo"<div style = 'margin-left:30px;'>
                                            <h4>".$user."</h4>
                                            <p style='font-style:5px;'>".$coment."</p>
                                        </div>";
                                    }
                                ?>
							</div>
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
                                    <?php
									   echo "<form action='add_comentario?id=".$idi."' method='POST'>"
                                    ?>
										<span>
											<input type="text" style="margin-left:0px;" placeholder="Nome" name = "nome"/>
										</span>
										<textarea name="comentario" placeholder="Insira aqui o seu coment&aacute;rio"></textarea>
										<input type="submit" class="btn btn-default pull-right" name="submit" value="Enviar coment&aacute;rio">
									</form>
								</div>
                            </div>
                            <div class="tab-pane fade" id="mensagem" >
								<div class="col-sm-12">
                                    <?php
									echo "<form action='add_msg?id=".$idi."' method='POST'>"
                                    ?>
										<textarea name="mensagem" placeholder="Insira aqui a sua mensagem"></textarea>
										<input type="submit" class="btn btn-default pull-right" name="submit" value="Enviar mensagem">
									</form>
								</div>
                            </div>
                            <div class="tab-pane fade" id="licitacoes" >
								<div class="col-sm-12">
                                    <div class="tab-pane fade  active in" id="entrada">
                                <?php
                                    include 'connect.php';
                                    $idi = $_GET['id'];
                                    echo "<table class='table table-list-search'>";	
                                    echo "<tr><td>Artigo</td><td>Vendedor</td><td>&Uacute;ltima licitaç&atilde;o</td><td>Licitador</td><td>Data da Licitaç&atilde;o</td>";
                                    $dataatual = date("Y-m-d");
                                    $horaatual = date("H:i:s");
                                   
                                    $sqle = "SELECT * FROM artigos WHERE item_id = '".$idi."';";
                                    $quera = mysqli_query($conn, $sqle) or die("Error");
                                    while($row = mysqli_fetch_assoc($quera)){
                                        $valor = $row['valor_base'];
                                        $id_vendedor = $row['user_id'];                                            
                                    }

                                    $sqla = "SELECT * FROM licitacoes WHERE item_id = ".$idi.";";
                                    $quer = mysqli_query($conn, $sqla) or die("Error");

                                    $vatual = $valor;
                                    $raw = array();
                                    if (!empty($quer)){
                                        while($row = mysqli_fetch_assoc($quer)){
                                            $valorl = $row['valor'];
                                            array_push($raw, $valorl);
                                        }
                                        foreach($raw as &$value){
                                            if($value > $vatual){
                                                $vatual=$value;
                                            }
                                        }
                                    }
                                    $sqli = "SELECT * FROM licitacoes WHERE valor = '".$vatual."';";
                                    $queryi = mysqli_query($conn, $sqli) or die("Error");
                                    while($row = mysqli_fetch_assoc($queryi)){
                                        $id_licitador = $row['user_id'];
                                        $anon = $row['anon'];
                                        $datalicit = $row['data_licit'];
                                    }
                                    $sqlo = "SELECT * FROM utilizadores WHERE user_id = '".$id_licitador."';";
                                    $queryo = mysqli_query($conn, $sqlo) or die("Error");
                                    while($row = mysqli_fetch_assoc($queryo)){
                                        $licitador = $row['nick'];
                                    }
                                    $sqlq = "SELECT * FROM utilizadores WHERE user_id = '".$id_vendedor."';";
                                    $queryq = mysqli_query($conn, $sqlq) or die("Error");
                                    while($row = mysqli_fetch_assoc($queryq)){
                                        $vendedor = $row['nick'];
                                    }
                                    $sqlu = "SELECT * FROM artigos WHERE item_id = '".$idi."';";
                                    $queryu = mysqli_query($conn, $sqlu) or die("Error");
                                    while($row = mysqli_fetch_assoc($queryu)){
                                        $artigo = $row['designacao'];
                                    }
                                    echo "<tr><td>".$artigo."</td><td>".$vendedor."</td><td>".$vatual."</td><td>";
                                    if ($anon == 1){
                                        echo "An&oacute;nino</td><td>";
                                    }
                                    else{
                                       echo $licitador."</td><td>";
                                    }
                                    echo $datalicit."</td>";
                                    
                                    echo "</table>";
                                ?>
                            </div>
								</div>
                            </div>
					   </div>
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
