<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Histórico</title>
		<link rel="stylesheet" type="text/css" href="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/css/home.css">
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
			<li><a href="../Jogar/home">Jogar</a></li>
			<li><a href="../Estatistica/estatistica">Estatistica</a></li>
			<li><a href="../Regras/regras">Regras</a></li>
			<li><a id="m" href="historico">Histórico</a></li>
		</nav>

		<section class="content">

			<div class="some">
				<ul id="estat">
					<li id="estat1"><table class="list">
						<tr>
							<th>Nome do Jogador</th>
							<th>Vitorias</th>
							<th>Perdas</th>
							<th>Percentagem do Jogo</th>
						</tr>
						<?php
							foreach($hist as $key)
							{
								echo "<tr><td>". $key->username ."</td><td>". $key->vit ."</td><td>". $key->lose."</td><td>0</td>";
			
							}
						?>
					</table></li>
					<li id="target"><img src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/images/target.jpg"></li>
				</ul>			
			</div>
		</section>
	</body>
</html>
