<html>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Login</h1>
				</div>
				    <div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4><i class="fa fa-fw fa-check"></i> Enter your Username and Password</h4>
						</div>
					<div class="panel-body">
						<form action="login" method="post" accept-charset="utf-8">
						<p> <?php echo $this->dx_auth->get_auth_error(); ?></p>
						<p>
						Username: <br><input type="text" name="username" value="" id="username" size="30" />
						<?php echo form_error('username'); ?>
						</p>
						<p>
						Password: <br><input type="password" name="password" value="" id="password" size="30" />
						<?php echo form_error('password'); ?>
						</p>
						<p><input type="checkbox" name="remember" value="1" id="remember" style="margin:0;padding:0"  /> Remember</p>
						<p><input class="btn btn-default" type="submit" name="login" value="Login"  /></p>

						</form>
					</div> 
				</div>
                                        <p>Not registered? Click <a href="<?php base_url('Autenticacao/registo');?>" ><strong>here</strong></a> to create a new account.</p>

			</div>

			</div>
			<!-- FOOTER -->
			<footer>
			    <div class="row">
				<div class="col-lg-12">
				    <p>Copyright &copy; Kings Risk Game 2015</p>
				</div>
			    </div>
			</footer>
		</div>
	</body>

</html>







