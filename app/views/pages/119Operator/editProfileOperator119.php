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
			<div class="row">
				<form action="updateprofile" method="post" enctype="multipart/form-data">
					<div class="column1">
						<?php foreach($data['admin'] as $operatorInfo){ ?>
						<?php if(!empty($operatorInfo->image)) { ?>
							<img src="../img/policeProPics/<?php echo $operatorInfo->image; ?>" class="pPic" id="pPic"><br>
						<?php } else {?>
							<canvas class="picture1" id="picture1"></canvas><br>
						<?php }?>
						<canvas class="picture2 hidden" id="picture2"></canvas><br>
						<input type="file" name="image" id="propic"><br>
					</div>
					<div class="column2">
						<label for="firstName">First Name</label><br>
						<label for="lastName">Last Name</label><br>
						<label for="password1">Password</label><br>
						<label for="password2">Re-enter Password</label><br>
					</div>
					<div class="column3">
						<label class="lab" for="firstName">First Name</label>
						<input type="text" name="firstName" id="firstName" value="<?php echo $operatorInfo->firstName ?>"><br>
						<label class="lab" for="lastName">Last Name</label>
						<input type="text" name="lastName" id="lastName" value="<?php echo $operatorInfo->lastName ?>"><br>
						<label class="lab" for="password1">Password</label>
						<input type="password" name="password1" id="password1"value="<?php echo $operatorInfo->password ?>"><br>
						<label class="lab" for="password2">Re-enter Password</label>
						<input type="password" name="password2" id="password2" value="<?php echo $operatorInfo->password ?>"><br>
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
	<script type="text/javascript" src="../javascript/headerPolice.js"></script>
	<script type="text/javascript" src="../javascript/editProfileOperator119.js"></script>
</body>
</html>