<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/119Operator/editProfileOperator119.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/operatorHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<title>Edit Profile</title>
</head>
<body>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
  			<li>Profile</li>
		</ul>
	</div>
	<div class="form">
		<div class="frame">
			<center>
				<div class="row">
					<form action="updateprofile" method="post" enctype="multipart/form-data">
						<?php foreach($data['operatorInfo'] as $operatorInfo){ ?>
							<div class="namediv">
							<h1><?php echo $operatorInfo->firstName." ".$operatorInfo->lastName; ?></h1>
						</div>
						<div class="column1">
							<?php if(!empty($operatorInfo->image)) { ?>
								<img src="../img/policeProPics/<?php echo $operatorInfo->image; ?>" class="pPic" id="pPic"><br>
							<?php } else {?>
								<canvas class="picture1" id="picture1"></canvas><br>
							<?php }?>
							<canvas class="picture2 hidden" id="picture2"></canvas><br>
							<input type="file" name="image" id="propic"><br>
						</div>
						<div class="column2">
							<label>First Name</label>
							<input type="text" name="firstName" id="firstName" value="<?php echo $operatorInfo->firstName ?>"><br>
						</div>
						<div class="column3">
							<label>Last Name</label>
							<input type="text" name="lastName" id="lastName" value="<?php echo $operatorInfo->lastName ?>"><br>
						</div>
						<div class="column4">
							<p class="hide" id="err">Error</p>
							<a href="changePassword" class="cpwd">Change Password ››</a>
						</div>
						<div class="column5">
							<input type="submit" value="Save" name="submit" id="submit" onclick="return check()">
						</div>
						<?php } ?>
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
					<p>Changes Saved!</p>
				</div>
			</div>
		</div>
	</div>
	<div id="modal2" class="modal">
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
	<?php if(isset($_SESSION['profile'])){?>
		<script>
			document.getElementById('modal1').style.display = 'block';
			setTimeout(function(){document.getElementById('modal1').style.display = 'none'; }, 2000);
		</script>
	<?php unset($_SESSION['profile']);} ?>
	<?php if(isset($_SESSION['changeapplied'])){?>
		<script>
			document.getElementById('modal2').style.display = 'block';
			setTimeout(function(){document.getElementById('modal2').style.display = 'none'; }, 2000);
		</script>
	<?php unset($_SESSION['changeapplied']);} ?>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/editProfileOperator119.js"></script>
</body>
</html>