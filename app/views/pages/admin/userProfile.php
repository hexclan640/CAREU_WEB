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
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/loader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<title>Verified User Profile</title>
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
					<?php if($userInfo->status==1) {?>
					<div class="column4" id="column4">
						<p class="note" id="note"></p>
						<button id="blockbtn" onclick="confirm(<?php echo $userInfo->userId; ?>)">BLOCK</button>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</center>
		</div>
	</div>
	<div class="form1">
		<center>
			<div class="row">
				<div class="request">
					<a onclick='loadrequests()'>
						<div class="history" id="history1">
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
					<a onclick="loadfeedbacks()">
						<div class="history" id="history2">
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
		<div class="requestHistory" id="requestHistory">	
		</div>
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
							<a id="blockyes" class="yes">Yes</a>
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
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src="https://kit.fontawesome.com/a3a4c7c0c6.js"></script>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/userProfile.js"></script>
	<script type="text/javascript" src="../javascript/adminnotification.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
</body>
</html>