<?php include_once('../../includes/connection.php'); ?>
<?php include_once('../../php/verify.php'); ?>
<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../../css/admin/changePassword.css">
	<title>Change Password</title>
</head>
<body>
	<div class="form">
		<img src="../../img/AppLogo.png" class="logo">
		<center>
			<div class="appname">
				<p class="name1"><b>care</b></p><p class="name2"><b>U</b></p>
			</div>
			<div class="loginform">
	  			<form action="" method="post">
	    			<input type="text" id="username" name="username" placeholder="Username"><br>
	    			<input type="password" id="password1" name="password2" placeholder="Password"><br>
	    			<input type="password" id="password2" name="password2" placeholder="Re-enter Password"><br><br>
	    			<input type="submit" value="Log In" name="submit"><br><br>
	    			<a href="#" class="forgotpassword">Change password?</a><br>
	 			</form>
			</div>
		</center>
	</div>
</body>
</html>