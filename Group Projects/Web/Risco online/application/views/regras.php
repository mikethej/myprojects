<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Regras</title>
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
			<li><a id="m" href="regras">Regras</a></li>
			<li><a href="../Historico/historico">Histórico</a></li>
		</nav>
		
		<section class="content">
			<div class="some">
				<article>
					<p>Baseado no clássico jogo de tabuleiro de conquista estratégica da Hasbro, Risco ganha vida on-line, onde o objetivo do jogo é simples: Global Domination! Estabeleça seus objetivos militares, assumir o comando de seu exército e começar a sua campanha para dominar o mundo. Risco é um jogo baseado em turnos por cada jogador, começando com seu próprio exército controlável em uma tentativa de capturar territórios a partir dos jogadores adversários e controlar todo o mapa.</p>
				</article>
				<article>
					<div class="row">
						<div class="col-md-6">
							<div class="thumbnail">
								<h3>Conquista</h3>
								<p>O jogo de risco começa com os jogadores se revezando seleção, ou adquirir, um território até que todos os territórios foram reivindicados. Uma vez que todos os territórios foram reivindicados, a fase de implantação começa.</p>
							</div>
							<div class="thumbnail">
								<h3>Atacar</h3>
								<p>Em cada turno o jogardor recebe reforços, ataque e finalmente capturar territórios de seus oponentes.</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="thumbnail">
								<h3>Largar tropas</h3>
								<p>Na fase da largada, os jogadores colocam suas unidades restantes em territórios que ocupam. A largada é feita um exército por turno e termina quando o último jogador colocou seu último exército</p>
							</div>
							<div class="thumbnail">
								<h3>Reforçar</h3>
								<p>Não se esqueça de reforçar suas defesas e fortalecer seus territórios! Fazer isso irá ajudá-lo a assumir o controlar o mapa.</p>
							</div>
						</div>
					</div>
				</article>
			</div>
		</section>
	</body>
</html>
