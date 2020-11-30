<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/viewUserRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<title>User Profile</title>
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
							<?php foreach($data['idphoto'] as $idphoto){ ?>
							<div class="photo1col">
								<center><img src="../../careu-php/upload/<?php echo $idphoto->idPhoto; ?>.jpg" class="idImg1" id="idImg1"></center>
							</div>
							<?php } ?>
							<div id="zoomImg" class="zoomImg">
								<span class="close">&times;</span>
								<img class="idImg" id="img">
							</div>
						</div>
					</div>
					<div class="column2">
						<?php foreach($data['userInfo'] as $userInfo){ ?>
						<label>First Name</label>
						<input type="text" value="<?php echo $userInfo->firstName; ?>" disabled><br>
						<label>Last Name</label>
						<input type="text" value="<?php echo $userInfo->lastName; ?>" disabled><br>
						<label>Username</label>
						<input type="text"value="<?php echo $userInfo->userName; ?>" disabled><br>
						<label>NIC</label>
						<input type="text" value="<?php echo $userInfo->nicNumber; ?>" disabled><br>
						<label>E-mail</label>
						<input type="text" value="<?php echo $userInfo->email; ?>" disabled><br>
						<?php } ?>
					</div>
					<div class="column3">
						<?php foreach($data['userInfo'] as $userInfo){ ?>
						<label>Phone Number</label>
						<input type="text" value="<?php echo $userInfo->phoneNumber; ?>" disabled><br>
						<label>Gender</label>
						<input type="text" value="<?php echo $userInfo->gender; ?>" disabled><br>
						<label>Date of Birth</label>
						<input type="text" value="<?php echo $userInfo->dateOfBirth; ?>" disabled><br>
						<label>Address</label>
						<input type="text" value="<?php echo $userInfo->address; ?>" disabled><br>
						<?php } ?>
					</div>
					<div class="column4">
						<button href="" onclick="confirm1()">Accept</button>
						<button href="" onclick="confirm2()">Reject</button>
					</div>
					<div class="column5">
						<button href="" onclick="confirm1()">Accept</button>
					</div>
					<div class="column6">
						<button href="" onclick="confirm2()">Reject</button>
					</div>
				</div>
			</center>
		</div>
	</div>
	<div id="modal1" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Confirm !</h1>
				</div>
				<div class="confirm">
					<p>Are you satisfied with the details?</p>
				</div>
				<div class="clearfix">
					<div class="clicks">
						<div class="btns">
							<?php foreach($data['userInfo'] as $userInfo){ ?>
							<a href="accept?id=<?php echo $userInfo->userId; ?>" class="yes">Yes</a>
							<?php } ?>
						</div>
						<div class="btns">
							<a onclick="closeconfirm1()" class="no">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="modal2" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Confirm !</h1>
				</div>
				<div class="confirm">
					<p>Are you sure you want to reject the request?</p>
				</div>
				<div class="clearfix">
					<div class="clicks">
						<div class="btns">
							<?php foreach($data['userInfo'] as $userInfo){ ?>
							<a href="reject?id=<?php echo $userInfo->userId; ?>" class="yes">Yes</a>
							<?php } ?>
						</div>
						<div class="btns">
							<a onclick="closeconfirm2()" class="no">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/viewUserRequest.js"></script>
</body>
</html>