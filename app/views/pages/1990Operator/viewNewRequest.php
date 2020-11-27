<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/1990Operator/viewNewRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/operatorHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<title>Request <?php echo $_GET['id']; ?></title>
</head>
<body>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li><a href="recent">Recent</a></li>
  			<li>Request</li>
		</ul>
	</div>
	<div class="reqInfomations">
		<?php foreach($data['requestInfo'] as $requestInfo){ ?>
			<div class="requestrow">
				<div class="userPic">
					<?php if($requestInfo->gender=="Male") { ?>
						<img src="../img/recentRequests/profileMale.svg">
					<?php } else if($requestInfo->gender=="Female") { ?>
						<img src="../img/recentRequests/profileFemale.svg">
					<?php } else {?>
						<img src="../img/recentRequests/user.svg">
					<?php } ?>
				</div>
				<div class="brief1">
					<h1><?php echo $requestInfo->firstName." ".$requestInfo->lastName; ?></h1>
					<h3><?php echo $requestInfo->phoneNumber; ?></h3>
				</div>
				<div class="brief2">
					<div class="details">
						<div class="patients">
							<img src="../img/recentRequests/patients.svg" alt="">
							<p><?php echo $requestInfo->numberOfPatients; ?></p>
						</div>
						<div class="police">
							<img src="../img/recentRequests/police.svg" alt="">
							<p><?php echo $requestInfo->policeStation; ?></p>
						</div>
						<div class="time">
							<img src="../img/recentRequests/datetime.svg" alt="">
							<p><?php echo $requestInfo->time; ?></p>
							<p><?php echo $requestInfo->date; ?></p>
						</div>
						<div class="district">
							<img src="../img/recentRequests/district.svg" alt="">
							<p><?php echo $requestInfo->district; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="reqDetails">
				<div class="description">
					<p class="note">Special Notes</p>
					<textarea name="specialnote" cols="30" rows="10" disabled><?php echo $requestInfo->description; ?></textarea>
				</div>
				<div class="emergencylocation">
					<iframe class="emelocation" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9029322875867!2d79.8589642146052!3d6.902210820560061!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25963120b1509%3A0x2db2c18a68712863!2sUniversity%20of%20Colombo%20School%20of%20Computing!5e0!3m2!1sen!2slk!4v1601711662840!5m2!1sen!2slk" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		<?php } ?>
	</div>
	<script type="text/javascript" src="../javascript/headerSuwasariya.js"></script>
</body>
</html>