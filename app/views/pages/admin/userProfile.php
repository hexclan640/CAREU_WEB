<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/userProfile.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<title>Verified User Profile</title>
</head>
<body>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li><a href="usermanagement">Users</a></li>
			<li>User Profile</li>
		</ul>
	</div>
	<div class="formuser">
		<div class="frame">
			<center>
				<?php foreach($data['userInfo'] as $userInfo){ ?>
				<div class="row">
					<div class="namediv">
						<h1><?php echo $userInfo->firstName." ".$userInfo->lastName; ?></h1>
					</div>
					<div class="column1">
						<img src="../img/unknown.jpg"><br>
					</div>
					<div class="column2">
						<label>Username</label>
						<input type="text"value="<?php echo $userInfo->userName; ?>" disabled><br>
						<label>NIC</label>
						<input type="text" value="<?php echo $userInfo->nicNumber; ?>" disabled><br>
						<label>E-mail</label>
						<input type="text" value="<?php echo $userInfo->email; ?>" disabled><br>
						<label>Phone Number</label>
						<input type="text" value="<?php echo $userInfo->phoneNumber; ?>" disabled><br>
					</div>
					<div class="column3">
						<label>Gender</label>
						<input type="text" value="<?php echo $userInfo->gender; ?>" disabled><br>
						<label>Date of Birth</label>
						<input type="text" value="<?php echo $userInfo->dateOfBirth; ?>" disabled><br>
						<label>Address</label>
						<input type="text" value="<?php echo $userInfo->address; ?>" disabled><br>
					</div>
					<div class="column4">
						<button onclick="confirm()">Block</button>
					</div>
				</div>
				<?php } ?>
			</center>
		</div>
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
	<div id="modal1" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Confirm !</h1>
				</div>
				<div class="confirm">
					<p>Are you sure you want to block the user?</p>
				</div>
				<div class="clearfix">
					<div class="clicks">
						<div class="btns">
						<?php foreach($data['userInfo'] as $userInfo){ ?>
							<a href="block?id=<?php echo $userInfo->userId; ?>" class="yes">Yes</a>
							<?php } ?>
						</div>
						<div class="btns">
							<a onclick="closeconfirm()" class="no">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/userProfile.js"></script>
</body>
</html>