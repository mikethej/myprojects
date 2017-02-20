<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perfil | Tuga-Buy</title>
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
                                        echo '<li><a href="perfil" class="active">'. $_COOKIE['nick'] .'</a></li>';
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
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    <section>
    <div id="contact-page" class="container">
        <div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">
	                <h2 class="title text-center">Meu Perfil</h2>
                    <div id = "contactos">
                        <div class="container">
                            <div class="row">
                                <div >
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4">
                                                <?php
                                                echo "<img src='uploads/".$_COOKIE['nick'].".jpg' alt='".$nick."' width='170' height='170' />"
                                                ?>
                                            </div>
                                            <div>
                                                <?php
                                                    include 'connect.php';
                                                    $nick = $_COOKIE['nick'];

                                                    $sql = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
                                                    $query = mysqli_query($conn, $sql) or die("Error");
                                                    while($row = mysqli_fetch_assoc($query)){
                                                        $nick = $row['nick'];
                                                        $email = $row['email'];
                                                        $bday = $row['data_nascimento'];
                                                        $nome = $row['nome'];
                                                        $apelido = $row['apelido'];
                                                        $distrito = $row['distrito'];
                                                    }
                                                    echo "<br/>";
                                                    echo "<h4>".$nome." ".$apelido."</h4>";
                                                    echo "Nick:                              ".$nick;
                                                    echo "<br/>";
                                                    echo "Email: ".$email;
                                                    echo "<br/>";
                                                    echo "Distrito: ".$distrito;
                                                    echo "<br/>";
                                                    echo "Data de Nascimento: ".$bday."</p>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <?php
                                            include 'connect.php';
                                            $nick = $_COOKIE['nick'];
                                            $sql = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
                                            $query = mysqli_query($conn, $sql) or die("Error");
                                            while($row = mysqli_fetch_assoc($query)){
                                                $idp = $row['user_id'];
                                            }
                                            $sqli = "SELECT * FROM artigos WHERE user_id = '".$idp."';";
                                            $quer = mysqli_query($conn, $sqli) or die("Error");?>
                                            <br/>
                                            <h2 class='title text-center'>Os meus itens</h2>
                                            <form action="<?=$_SERVER['PHP_SELF'];?>" method='POST' >
                                                Procure artigos por:
                                                <select name = 'pesquisa' style='width:200px;' id ='alinhamento' onchange='optionChecka()'>
                                                    <option selected disabled>--Pesquisar--</option>
                                                    <option value='nome'>Nome</option>
                                                    <option value='descricao'>Descrição</option>
                                                    <option value='categoria'>Palavra-Chave</option>
                                                    <option value='dataf'>Data final do Leilão</option>
                                                    <option value='base'>Preço base</option>
                                                    <option value='todos'>Todos</option>
                                                </select>
                                                <input type='text' name='abc' id='texto' style='display: none;'><br>
                                                <input type='number' name='valor' id='numero' style='display: none;' min='0'>
                                                <input type='date' name='data' id='data' style='display: none;'>
                                                <input type='submit' name='submit' value='Procurar' style="margin-left:180px;"><br><br>
                                                <script type='text/javascript'>
                                                    function optionChecka(){
                                                        var option = document.getElementById('alinhamento').value;
                                                        if(option == 'todos'){
                                                            document.getElementById('texto').style.display = 'none';
                                                            document.getElementById('numero').style.display ='none';
                                                            document.getElementById('data').style.display ='none';
                                                        }
                                                        else{
                                                            if(option =='base'){
                                                                document.getElementById('texto').style.display ='none';
                                                                document.getElementById('numero').style.display ='inline-block';
                                                                document.getElementById('data').style.display ='none';
                                                            }
                                                            else{
                                                                if(option =='dataf'){
                                                                document.getElementById('texto').style.display ='none';
                                                                document.getElementById('numero').style.display ='none';
                                                                document.getElementById('data').style.display ='inline-block';
                                                                }
                                                                else{
                                                                    document.getElementById('texto').style.display ='inline-block';
                                                                    document.getElementById('numero').style.display ='none';
                                                                    document.getElementById('data').style.display ='none';
                                                                }
                                                            }
                                                        }
                                                    }
                                                </script>
                                            </form>
                                            <?php
                                            $submit = $_POST['submit'];
                                            if($submit){
                                                $filtro = $_POST['pesquisa'];
                                                echo "<div class='col-md-9'><table class='table table-list-search'>";
                                                echo "<tr><td>ID</td><td>Designação</td><td>User ID</td><td>Valor Base</td><td>Descrição</td><td>Data de Entrada</td><td>Data do Fim</td><td>Hora Final</td><td>Melhor Licitação</td><td>Melhor Valor</td>";
                                                
                                            if($filtro == 'nome'){
                                                $filter = $_POST['abc'];
                                                $sqli = "SELECT * FROM artigos WHERE designacao='".$filter."' AND user_id='".$idp."';";
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
                                                    $sqli = "SELECT * FROM artigos WHERE descricao='".$filter."' AND user_id='".$idp."';";
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
                                                    if($filtro == 'categoria'){
                                                        $filter = $_POST['abc'];
                                                        $sqli = "SELECT * FROM palavraschave WHERE pal_chave= '".$filter."';";
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
                                                        if($filtro == 'dataf'){
                                                            $filter = $_POST['data'];
                                                            $sqli = "SELECT * FROM artigos WHERE data_fim='".$filter."' AND user_id='".$idp."';";
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
                                                                $sqli = "SELECT * FROM artigos WHERE valor_base='".$filter."' AND user_id='".$idp."';";
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
                                                                $sqlia = "SELECT * FROM artigos WHERE user_id='".$idp."';";
                                                                $resia = mysqli_query($conn, $sqlia) or die("Erro");
                                                                while($row = mysqli_fetch_assoc($resia)){
                                                                    $idi = $row['item_id'];
                                                                    $sqll = "SELECT * FROM artigos WHERE item_id='".$idi."' AND user_id='".$idp."' GROUP BY designacao;";
                                                                    $resal = mysqli_query($conn, $sqll) or die("Erro aqui79");
                                                                    while($raw = mysqli_fetch_array($resal, MYSQL_NUM)){
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#notif" data-toggle="tab">Notificaç&otilde;es</a></li>
                                <li><a href="#entrad" data-toggle="tab">A licitar</a></li>
                                <li><a href="#termin" data-toggle="tab">Leil&otilde;es terminados</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade  active in" id="notif">
                                <?php
                                    include 'connect.php';
                                    $sql = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
                                    $query = mysqli_query($conn, $sql) or die("Error");
                                    while($row = mysqli_fetch_assoc($query)){
                                        $idp = $row['user_id'];
                                    }
                                    echo "<table class='table table-list-search'>";
                                    echo "<thead><th>Artigo</th></thead>";
                                    $sqlxx = "SELECT * FROM notificacoes;";
                                    $queryxx = mysqli_query($conn, $sqlxx) or die("Erro cenas");
                                    while($row = mysqli_fetch_assoc($queryxx)){
                                        $vendedor = $row['vendedor_id'];
                                        $comprador = $row['comprador_id'];
                                        $idi = $row['item_id'];
                                        $comprador_check = $row['comprador_check'];
                                        $vendedor_check = $row['vendedor_check'];
                                        $sqlv = "SELECT * FROM artigos WHERE item_id = '".$idi."';";
                                        $querv = mysqli_query($conn, $sqlv) or die("Error");
                                        while($row = mysqli_fetch_assoc($querv)){
                                            $nomeart = $row['designacao'];
                                        }
                                        if($idp == $vendedor){
                                            if($vendedor_check == 1){
                                                echo "<tr><td><a href='notificacoes?id=".$idi."''>Acabou de vender: ".$nomeart."</a></td></tr><br>";
                                            }
                                            else{
                                                echo "<tr><td class='vista'><a href='notificacoes?id=".$idi."''>Acabou de vender: ".$nomeart."</a></td></tr><br>";
                                            }
                                        }
                                        if($idp == $comprador){
                                            if($comprador_check == 1){
                                                echo "<tr><td><a href='notificacoes?id=".$idi."''>Acabou de comprar: ".$nomeart."</a></td></tr><br>";
                                            }
                                            else{
                                                echo "<tr><td class='vista'><a href='notificacoes?id=".$idi."'' >Acabou de comprar: ".$nomeart."</a></td></tr><br>";
                                            }
                                        }
                                    }
                                    echo "</table>";
                                ?>
                            </div>
                            <div class="tab-pane fade" id="entrad">
                                
                                <form action=''  method='POST' onchange='pesquisar();'>
                                    Ordenar licitaç&otilde;es por:
                                    <select name = 'pesquisaa' style='width:200px;' id ='alinhamentoa' onchange='optionCheckado()'>
                                        <option selected disabled>--Pesquisar--</option>
                                        <option value='nomeart'>Nome do artigo</option>
                                        <option value='datafinal'>Data final do Leilão</option>
                                        <option value='preco'>Preço final</option>
                                        <option value='comprador'>Autor da licitação mais alta</option>
                                    </select>
                                    <input type='text' name='abcd' id='textoa' style='display: none;'><br>
                                    <input type='number' name='valora' id='numeroa' style='display: none;' min='0'>
                                    <input type='date' name='dataf' id='dataa' style='display: none;'>
                                </form>
                                <script type="text/javascript">
                                    function pesquisar(){
                                        var optio = document.getElementById('alinhamentoa').value;
                                        if(optio == 'nomeart' || optio == 'datafinal' || optio == 'preco' || optio == 'comprador'){
                                            document.getElementById('mostrar').style.display = 'block';
                                        }
                                        else{
                                            document.getElementById('mostrar').style.display = 'none';
                                        }
                                    }
                                </script>
                                <div id = 'mostrar' style='display: none;'>
                                        <?php
                                            $filtr = $_POST['pesquisaa'];
                                            //if($submit){
                                                $valores = array();
                                                $nick = $_COOKIE['nick'];
                                                echo "<table class='table table-list-search' id='myTable' class='tablesorter'>";	
                                                echo "<thead><tr><td>Artigo</td><td>Vendedor</td><td>&Uacute;ltima licitaç&atilde;o feita</td><td>Prazo Final</td><td>Licitador</td><td></td><td></td><td></thead><tbody>";
                                                $dataatual = date("Y-m-d");
                                                $horaatual = date("H:i:s");
                                                $sql = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
                                                $query = mysqli_query($conn, $sql) or die("Error");
                                                while($row = mysqli_fetch_assoc($query)){
                                                    $idp = $row['user_id'];
                                                }
                                                if($filtr=='comprador'){
                                                    $sqla = "SELECT * FROM licitacoes, artigos WHERE licitacoes.user_id = '".$idp."' AND artigos.user_id != '".$idp."' AND licitacoes.item_id = artigos.item_id ORDER BY artigos.user_id ASC;";
                                                }
                                                else{
                                                    if($filtr=='nomeart'){
                                                        $sqla = "SELECT * FROM licitacoes, artigos WHERE licitacoes.user_id = '".$idp."' AND artigos.user_id != '".$idp."' AND licitacoes.item_id = artigos.item_id ORDER BY artigos.designacao ASC;";
                                                    }
                                                    else{
                                                        if($filtr=='preco'){
                                                            $sqla = "SELECT * FROM licitacoes, artigos WHERE licitacoes.user_id = '".$idp."' AND artigos.user_id != '".$idp."' AND licitacoes.item_id = artigos.item_id ORDER BY licitacoes.valor ASC;";
                                                        }
                                                        else{
                                                            $sqla = "SELECT * FROM licitacoes, artigos WHERE licitacoes.user_id = '".$idp."' AND artigos.user_id != '".$idp."' AND licitacoes.item_id = artigos.item_id ORDER BY artigos.data_fim ASC;";
                                                        }
                                                    }
                                                }
                                                $quer = mysqli_query($conn, $sqla) or die("Error");
                                                while($row = mysqli_fetch_assoc($quer)){
                                                    $idprod = $row['item_id'];
                                                    $sqle = "SELECT * FROM artigos WHERE item_id = '".$idprod."' ORDER BY data_fim ASC;";
                                                    $quera = mysqli_query($conn, $sqle) or die("Error");
                                                    while($row = mysqli_fetch_assoc($quera)){
                                                        $valor = $row['valor_base'];
                                                        $idv = $row['user_id'];
                                                    }
                                                    $sqlp = "SELECT * FROM licitacoes WHERE item_id = '".$idprod."';";
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
                                                    }
                                                    $valores[$idprod] = $vatual;
                                                }
                                                foreach(array_keys($valores) as $idpro){
                                                    $vatual = $valores[$idpro];
                                                    $sqli = "SELECT * FROM licitacoes WHERE valor = '".$vatual."';";
                                                    $queryi = mysqli_query($conn, $sqli) or die("Error");
                                                    while($row = mysqli_fetch_assoc($queryi)){
                                                        $idpe = $row['user_id'];
                                                        $datafinal = $row['data_licit'];
                                                    }
                                                    $sqlo = "SELECT * FROM utilizadores WHERE user_id = '".$idpe."';";
                                                    $queryo = mysqli_query($conn, $sqlo) or die("Error");
                                                    while($row = mysqli_fetch_assoc($queryo)){
                                                        $licitador = $row['nick'];
                                                    }
                                                    $sqlt = "SELECT * FROM artigos WHERE item_id = '".$idpro."';";
                                                    $quert = mysqli_query($conn, $sqlt) or die("Error");
                                                    while($row = mysqli_fetch_assoc($quert)){
                                                        $idv = $row['user_id'];
                                                        $artigo = $row['designacao'];
                                                        $datafim = $row['data_fim'];
                                                        $horafim = $row['hora_final'];
                                                    }
                                                    $sqlq = "SELECT * FROM utilizadores WHERE user_id = '".$idv."';";
                                                    $queryq = mysqli_query($conn, $sqlq) or die("Error");
                                                    while($row = mysqli_fetch_assoc($queryq)){
                                                        $vendedor = $row['nick'];
                                                    }
                                                    if(strtotime($dataatual) < strtotime($datafim) || (strtotime($dataatual) == strtotime($datafim) && strtotime($horaatual) < strtotime($horafim))){
                                                        echo "<tr><td>".$artigo."</td><td>".$vendedor."</td><td> € ".$vatual."</td><td>".$datafim." ".$horafim."</td><td>".$licitador."</td>";

                                                        if($licitador != $_COOKIE['nick']){
                                                            echo "<td><form action = 'licitacao?id=".$idpro."' method='POST'>
                                                                <input style='width:100px' type='number' min='".$vatual."' step='0.01' value='".$vatual."' name = 'lici'>
                                                                <button type='submit' value = 'submit' class='btn btn-warning' name = 'submit'>Licitar</button>
                                                            </form></td>";
                                                        }
                                                        else{
                                                            echo "<td></td>";
                                                        }
                                                        echo "<td><div class='onoffswitch'>
                                                            <form action = 'automatica?id=".$idpro."' method='POST'>
                                                                <button type='submit' value = 'submit' class='btn btn-warning' name = 'submit'>Licitaç&atilde;o Autom&aacute;tica</button>
                                                            </form>
                                                        </div></td>";
                                                    }
                                                }
                                                echo "</tbody></table>";
                                            //}
                                        ?>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="termin">
                                <?php
                                    include 'connect.php';
                                    $valores = array();
                                    $nick = $_COOKIE['nick'];
                                    echo "<table class='table table-list-search sortable'>";	
                                    echo "<tr><td>Artigo</td><td>Vendedor</td><td>&Uacute;ltima licitaç&atilde;o feita</td><td>Prazo Final</td><td>Licitador</td><td>";
                                    $dataatual = date("Y-m-d");
                                    $horaatual = date("H:i:s");
                                    $sql = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
                                    $query = mysqli_query($conn, $sql) or die("Error");
                                    while($row = mysqli_fetch_assoc($query)){
                                        $idp = $row['user_id'];
                                    }
                                    $sqla = "SELECT * FROM licitacoes WHERE user_id = '".$idp."';";
                                    $quer = mysqli_query($conn, $sqla) or die("Error");
                                    $arr = array();
                                    while($row = mysqli_fetch_assoc($quer)){
                                        $idprod = $row['item_id'];
                                        $sqle = "SELECT * FROM artigos WHERE item_id = '".$idprod."';";
                                        $quera = mysqli_query($conn, $sqle) or die("Error");
                                        while($row = mysqli_fetch_assoc($quera)){
                                            $valor = $row['valor_base'];
                                            $idv = $row['user_id'];
                                        }
                                        $sqlp = "SELECT * FROM licitacoes WHERE item_id = '".$idprod."';";
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
                                        }
                                        array_push($valores, $vatual);
                                        $valoress = array_unique($valores);
                                    }
                                    foreach($valoress as $vatual){
                                        $sqli = "SELECT * FROM licitacoes WHERE valor = '".$vatual."';";
                                        $queryi = mysqli_query($conn, $sqli) or die("Error");
                                        while($row = mysqli_fetch_assoc($queryi)){
                                            $idpe = $row['user_id'];
                                            $idpro = $row['item_id'];
                                            $datafinal = $row['data_licit'];
                                        }
                                        $sqlo = "SELECT * FROM utilizadores WHERE user_id = '".$idpe."';";
                                        $queryo = mysqli_query($conn, $sqlo) or die("Error");
                                        while($row = mysqli_fetch_assoc($queryo)){
                                            $licitador = $row['nick'];
                                        }
                                        $sqlt = "SELECT * FROM artigos WHERE item_id = '".$idpro."';";
                                        $quert = mysqli_query($conn, $sqlt) or die("Error");
                                        while($row = mysqli_fetch_assoc($quert)){
                                            $idv = $row['user_id'];
                                            $artigo = $row['designacao'];
                                            $datafim = $row['data_fim'];
                                            $horafim = $row['hora_fim'];
                                        }
                                        $sqlq = "SELECT * FROM utilizadores WHERE user_id = '".$idv."';";
                                        $queryq = mysqli_query($conn, $sqlq) or die("Error");
                                        while($row = mysqli_fetch_assoc($queryq)){
                                            $vendedor = $row['nick'];
                                        }
                                        if(strtotime($dataatual) > strtotime($datafim) || (strtotime($dataatual) == strtotime($datafim) && strtotime($horaatual) > strtotime($horafim))){
                                            echo "<tr><td>".$artigo."</td><td>".$vendedor."</td><td> € ".$vatual."</td><td>".$datafinal."</td><td>".$licitador."</td><td>";
                                        }
                                    }
                                    echo "</table>";
                                ?>
                            </div>
                       </div>
                    </div>
                    <h2 class='title text-center'>Mensagens</h2>
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#entrada" data-toggle="tab">Caixa de entrada</a></li>
                                <li><a href="#saida" data-toggle="tab">Caixa de sa&iacute;da</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade  active in" id="entrada">
                                <?php
                                    include 'connect.php';
                                    $nick = $_COOKIE['nick'];
                                    echo "<table class='table table-list-search'>";	
                                    echo "<tr><td>Nome Produto</td><td>Nome Remetente</td><td>Mensagem</td><td>Data</td><td>Resposta</td></tr>";
                                    $sql = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
                                    $query = mysqli_query($conn, $sql) or die("Error");
                                    while($row = mysqli_fetch_assoc($query)){
                                        $idp = $row['user_id'];
                                    }
                                    $sqli = "SELECT * FROM perguntas WHERE user_id = '".$idp."';";
                                    $quer = mysqli_query($conn, $sqli) or die("Error");
                                    while($row = mysqli_fetch_assoc($quer)){
                                        $idpergunta = $row['perg_id'];
                                        $idprod = $row['item_id'];
                                        $idp = $row['user_id'];
                                        $idpergunta = $row['perg_id'];
                                        $idprod = $row['item_id'];
                                        $mensagem = $row['pergunta'];
                                        $datap = $row['data_perg'];
                                        $resposta = $row['resposta'];
                                        $id_perg=$row['id_pergunta'];
                                        $sqlp = "SELECT * FROM utilizadores WHERE user_id = '".$idpergunta."';";
                                        $queryp = mysqli_query($conn, $sqlp) or die("Error");
                                        while($row = mysqli_fetch_assoc($queryp)){
                                            $nickperg = $row['nick'];
                                        }
                                        $sqlip = "SELECT * FROM artigos WHERE item_id = '".$idprod."';";
                                        $querypp = mysqli_query($conn, $sqlip) or die("Error");
                                        while($row = mysqli_fetch_assoc($querypp)){
                                            $designacao = $row['designacao'];
                                        }
                                        echo "<tr><td>".$designacao."</td><td>".$nickperg."</td><td>".$mensagem."</td><td>".$datap."</td><td>";
                                        if($resposta === NULL){
                                            echo "<a href='resposta?id=".$id_perg."' type='button' class='btn btn-warning'>Responder</a>";
                                        }
                                        else{
                                            echo $resposta;
                                        }
                                        echo "</td></tr>";
                                    }
                                    echo "</table><br>";
                                ?>
                            </div>
                            <div class="tab-pane fade" id="saida" >
				            <div class="col-sm-12">
                                    <?php
                                        include 'connect.php';
                                        $nick = $_COOKIE['nick'];
                                        echo "<table class='table table-list-search'>";	
                                        echo "<tr><td>Nome Produto</td><td>Nome Remetente</td><td>Mensagem</td><td>Data</td><td>Resposta</td></tr>";
                                        $sql = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
                                        $query = mysqli_query($conn, $sql) or die("Error");
                                        while($row = mysqli_fetch_assoc($query)){
                                            $idp = $row['user_id'];
                                        }
                                        $sqli = "SELECT * FROM perguntas WHERE perg_id = '".$idp."';";
                                        $quer = mysqli_query($conn, $sqli) or die("Error");
                                        while($row = mysqli_fetch_assoc($quer)){
                                            $idpergunta = $row['user_id'];
                                            $idprod = $row['item_id'];
                                            $idp = $row['perg_id'];
                                            $idpergunta = $row['perg_id'];
                                            $idprod = $row['item_id'];
                                            $mensagem = $row['pergunta'];
                                            $datap = $row['data_perg'];
                                            $resposta = $row['resposta'];
                                            $id_perg=$row['id_pergunta'];
                                            $sqlp = "SELECT * FROM utilizadores WHERE user_id = '".$idpergunta."';";
                                            $queryp = mysqli_query($conn, $sqlp) or die("Error");
                                            while($row = mysqli_fetch_assoc($queryp)){
                                                $nickperg = $row['nick'];
                                            }
                                            $sqlip = "SELECT * FROM artigos WHERE item_id = '".$idprod."';";
                                            $querypp = mysqli_query($conn, $sqlip) or die("Error");
                                            while($row = mysqli_fetch_assoc($querypp)){
                                                $designacao = $row['designacao'];
                                            }
                                            echo "<tr><td>".$designacao."</td><td>".$nickperg."</td><td>".$mensagem."</td><td>".$datap."</td><td>";
                                            if($resposta === NULL){

                                                echo "<b>Resposta Pendente</b>";
                                            }
                                            else{

                                                echo $resposta;
                                            }
                                            echo "</td></tr>";
                                        }
                                        echo "</table><br>";
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
    <script src="js/jquery.tablesorter.js"></script>
</body>
</html>
