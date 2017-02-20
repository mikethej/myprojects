<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registo</title>
		<link rel="stylesheet" type="text/css" href="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/css/homefina.css">
	</head>
	<body>
		<header>
			<li><img class="logoimg" src="http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/images/logo1.gif" alt="risco"></li>
		</header>

		<nav class="NavBar">
			<li><a id="m" href="#">Registo</a></li>
		</nav>

		<section class="content" id="regista">
			<div class="some">
				<form id="reg" action="registo" method="post" accept-charset="utf-8">
					<fieldset class="account-info">
					    <label>
						<p>
							Username: <input id="inputreg" type="text" name="username" value="" id="username" /> 
							<?php echo form_error('username'); ?>
						</p>
					    </label>
					    <label>
						<p>
							Name: <input id="inputreg" type="text" name="name" value="" id="name" /> 
							<?php echo form_error('name'); ?>
						</p>
					    </label>
					    <label>
						<p>
							Password: <input id="inputreg" type="password" name="password" value="" id="password" /> 
							<?php echo form_error('password'); ?>
						</p>
					    </label>
					    <label>
						<p>
							Confirmar_Password: <input id="inputreg" type="password" name="confirm_password" value="" id="confirm_password"  /> <?php echo form_error('confirm_password'); ?></p>
					    </label>
					    <label>
						<p>
							Email: <input id="inputreg" type="text" name="email" value="" id="email" maxlength="80"  />
							<?php echo form_error('email'); ?>
						</p>
					    </lablel>
					</fieldset>
					<fieldset class="account-action1">
					    <input class="btn" type="submit" name="register" value="Registar">
					    <p>Já está registado? Faça login <a href="login"> aqui </a>.</p>
					</fieldset>
				</form>
			</div>
		</section>
	</body>
</html>
