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
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/loader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<title>User Profile</title>
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
	<div class="form">
		<div class="frame">
			<center>
				<div class="row">
					<div col=column1>
						<div class="photorow">
						<?php if(!empty($data['idphoto'])){ ?>
							<?php foreach($data['idphoto'] as $idphoto){ ?>
							<div class="slideshow-container">
								<center>
									<div class="mySlides fade">
										<img src="../../careu-php/upload/<?php echo $idphoto->idPhoto; ?>.jpg" class="idImg1" id="idImg1">
									</div>
								</center>
							</div>
							<?php } ?>
							<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
							<a class="next" onclick="plusSlides(1)">&#10095;</a>
							<?php } ?>
							<div id="zoomImg" class="zoomImg">
								<span class="close" id="close">&times;</span>
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
					<div class="column4" id="column4">
							<p class="note" id="note"></p>
						<?php if($userInfo->status==0) {?>
							<button class="accept" onclick="confirm1()" id="acceptbtn">ACCEPT</button>
							<button class="reject" onclick="confirm2()" id="rejectbtn">REJECT</button>
						<?php }?>
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
							<a class="yes" onclick="accept(<?php echo $userInfo->userId; ?>)">Yes</a>
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
							<a class="yes" onclick="reject(<?php echo $userInfo->userId; ?>)">Yes</a>
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
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/viewUserRequest.js"></script>
	<script type="text/javascript" src="../javascript/adminnotification.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
</body>
</html>