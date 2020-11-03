<?php include_once('includes/connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="css/login/changePassword.css">
	<title>Change Password</title>
</head>
<body>
	<div class="form">
		<img src="img/AppLogo.png" class="logo">
		<center>
			<div class="appname">
				<p class="name1"><b>care</b></p><p class="name2"><b>U</b></p>
			</div>
			<div class="loginform">
	  			<form method="post" id="changePassword">
	    			<input type="text" id="username" name="username" placeholder="Username"><br>
	    			<input type="password" id="password1" name="password1" placeholder="Password"><br>
	    			<input type="password" id="password2" name="password2" placeholder="Re-enter Password"><br><br>
	    			<p class="hidden" id="error1">Passwords do not match!</p>
					<p class="hidden" id="error2">Please, fill all feilds!</p>
					<p class="hidden" id="error3">Invalid username or password. Try again!</p>
	    			<input type="submit" value="Log In" name="submit" id="submit"><br><br>
	 			</form>
			</div>
		</center>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/changePassword.js"></script>
</body>
</html>