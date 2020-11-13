<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/editProfileAdmin.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>Edit Profile</title>
</head>
<body>

	<div class="breadcrum">
		Profile
	</div>

	<div class="form">
		<center>
			<div class="row">
				<form action="updateprofile" method="post" enctype="multipart/form-data">
					<div class="column1">
						<?php foreach($data['admin'] as $adminInfo){ ?>
						<?php if(!empty($adminInfo->image)) { ?>
							<img src="../img/adminProPics/<?php echo $adminInfo->image; ?>" class="pPic" id="pPic"><br>
						<?php } else {?>
							<canvas class="picture1" id="picture1"></canvas><br>
						<?php }?>
						<canvas class="picture2 hidden" id="picture2"></canvas><br>
						<input type="file" name="image" id="propic"><br>
					</div>
					<div class="column2">
						<label>First Name</label><br>
						<label>Last Name</label><br>
						<label>Password</label><br>
						<label>Re-enter Password</label><br>
					</div>
					<div class="column3">
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
						<input type="submit" value="Save" name="submit" id="submit" onclick="return check()">
					</div>
				  </form>
			</div>
		</center>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/jquery.sticky.js"></script>
	<script type="text/javascript" src="../javascript/editProfileAdmin.js"></script>
	<script type="text/javascript" src="../javascript/headerAdmin.js"></script>
</body>
</html>