<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/changePassword.css">
	<title>Change Password</title>
</head>
<body>
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
							<input type="password" name="password1" id="password1"value=""><br>
							<label>Re-enter Password</label>
							<input type="password" name="password2" id="password2" value=""><br>
						</div>
						<div class="column3">
							<p class="hide" id="err">Error</p>
							<input type="submit" value="Save" name="submit" id="submit">
						</div>
					</form>
				</div>
			</center>
		</div>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/changePasswordAdmin.js"></script>
</body>
</html>