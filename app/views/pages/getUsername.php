<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png">
	<link rel="stylesheet" type="text/css" href="../css/login/getUsername.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<title>Forgot Password</title>
</head>
<body>
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<div class="form">
		<img src="../img/AppLogo.png" class="logo">
		<center>
			<div class="appname">
				<p class="name1"><b>care</b></p><p class="name2"><b>U</b></p>
			</div>
			<div class="usernameform">
				<p class="hide" id="err">Error</p>
				<form action="" method="post" id="logIn">
					<input type="text" id="username" name="username" placeholder="Enter your username.."><br>
	    			<input type="submit" value="Submit" name="submit" id="submit"><br><br>
	 			</form>
			</div>
		</center>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/getUsername.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
</body>
</html>