<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/119Operator/changePassword.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/operatorHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/loader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
	<title>Change Password</title>
</head>
<body>
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<div class="loader-wrapper2" id="loader-wrapper2">
		<span class="loader2"><span class="loader-inner2"></span></span>
	</div>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
  			<li><a href="home">Home</a></li>
			<li><a href="profile">Profile</a></li>  
			<li>Change Password</li>
		</ul>
	</div>
	<div class="form">
		<div class="frame">
			<center>
				<div class="row">
					<form method="post" id="changePassword">
						<div class="namediv">
							<h1>Change Password</h1>
						</div>
						<div class="column1">
							<label>Username</label>
							<input type="text" name="username" id="username" value=""><br>
							<label>Current Password</label>
							<input type="password" name="currentpassword" id="currentpassword"value=""><br>
						</div>
						<div class="column2">
							<label>New Password</label>
							<input onkeyup="trigger()" type="password" name="password1" id="password1" value=""><br>
							<label>Re-enter Password</label>
							<input type="password" name="password2" id="password2" value=""><br>
						</div>
						<div class="column3">
							<p class="hide" id="err">Error</p>
							<input type="submit" value="SAVE" name="submit" id="submit">
						</div>
					</form>
				</div>
			</center>
		</div>
	</div>
	<div id="modal1" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Success!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/success.svg" alt="">
					<p>Password Changed!</p>
				</div>
			</div>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/changePasswordPolice.js"></script>
	<script type="text/javascript" src="../javascript/policeNotification.js"></script>
</body>
</html>