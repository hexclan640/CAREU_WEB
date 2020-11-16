<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/viewUserRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>Edit Profile</title>
</head>
<body>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li><a href="usermanagement">Users</a></li>
			<li>User Profile</li>
		</ul>
	</div>
	<div class="form">
		<div class="frame">
			<center>
				<div class="row">
					<div col=column1>
						<div class="photorow">
							<div class="photo1col">
								<img src="../img/unknown.jpg" id="idImg1">
							</div>
							<div class="photo2col">
								<img src="../img/unknown.jpg" id="idImg2">
							</div>
							<div id="zoomImg" class="zoomImg">
								<span class="close">&times;</span>
								<img class="idImg" id="img">
							</div>
						</div>
					</div>
					<div class="column2">
						<label>First Name</label><br>
						<label>Last Name</label><br>
						<label>Username</label><br>
						<label>NIC</label><br>
						<label>E-mail</label><br>
						<label>Phone Number</label><br>
						<label>Gender</label><br>
						<label>Date of Birth</label><br>
						<label>Address</label><br>
					</div>
					<div class="column3">
						<?php foreach($data['userInfo'] as $userInfo){ ?>
						<label class="lab">First Name</label>
						<input type="text" value="<?php echo $userInfo->firstName; ?>" disabled><br>
						<label class="lab">Last Name</label>
						<input type="text" value="<?php echo $userInfo->lastName; ?>" disabled><br>
						<label class="lab">Username</label>
						<input type="text"value="<?php echo $userInfo->userName; ?>" disabled><br>
						<label class="lab">NIC</label>
						<input type="text" value="<?php echo $userInfo->nicNumber; ?>" disabled><br>
						<label class="lab">E-mail</label>
						<input type="text" value="<?php echo $userInfo->email; ?>" disabled><br>
						<label class="lab">Phone Number</label>
						<input type="text" value="<?php echo $userInfo->phoneNumber; ?>" disabled><br>
						<label class="lab">Gender</label>
						<input type="text" value="<?php echo $userInfo->gender; ?>" disabled><br>
						<label class="lab">Date of Birth</label>
						<input type="text" value="<?php echo $userInfo->dateOfBirth; ?>" disabled><br>
						<label class="lab">Address</label>
						<input type="text" value="<?php echo $userInfo->address; ?>" disabled><br>
						<?php } ?>
						<p class="hide" id="err">Error</p>
						<a href="accept?id=<?php echo $userInfo->userId; ?>">ACCEPT</a>
						<a href="reject?id=<?php echo $userInfo->userId; ?>">REJECT</a>
					</div>
				</div>
			</center>
		</div>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/headerAdmin.js"></script>
	<script type="text/javascript" src="../javascript/viewUserRequest.js"></script>
</body>
</html>