<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="img/appLogo.png">
	<link rel="stylesheet" type="text/css" href="../css/login/changePassword.css">
	<title>Log In</title>
</head>
<body>
	<div class="form">
		<img src="../img/AppLogo.png" class="logo">
		<center>
			<div class="appname">
				<p class="name1"><b>care</b></p><p class="name2"><b>U</b></p>
			</div>
			<div class="loginform">
				<p class="hide" id="err">Error</p>
				<form action="" method="post" id="logIn">
					<input type="text" id="username" name="username" placeholder="Username"><br>
					<input type="password" id="password" name="password" placeholder="Password"><br>
					<input type="password" id="password" name="password" placeholder="Password"><br>
	    			<input type="submit" value="LOG IN" onclick="myFunction()" name="submit" id="submit">
	 			</form>
			</div>
		</center>
	</div>
	<script type="text/javascript" src="javascript/jquery.js"></script>
	<script type="text/javascript" src="javascript/formValidation.js"></script>
</body>
</html>