<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Estatística</title>
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
			<li><a id="m" href="estatistica">Estatistica</a></li>
			<li><a href="../Regras/regras">Regras</a></li>
			<li><a href="../Historico/historico">Histórico</a></li>
		</nav>

		<section class="content">

			<ul id="estat">
				<li id="estat1"><div class="some">
							<h2 id="top">Top 10</h2>
							<table class="list">
								<tr>
									<th>Posição</th>
									<th>Nome do Jogador</th>
									<th>Pontuação</th>
								</tr>
								<?php
								$posicao = 1;
								foreach ($score as $key) {
									echo '<tr><td>'. $posicao .'</td><td>'. $key->username .'</td><td>'. $key->score .'</td></tr>';
									$posicao +=1;
								}
								?>
							</table>
				</div></li>
				<li class="podium" ><img src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/images/podium.jpg"></li>
			</ul>
		</section>
	</body>
</html>
