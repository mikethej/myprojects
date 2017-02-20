<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Jogo</title>
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
			<li><a id="m" href="home">Jogar</a></li>
			<li><a href="../Estatistica/estatistica">Estatistica</a></li>
			<li><a href="../Regras/regras">Regras</a></li>
			<li><a href="../Historico/historico">Histórico</a></li>
		</nav>

		<div class="content" id="ginfo">
			
			<ul id="gamei">

				<li id="mapli"><img id="map" src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/images/map.jpg"></li>		

				<li id="gameinfo"><table>
					<tr>
						<th>Cargo</th>
						<th>Nome</th>
					</tr>
					<?php 
						foreach ($creator as $key){
							echo "<tr><td>Criador</td><td>".$key->username."</td></tr>";				
						}
						foreach ($partic as $key2){
							echo "<tr><td>Partipante</td><td>".$key2->username."</td></tr>";				
						}
					?>
				</table></li>
			</ul>
			<div id="sair">
				<ul>
					<li id="sairjogo"><?php 
						foreach ($creator as $key){
							echo "<a href="."outofgame?game_id=".$key->ID." onclick='close_window()'>SAIR</a>";
						}
					?></li>
					<li><a href="#">JOGAR</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>
