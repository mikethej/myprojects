<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Início de sessão</title>
		<link rel="stylesheet" type="text/css" href="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/css/homefina.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/js/crip.js"></script>
	</head>
	<body>
		<header>
			<li><img class="logoimg" src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/images/logo1.gif" alt="risco"></li>
		</header>

		<nav class="NavBar">
			<li><a class="risc" id="m" href="#">Sobre o Risco</a></li>
			<li><a class="esta" href="#">Estatísticas</a></li>
		</nav>

		<section class="content">
			<div class="some">
				<div id="log">
					<form action="login" method="post" accept-charset="utf-8">
						<fieldset class="account-info">
						    <label>
							<p> <?php echo $this->dx_auth->get_auth_error(); ?></p>
							<p>
								Username: <input type="text" name="username" value="" id="username" size="30" />
								<?php echo form_error('username'); ?>
							</p>
						    </label>
						    <label>
							<p>
								Password: <input type="password" name="password" value="" id="password" size="30" />
								<?php echo form_error('password'); ?>
							</p>
						    </label>
						</fieldset>
						<fieldset class="account-action">
						    <p><input class="btn" type="submit" name="login" value="Login"></p>
						    <p><input type="checkbox" name="remember" value="1" id="remember" style="margin:0;padding:0"  /> Manter Sessão Ligada </p>
						    <p>Ainda não está registado? Registe-se <a href="registo"> aqui </a>.</p>
						</fieldset>
					</form>
				</div>
				<div id="info">
					<section id="tab-content">
						<div id="open">
							<h2>Resumo</h2>
							<p>Baseado no clássico jogo de tabuleiro de conquista estratégica da Hasbro, Risco ganha vida on-line, onde o objetivo do jogo é simples: Global Domination! Estabeleça seus objetivos militares, assumir o comando de seu exército e começar a sua campanha para dominar o mundo. Risco é um jogo baseado em turnos por cada jogador, começando com seu próprio exército controlável em uma tentativa de capturar territórios a partir dos jogadores adversários e controlar todo o mapa.</p>
						</div>
						<div id="sec">
							<h2>Top 10</h2>
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
						</div>
					</section>
				</div>
			</div>
		</section>
	</body>
</html>







