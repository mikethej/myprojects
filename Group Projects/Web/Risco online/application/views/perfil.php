<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Perfil</title>
		<link rel="stylesheet" type="text/css" href="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/css/home.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/js/crip.js"></script>
	</head>
	<body>
		<header>
			<li><img class="logoimg" src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/images/logo1.gif" alt="risco"></li>

			<li><ul id="afterlog">
				<li><img class="photo" src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/images/photo.jpg" width="50"></li>
				<li>
					<ul id="nav-button">
						<li><?php echo $this->dx_auth->get_username();?></li>
						<li><a href="#">Perfil</a></li>
						<li><a href="../Autenticacao/logout">Terminar Sessão</a></li>
					</ul>
				</li>
			</ul></li>
		</header>


		<nav class="NavBar">
			<li><a href="../Jogar/home">Jogar</a></li>
			<li><a href="../Estatistica/estatistica">Estatistica</a></li>
			<li><a href="../Regras/regras">Regras</a></li>
			<li><a href="../Historico/historico">Histórico</a></li>
		</nav>

		<div class="content">
			<h1 id='tit'>Perfil</h1>
			<ul>
				<li id="logo"><img class="photo" width="500px" src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/images/photo.jpg">
				</li>
				<li id='information'>
					<?php
						foreach($perfil as $key) {
							echo '<p><h4>Username: </h4>'. $key->username . '</p><br>
							<h4>Nome: </h4><p id="inf">'. $key->name . '</p><br>
							<p><h4>Email: </h4>' . $key->email . '</p><br>';
						}
					?>
				</li>
		</div>

	</body>
</html>
