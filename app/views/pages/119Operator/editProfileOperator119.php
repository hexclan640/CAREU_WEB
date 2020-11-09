<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/119Operator/editProfileOperator119.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/operatorHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>Edit Profile</title>
</head>
<body>
	<div class="breadcrum">
		Profile
	</div>
	<div class="form">
		<center>
			<form method="post" id="editProfile">
				<div class="row">
  					<div class="column1">
  						<canvas class="picture" id="picture">
								
						</canvas>
  					</div>
  					<div class="column2">
    	  				<label>First Name</label><br>
						<label>Last Name</label><br>
						<label>Password</label><br>
						<label>Re-enter Password</label><br>
    	  			</div>
    	  			<div class="column3">
    	  				<?php foreach($data['admin'] as $adminInfo){ ?>
    	  				<label class="lab">First Name</label>
						<input type="text" name="firstName" id="firstName" value="<?php echo $adminInfo->firstName ?>"><br>
						<label class="lab">Last Name</label>
						<input type="text" name="lastName" id="lastName" value="<?php echo $adminInfo->lastName ?>"><br>
						<label class="lab">Password</label>
						<input type="password" name="password1" id="password1"value="<?php echo $adminInfo->password ?>"><br>
						<label class="lab">Re-enter Password</label>
						<input type="password" name="password2" id="password2" value="<?php echo $adminInfo->password ?>"><br>
						<?php } ?>
						<p class="hide" id="err">Error</p>
						<input type="submit" value="Save" name="submit" id="submit">
    	  			</div>
				</div>
			</form>
		</center>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/jquery.sticky.js"></script>
	<script type="text/javascript" src="../javascript/headerPolice.js"></script>
	<script type="text/javascript" src="../javascript/editProfileOperator119.js"></script>
</body>
</html>