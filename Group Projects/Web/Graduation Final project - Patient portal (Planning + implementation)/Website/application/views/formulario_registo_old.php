<?php
	$this->load->view("header");
?>
<html>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Register</h1>
				</div>
				    <div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4><i class="fa fa-fw fa-check"></i>Create Your Account</h4>
						</div>
					<div class="panel-body">
						<form action="registo" method="post" accept-charset="utf-8">

						<p>
							Name: <br><input type="text" name="nome" value="" id="name" maxlength="100" size="30"/>
						</p>

						<p>
							Username: <br><input type="text" name="username" value="" id="username" size="30"  /> 
							<?php echo form_error('name'); ?>
						</p>

						<p>
							Password: <br><input type="password" name="password" value="" id="password" size="30"  /> 
							<?php echo form_error('password'); ?>
						</p>

						<p>
							Confirm Password: <br><input type="password" name="confirm_password" value="" id="confirm_password" size="30"  />
							<?php echo form_error('confirm_password'); ?>
						</p>
						<p>
							Email: <br><input type="text" name="email" value="" id="email" maxlength="80" size="30"  />
							<?php echo form_error('email'); ?>
						</p>

						<p><input class="btn btn-default" type="submit" name="register" value="Register"  /></p>
						</form>
					</div> 


				</div>
				<p>Already registered? Click <a href="login" ><strong>here</strong></a> to login.</p>

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
