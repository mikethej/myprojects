<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Jogar</title>
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
						<li><a href="../Perfil/perfil">Perfil</a></li>
						<li><a href="../Autenticacao/logout">Terminar Sessão</a></li>
					</ul>
				</li>
			</ul></li>
		</header>


		<nav class="NavBar">
			<li><a id="m" href="../Jogar/home">Jogar</a></li>
			<li><a href="../Estatistica/estatistica">Estatistica</a></li>
			<li><a href="../Regras/regras">Regras</a></li>
			<li><a href="../Historico/historico">Histórico</a></li>
		</nav>

		<section class="content">
			
			<div class="cria">
				<a href="#" id="cria_jogo">Criar Jogo</a>
			</div>
			<div id="gamecreate">
				<form action="../Jogar/create" method="post" accept-charset="utf-8">
					<p>Nome do seu Jogo: <input type="text" name="info" value="" id="info" /> <input id="cria" type="submit" name="Cria" value="Criar"> </p>
				</form>
			</div>

			<div class="some">
				<table class="list">
					<tr>
						<th>Número do Jogo</th>
						<th>Nome do Jogo</th>
						<th>Nome do Criador</th>
						<th>Estado</th>
						<th></th>
					</tr>
					<?php
						foreach ($games as $key) {
							echo "<tr><td>". $key->id ."</td><td>". $key->info ."</td><td>". $key->username ."</td><td>". $key->estado ."</td><td><a id='entrar' target='_blank' href="."../Jogar/gotogame?game_id=".$key->id.">Entrar</a></td></tr>";
						}
					?>
				</table>
			</div>
		</section>
	</body>
</html>
