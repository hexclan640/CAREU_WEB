<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/userProfile.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>Edit Profile</title>
</head>
<body>

	<div class="breadcrum">
		User Profile
	</div>
	<div class="form">
		<center>
			<div class="row">
				<div class="column1">
					<img src="../img/unknown.jpg"><br>
				</div>
				<div class="column2" id="column2">
					<label>First Name</label><br>
					<label>Last Name</label><br>
					<label>Username</label><br>
					<label>NIC</label><br>
					<label>E-mail</label><br>
					<div class="more1" id="more1">
						<label>Phone Number</label><br>
						<label>Gender</label><br>
						<label>Date of Birth</label><br>
						<label>Address</label><br>
					</div>
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
						<div class="more2" id="more2">
							<label class="lab">Phone Number</label>
							<input type="text" value="<?php echo $userInfo->phoneNumber; ?>" disabled><br>
							<label class="lab">Gender</label>
							<input type="text" value="<?php echo $userInfo->gender; ?>" disabled><br>
							<label class="lab">Date of Birth</label>
							<input type="text" value="<?php echo $userInfo->dateOfBirth; ?>" disabled><br>
							<label class="lab">Address</label>
							<input type="text" value="<?php echo $userInfo->address; ?>" disabled><br>
						</div>
						<div class="moreless">
							<button onclick="moreless()" id="more">MORE</button>
						</div>
					<?php } ?>
				</div>
			</div>
		</center>
	</div>
	<div class="form1">
		<center>
			<div class="row">
				<div class="request">
					<a href="">
						<div class="history">
							<div class="part1">
								<div class="imgdiv">
									<img src="../img/userManagement/requests.svg">
								</div>
								<div class="viewhistory">
									<p>Request History</p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="feedback">
					<a href="">
						<div class="history">
							<div class="part2">
								<div class="imgdiv">
									<img src="../img/userManagement/feedback.svg">
								</div>
								<div class="viewhistory">
									<p>Feedback History</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</center>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/headerAdmin.js"></script>
	<script type="text/javascript" src="../javascript/userProfile.js"></script>
</body>
</html>