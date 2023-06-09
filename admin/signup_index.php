<?php
	session_start();
	if(isset($_SESSION['admin'])){
		header('location:login.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<b>Voting System</b>
	</div>

	<div class="login-box-body">
		<p class="login-box-msg">Sign up for a new account</p>

		<form action="signup.php" method="POST" enctype="multipart/form-data">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="firstname" placeholder="First Name" required>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="file" class="form-control" name="photo" required>
				<span class="glyphicon glyphicon-picture form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="date" class="form-control" name="created_on" placeholder="Created On" required>
				<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="username" placeholder="Username" required>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-user-plus"></i> Sign Up</button>
				</div>
				<p><a href="login_index.php">Already have account, <b>log in.</b></a></p>
			</div>
		</form>
	</div>
	<?php
		if(isset($_SESSION['error'])){
			echo "
				<div class='callout callout-danger text-center mt20'>
					<p>".$_SESSION['error']."</p> 
				</div>
			";
			unset($_SESSION['error']);
		}
	?>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</html>
